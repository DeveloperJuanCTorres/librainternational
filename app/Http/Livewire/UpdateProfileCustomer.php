<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Dotenv\Parser\Value;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateProfileCustomer extends Component
{

    public $customer =[
        'id'=>null,
        'name'=>null,
        'first_name'=>null,
        'last_name'=>null,
        'supplier_business_name'=>null,
        'mobile'=>null,
        'contact_id'=>null,
    ];

    public $is_active = false;


    public function mount()
    {
        $this->getCustomer();
    }

    public function getCustomer(){
        $customer = Contact::where('custom_field10',Auth::user()->id)->first();
        $this->customer=[
            'id'=>$customer->id,
            'name'=>$customer->name,
            'first_name'=>$customer->first_name,
            'last_name'=>$customer->last_name,
            'supplier_business_name'=>$customer->supplier_business_name,
            'mobile'=>$customer->mobile,
            'contact_id'=>$customer->contact_id,
        ];
    }

    public function update()
    {
        if(is_null($this->customer['name'])){
            $rules['customer.mobile'] = 'required|digits_between:6,9';
            $rules['customer.contact_id'] = 'required|numeric|digits:11';
            $rules['customer.supplier_business_name'] = 'required|max:255';

            $messages = [
                'customer.supplier_business_name'=>'Tienes que agregar el nombre comersial de la empresa',
                'customer.mobile'=>'Tienes que agregar un n¨²mero telef¨®nico',
                'customer.contact_id'=>'Tienes que agregar el RUC de la empresa',
            ];

        }else{
            $rules['customer.mobile' ] = 'required|digits_between:6,9';
            $rules['customer.contact_id'] = 'required|numeric|digits:8';
            $rules['customer.first_name'] = 'required|max:255';
            $rules['customer.last_name'] = 'required|max:255';
            $this->customer['name'] = $this->customer['first_name'] .' '.$this->customer['last_name'];

            $messages = [
                'customer.first_name'=>'Tienes que agregar tu nombre',
                'customer.last_name'=>'Tienes que agregar tus apellidos',
                'customer.mobile'=>'Tienes que agregar un n¨²mero telef¨®nico',
                'customer.contact_id'=>'Tienes que agregar tu DNI',
            ];
        }

        $this->validate($rules,$messages);
        $customer = Contact::find($this->customer['id']);
        $customer->update($this->customer);
        $this->is_active =true;
        // $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.update-profile-customer');
    }
}
