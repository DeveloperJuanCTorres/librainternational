<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShoppingCart extends Component
{

    protected $listeners = ['render'];

    public function destroy(){
        \Cart::clear();
        $this->emitTo('dropdown-cart', 'render');
        $this->emitTo('navigation','render');
    }

    public function delete($rowID){
        \Cart::remove($rowID);
        $this->emitTo('dropdown-cart', 'render');
        $this->emitTo('navigation','render');
    }
    
    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
