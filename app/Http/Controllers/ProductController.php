<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Media;
use App\Models\CmsPages;

class ProductController extends Controller
{
    public function show(Product $product){
        $recomendados = Product::where('category_id',$product->category_id)->limit(12)->get();
        
        $seo = array(
            'title'         => $product->name.' | Libra International',
            'description'   => 'E-commerce de repuesto y lubricantes para maquinaria pesada, Cargadores, Tractocamiones,Excabadoras, Minicargadores,Volquetes,XCMG,Perú,Tumbes',
             'keywords'      => 'XCMG,repuestos,perú,tumbes,'.$product->name,
        );
        
        return view('products.show', compact('product','recomendados','seo'));
    }

    public function machineryShow(Product $product)
    {
     
        $pdf = Media::where('model_id',$product->id)->where('model_type','App\Product')->first();
        $seo = array(
            'title'         => $product->name.' | Libra International',
            'description'   => 'E-commerce de repuesto y lubricantes para maquinaria pesada, Cargadores, Tractocamiones,Excabadoras, Minicargadores,Volquetes,XCMG,Perú,Tumbes',
            'keywords'      => 'XCMG,repuestos,perú,tumbes,'.$product->name,
        );
        return view('products.show-machinery',compact('product','pdf','seo'));
    }

    public function machinery()
    {
        
        $data['cargadores'] = Category::where("id",4)->first();
        $data['minicargadores'] = Category::where("id",5)->first();
        $data['excabadoras'] = Category::where("id",6)->first();
        $data['tractocamiones'] = Category::where("id",7)->first();
        $data['volquetes'] = Category::where("id",8)->first();
        $data['retroexcabadoras'] = Category::where("id",9)->first();
        
        $data['rodillos'] = Category::where("id",51)->first();
        $data['motoniveladoras'] = Category::where("id",52)->first();
        $data['fresadoras'] = Category::where("id",53)->first();
        $data['mixxer'] = Category::where("id",54)->first();
    
         $page = CmsPages::Status()->Type('page')->findOrFail(12);
        $data['seo'] = array(
            'title'         => $page->title,
            'description'   => $page->meta_description,
            'keywords'      => $page->tags,
        );
        
        return view('products.machinery',$data);
    }

    public function category(Category $category)
    {
          $seo = array(
            'title'         => 'Venta de'.$category->name.'| Libra International ',
            'description'   => $category->description,
            'keywords'      =>$category->keywords,
        );
        $machinaries = $category->products;
        return view('products.category',compact('machinaries','category','seo'));
    }
    
     public function offers(){
        //valida que sean productos simples y no combo
        $data['products'] = Product::where('type','combo')->paginate(12);
        $data['seo'] = array(
            'title'         => 'Ofertas | Libra International',
            'description'   => 'Aprovecha las mejores ofertas que te ofrece Libra XCMG',
            'keywords'      => 'Ofertas,perú,tumbes,lubricantes,maquinaria',
        );
        return view('products.offert',$data);
    }
}
