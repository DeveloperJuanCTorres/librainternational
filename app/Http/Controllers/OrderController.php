<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Transaction;
use App\Models\TransactionSellLine;
use App\Models\TransactionPayment;
use App\Models\TransactionSellLinesPurchaseLine;
use App\Models\PurchaseLine;



class OrderController extends Controller
{
    public function index()
    {
        $contact = Contact::where('custom_field10', auth()->user()->id)->first();
        $orders = Transaction::query()->where('contact_id', $contact->id)->where('status','<>','completed');
        if (request('status')) {
            if(request('status') == 'Earring'){
                $orders->whereNull('shipping_status');
            }else{
                $orders->where('shipping_status', request('status'));
            }
        }
        $orders = $orders->orderBy('id','DESC')->get();
        $pendiente = Transaction::whereNull('shipping_status')->where('contact_id', $contact->id)->where('status','<>','completed')->count();
        $recibido = Transaction::where('shipping_status', 'ordered')->where('contact_id', $contact->id)->where('status','<>','completed')->count();
        $enviado = Transaction::where('shipping_status', 'packed')->where('contact_id', $contact->id)->where('status','<>','completed')->count();
        $transito = Transaction::where('shipping_status', 'shipped')->where('contact_id', $contact->id)->where('status','<>','completed')->count();
        $entregado = Transaction::where('shipping_status', 'delivered')->where('contact_id', $contact->id)->where('status','<>','completed')->count();
        $anulado = Transaction::where('shipping_status', 'cancelled')->where('contact_id', $contact->id)->where('status','<>','completed')->count();
        return view('orders.index', compact('orders', 'pendiente', 'recibido', 'enviado','transito', 'entregado', 'anulado'));
    }

    public function show(Transaction $transaction)
    {
        $this->authorize('author',$transaction);
        $items = $transaction->transaction_sell_line;
        return view('orders.show', compact('transaction', 'items'));
    }
    
    public function thanks(Transaction $transaction)
    {
        $this->authorize('author',$transaction);
      
        return view('thanks', compact('transaction'));
    }

    public function izipay(Request $request){

        $date_now = date("Y-m-d H:i:s");
        $answer = json_decode($request->get("kr-answer"));

        if ($answer->orderStatus == "PAID") {
            //answer->orderStatus
            //$answer->orderDetails->orderId
            try {
                //buscar la orden y cambar de estado a completado
                $order = Transaction::find($answer->orderDetails->orderId);
                $order->status = 'completed';
                $order->save();
                //Almacenar el id de la orden en un array para agregarlo en el pedido por que asi lo determina el sistema comercial
                $aux = array("$order->id");
                $array_id =  json_encode($aux);
                //Crea un nuevo registro pero representando a la compra
                $transaction = $order->replicate();
                $transaction->type='sell';
                $transaction->status = 'final';
                $transaction->payment_status = 'paid';
                $transaction->invoice_no = 'P-ECO/'.$date_now;
                $transaction->shipping_status = 'ordered';
                $transaction->sales_order_ids =  $array_id;
                $transaction->save();
                //Crea los de talles de la compra en base a los detalles de la orden 
                $products = TransactionSellLine::where('transaction_id',$answer->orderDetails->orderId)->get();
                foreach ($products as  $product) {
                    $sell_line = $product->replicate();
                    $sell_line->transaction_id = $transaction->id;
                    $sell_line->so_line_id = $product->id;
                    $sell_line->save();
                    //lista de entradad de stock
                    $purchase_line = PurchaseLine::where('product_id',$product->product_id)->where('variation_id',$product->variation_id)->orderBy('id','DESC')->first();
                    if($purchase_line){
                        //Registro de salidad de Stock
                        $PurchaseLine = new TransactionSellLinesPurchaseLine();
                        $PurchaseLine->sell_line_id = $product->id;
                        $PurchaseLine->quantity = $product->quantity;
                        $PurchaseLine->purchase_line_id = $purchase_line->id;
                        $PurchaseLine->save();
                    }
                }
                //-----------------------------
                $payment = new TransactionPayment();
                $payment->transaction_id = $transaction->id;
                $payment->business_id =  $transaction->business_id;
                $payment->amount = ($answer->transactions[0]->amount/100);//respuesta de izipay monto a pagar en centimos
                $payment->method ='card';
                $payment->card_type = $answer->transactions[0]->operationType;//respuesta de izipay - tipo de pago
                $payment->paid_on = $date_now; 
                $payment->created_by = $transaction->created_by;
                $payment->payment_for =  $transaction->contact_id;
                $payment->payment_ref_no = $answer->shopId;//respuesta de izipay - id de la transaccion
                $payment->save();
                // $payment->card_transaction_number = 
                // $payment->card_number =
                // $payment->card_holder_name = 
                //-----------------------------
                // return view('thanks',compact('answer'));
                return redirect()->route('orders.thanks', $transaction);
            } catch (\Throwable $th) {
                //throw $th;
                dd($th);
                // return abort(404);
            }
        }else{
            // \Log::debug($items);
            dd('El pago no procede, comunicate con soporte');
            return abort(404);
        }
    }
}
