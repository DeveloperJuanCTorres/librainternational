<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Navigation extends Component
{
    protected $listeners = ['render'];
    public $repuestos,$lubricantes, $cargadores,$minicargadores,$llantas,$filtros;
    public $excabadoras,$tractocamiones,$volquetes,$retroexcavadora,$mixxer;
    public function mount(){
        $this->lubricantes = Category::where("id",1)->first();
        $this->repuestos = Category::where("id",2)->first();
        $this->llantas = Category::where("id",11)->first();
        $this->filtros = Category::where("id",12)->first();

        $this->cargadores = Category::where("id",4)->first();
        $this->minicargadores = Category::where("id",5)->first();
        $this->excabadoras = Category::where("id",6)->first();
        $this->tractocamiones = Category::where("id",7)->first();
        $this->volquetes = Category::where("id",8)->first();
        $this->retroexcavadora= Category::where("id",9)->first();
        
        $this->rodillo = Category::where("id",51)->first();
        $this->motoniveladora = Category::where("id",52)->first();
        $this->fresadora= Category::where("id",53)->first();
        $this->mixxer= Category::where("id",54)->first();
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
