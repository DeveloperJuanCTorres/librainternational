<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CmsPages;

class SearchNote extends Component
{

    public $search;
    public $open = false;

    public function updatedSearch($value){
        if ($value) {
            $this->open = true;
        }else{
            $this->open = false;
        }
    }


    public function render()
    {

        if ($this->search) {
            $notas = CmsPages::where('title', 'LIKE' ,'%' . $this->search . '%')
                                ->take(5)
                                ->get();
        } else {
            $notas = [];
        }

        return view('livewire.search-note', compact('notas'));
    }
}
