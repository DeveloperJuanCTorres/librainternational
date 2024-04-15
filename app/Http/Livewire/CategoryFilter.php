<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category, $marca, $price;
    public $view = "grid";
    public $order = "";
    public $marcas;

    protected $queryString = [ 'marca','price'];

    public function limpiar(){
        $this->reset(['marca','price', 'page']);
    }

    public function limpiarmarca(){
        $this->reset(['marca', 'page']);
    }

    public function limpiarprice(){
        $this->reset(['price', 'page']);
    }

    public function updatedOrder($value){
        $this->order = $value;
    }

    public function updatedMarca(){
        $this->resetPage();
    }

    public function updatedPrice(){
        $this->resetPage();
    }

    public function mount(){
        $this->marcas = Brand::where('use_for_repair',1)->get();
    }
  
    public function render()
    {
        $productsQuery = Product::query()->whereHas('category', function(Builder $query){
            $query->where('id', $this->category->id);
        });

        if ($this->marca) {
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
                $query->where('name', $this->marca);
            });
        }

        if ($this->price) {
            switch($this->price){ 
                case 1:
                    $productsQuery = $productsQuery->whereHas('variation', function(Builder $query){
                        $query->where('sell_price_inc_tax','<',50);
                    });
                    break;
                case 2:
                    $productsQuery = $productsQuery->whereHas('variation', function(Builder $query){
                        $query->where('sell_price_inc_tax','>=',50)->where('sell_price_inc_tax','<=',100);
                    });
                    break;
                case 3:
                    $productsQuery = $productsQuery->whereHas('variation', function(Builder $query){
                        $query->where('sell_price_inc_tax','>=',100)->where('sell_price_inc_tax','<=',200);
                    });
                    break;
                case 4:
                    $productsQuery = $productsQuery->whereHas('variation', function(Builder $query){
                        $query->where('sell_price_inc_tax','>=',200)->where('sell_price_inc_tax','<=',500);
                    });
                    break;
                case 5:
                    $productsQuery = $productsQuery->whereHas('variation', function(Builder $query){
                        $query->where('sell_price_inc_tax','>=',500)->where('sell_price_inc_tax','<=',1000);
                    });
                    break;

                case 6:
                    $productsQuery = $productsQuery->whereHas('variation', function(Builder $query){
                        $query->where('sell_price_inc_tax','>=',1000)->where('sell_price_inc_tax','<=',2000);
                    });
                    break;
                case 7:
                    $productsQuery = $productsQuery->whereHas('variation', function(Builder $query){
                        $query->where('sell_price_inc_tax','>=',2000);
                    });
                    break;
            }
        }

        if ($this->order) {
            switch($this->order){ 
                case 1:
                    $productsQuery = $productsQuery->orderBy('name', 'asc');
                    break;
                case 2:
                    $productsQuery = $productsQuery->orderBy('name', 'desc');
                    break;
            }
        }
        //valida que sean productos simples y no combo
        $productsQuery = $productsQuery->where('type', 'single');
        
        $cantidad = count($productsQuery->get());
        $products = $productsQuery->paginate(16);

        return view('livewire.category-filter', compact('products','cantidad'));
    }
}
