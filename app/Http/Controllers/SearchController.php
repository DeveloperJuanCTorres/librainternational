<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CmsPages;

class SearchController extends Controller
{
    public function buscar(Request $request)
    {
        $seo = array(
            'title'         => 'Buscar | Libra International',
            'description'   => 'E-commerce de repuesto y lubricantes para maquinaria pesada, Cargadores, Tractocamiones,Excabadoras, Minicargadores,Volquetes,XCMG,Perú,Tumbes',
            'keywords'      => 'XCMG,repuestos,perú,tumbes,cargadores,tractocamiones,excabadoras,minicargadores,lubricantes,',
        );
        $name = $request->name;
        $products = Product::where('name', 'LIKE' ,'%' . $name . '%')->where('enable_sr_no',0)->paginate(8);
        return view('search', compact('products','seo'));
    }
    
    public function buscarNote(Request $request)
    {
        $seo = array(
            'title'         => 'Buscar nota | Libra International',
            'description'   => 'E-commerce de repuesto y lubricantes para maquinaria pesada, Cargadores, Tractocamiones,Excabadoras, Minicargadores,Volquetes,XCMG,Perú,Tumbes',
            'keywords'      => 'XCMG,repuestos,perú,tumbes,cargadores,tractocamiones,excabadoras,minicargadores,lubricantes,',
        );
        
        $title = $request->title;
        $notes = CmsPages::where('title', 'LIKE' ,'%' . $title . '%')->Status()->Type('blog')->paginate(8);
        return view('search-note', compact('notes','seo'));
    }
}
