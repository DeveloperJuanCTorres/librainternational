<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class PaymentOrder extends Component
{
    use AuthorizesRequests;
    public $transaction;
    protected $listeners = ['payOrder'];

    public function mount(Transaction $transaction){
        $this->transaction = $transaction;
    }

    public function payOrder(){
        $this->transaction->status = 2;
        $this->transaction->save();
        return redirect()->route('transactions.show', $this->transaction);
    }


    public function render()
    {
        $this->authorize('author', $this->transaction);
        $this->authorize('payment', $this->transaction);
        $items = $this->transaction->transaction_sell_line;

        // $store = array(
        //     "amount" =>  $cartTotal,
        //     "currency" => "PEN", 
        //     "transactionId" => "myOrderId-".$rowId,
        //     "customer" => array(
        //         "email" => $request->emailaddress_invoice,
        //         "billingDetails" =>array(
        //             "category"=> $categoria,
        //             "firstName" => $fullName[0],   
        //             "lastName" => $lastName[0],    
        //             "phoneNumber" => $request->phonenumber_invoice,
        //             "address" =>$request->street_invoice,    
        //             "district" =>$request->distrito,  
        //             "city" =>$request->provincia, 
        //             "state" =>$request->departamento,
        //             "identityCode"=> $documentoIdentidad,
        //             "legalName" => $razonsocial,
        //             "address2"=> $dirrazonsocial,   
        //         ),

        //         "shippingDetails" =>array(
        //             "category"=> $categoria,
        //             "firstName" => $fullName[0],   
        //             "lastName" => $lastName[0],    
        //             "phoneNumber" => $request->phonenumber_invoice,
        //             "address" =>$request->street_invoice,    
        //             "district" =>$request->distrito,  
        //             "city" =>$request->provincia, 
        //             "state" =>$request->departamento,
        //             "identityCode"=> $documentoIdentidad,
        //             "legalName" => $razonsocial,
        //             "address2"=> $dirrazonsocial,  
        //         ),
        //         "shoppingCart"=>array(
        //             "shippingAmount" => $costoEnvio, 
        //             "taxAmount" => $impuestos, 
        //             "cartItemInfo" => $ListProsuc,
        //         ),
        //     ),
        // );
        
        $amount = intval($this->transaction->final_total *100);
        $keyOrder = Str::random(9);
        $store = array(
            "amount"=>  $amount,
            "currency"=> "PEN",
            "transactionId"=>  "myOrderId-".$keyOrder,
            "orderId"=>$this->transaction->id,
            "customer"=> array(
                "email"=> Auth::user()->email,
            )
        );
      $authorization = base64_encode('96439015' . ':' . 'prodpassword_KQDIcvmLRbgzuAkX3xSlysbLZTdSX36l10eDgmJSUvhmB');
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $authorization,
            'Content-Type' => 'application/json'
        ])->post('https://api.micuentaweb.pe/api-payment/V4/Charge/CreatePayment',$store);
        $formToken = $response["answer"]["formToken"];

        return view('livewire.payment-order', compact('items','formToken'));
    }
}
