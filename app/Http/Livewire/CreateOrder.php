<?php

namespace App\Http\Livewire;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\City;
use App\Models\District;
use App\Models\Department;
use App\Models\Contact;
use App\Models\Transaction;
use App\Models\TransactionSellLine;

class CreateOrder extends Component
{
    public $contact = null, $address, $envio_type = 1;
    public $documento, $name;
    public $ruc, $empresa;
    public $shipping_cost = 0;
    public $departments, $cities = [], $districts = [];
    public $department_id="", $city_id = "", $district_id = "",$references="";
    public $delivered_to,$delivered_dni;
    public $isActive=true, $isPerson = 1;

    public function mount(){
        $this->departments = Department::all();
        $this->contact = Contact::where('custom_field10',Auth::user()->id)->first();
    }

    public function updatedDepartmentId($value){
        $this->cities = City::where('department_id', $value)->get();
        $this->reset(['city_id']);
    }

    public function updatedCityId($value){
        $this->districts = District::where('city_id', $value)->get();
        $this->reset('district_id');
        // $items_quanity = 0;
        // $items_quanity = $this->itemCart();
        // $items_quanity = $items_quanity - 1;
        // $this->shipping_cost = (15 + (5 * $items_quanity));
    }

    public function create_order(){
        if($this->isPerson == 2){
            $rules = [
                'empresa' => 'required|max:255',
                'ruc'=>'required|digits:11',
            ];

            $cliete = $this->empresa;
            $documento = $this->ruc;
            $boletaFactura = 'Factura';
        }else{
            $rules = [
                'name' => 'required|max:255',
                'documento'=>'required|digits:8',
            ];
            $cliete = $this->name;
            $documento = $this->documento;
            $boletaFactura = 'Boleta';
        }

        if($this->isPerson == 1)
        {
            $this->delivered_to = $this->name;
            $this->delivered_dni = $this->documento;
        }else{
            $rules['delivered_to'] = 'required|max:255';
            $rules['delivered_dni'] = 'required|digits:8';
        }

        $messages = [
            'delivered_to.required'=>'Tienes que ingresar el nombre y apellido de la persona que recogerá el pedido',
            'delivered_dni.required'=>'Tienes que agregar un número de documento',
            'delivered_dni.digits'=>'Tu DNI tiene que tener 8 dígitos',
            'name.required'=>'Tienes que ingresar nombres y apellidos del cliente',
            'documento.required'=>'Tienes que agregar un número de documento',
            'documento.digits'=>'Tu DNI tiene que tener 8 dígitos',
            'empresa.required'=>'Tienes que ingresar la razón social de la empresa',
            'ruc.required'=>'Tienes que agregar un RUC',
            'ruc.digits'=>'Tu RUC tiene que tener 11 dígitos',
            'city_id.required'=>'Tienes que seleccionar un departamento',
            'city_id.required'=>'Tienes que seleccionar una provincia',
            'district_id.required'=>'Tienes que seleccionar un distrito',
            'address.required'=>'Tienes que agregar una dirección',
        ];
    
        if($this->envio_type == 2){
            $rules['department_id']= 'required';
 		    $rules['city_id'] = 'required';
            $rules['district_id'] = 'required';
            $rules['address'] = 'required';
        }else{
            $this->address = "AA.HH 8 de setiembre, calle Las Mercedes Lote 01 Carretera San Juan de la Virgen";
            $this->department_id=24;
            $this->city_id = 187; 
            $this->district_id = 1806;
        }

        if(!$this->isActive){
            return false;
         }
 

        $date_now = date("Y-m-d H:i:s");
        // Ejecutar validacion
        $this->validate($rules,$messages);
        $departamentos = Department::find($this->department_id)->name;
        $city = City::find($this->city_id)->name;
        $district = District::find($this->district_id)->name;
        // -----Crear la orden de compra------
        $transaction = new Transaction();
        $transaction->business_id = 4;
        $transaction->location_id = 4;
        $transaction->status = 'ordered' ;
        $transaction->type = 'sales_order';
        $transaction->res_waiter_id = 17; // cambiar 2 que sera la Ecommerce vendedor
        $transaction->contact_id = $this->contact->id;
        $transaction->shipping_address = $this->address.' ('.$departamentos.'-'.$city.'-'.$district.')';
        $transaction->shipping_details = $this->references;
        $transaction->delivered_to = $this->delivered_to;//Recibira el pedido
        $transaction->shipping_custom_field_1 = $this->delivered_dni;//Dni
        $transaction->shipping_custom_field_2 = $cliete;//Persona que sera el compronante
        $transaction->shipping_custom_field_3 = $documento;//Persona que sera el compronante
        $transaction->shipping_custom_field_4 = $boletaFactura;
        $transaction->discount_type = 'percentage';
        $transaction->recur_interval = 1.00;
        $transaction->recur_interval_type = 'days';
        $transaction->pay_term_type = 'months';
        $transaction->transaction_date = $date_now;
        $transaction->total_before_tax = \Cart::getSubTotal();
        $transaction->tax_amount = 0.00;
        $transaction->rp_redeemed = 0;
        $transaction->rp_redeemed_amount = 0.00;
        $transaction->shipping_charges = $this->shipping_cost;//costo de envio
        $transaction->is_export = 0;
        $transaction->round_off_amount =0.00 ;
        $transaction->final_total = \Cart::getSubTotal() + $this->shipping_cost; //total mas envio 
        $transaction->is_direct_sale = 1 ;
        $transaction->is_suspend = 0;
        $transaction->exchange_rate = 1.00 ;
        $transaction->created_by = 2; //ID del Ecommerce como vendedor
        $transaction->mfg_production_cost = 0.00 ;
        $transaction->mfg_is_final = 0;
        $transaction->repair_updates_notif = 0;
        $transaction->is_created_from_api = 0;
        $transaction->rp_earned = 0;
        $transaction->is_recurring = 0;
        $transaction->invoice_no = 'O-ECO/'.$date_now;//correlativo de referencia
        $transaction->custom_field_4 = 'ecommerce'; //Variable opcional que sirve para identificar el ecommerce
        $transaction->service_custom_field_6 = \Cart::getContent();
         //agregué para el nuevo sistema
        $transaction->essentials_duration = 0;
        $transaction->essentials_amount_per_unit_duration = 0;
        //------------
        $transaction->save();
        $transaction_id = $transaction->id;
         foreach (\Cart::getContent() as $item) {
            //las variacion se tienen que agegar en el momendo de agregar e el producto
            TransactionSellLine::create([
                'transaction_id'=> $transaction_id,
                'product_id'=> $item->attributes->product_id,
                'variation_id'=> $item->attributes->variation_id, 
                'quantity'=> $item->quantity,
                'mfg_waste_percent'=>0.00,
                'quantity_returned'=>0.00,
                'unit_price_before_discount'=> $item->price,
                'unit_price'=> $item->price,
                'line_discount_type'=> 'fixed',
                'unit_price_inc_tax'=> $item->price + ($item->price*0.18), //impuesto en Perú falta traer el impuesto desde el sistemas
                'item_tax'=> $item->price*0.18,
                'tax_id'=> null, //en el antiguo sistema si pedia
                'so_line_id'=>null, //null en orden pero, tiene un id cuando se convierte en venta
            ]);
            discount($item);
         }
        //----------------
        \Cart::clear();
        return redirect()->route('orders.payment', $transaction);
    }

    public function itemCart()
    {
        $cant = 0;
        $items = \Cart::getContent();
        foreach ($items as $row) {
            $cant = $cant + $row->quantity;
        }
        return $cant;
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}