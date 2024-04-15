<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
use App\Mail\LibraInternational;
use Illuminate\Support\Facades\Http;
use App\Models\CmsPages;
use App\Mail\Cotizar;
use App\Models\Product;

class AdminController extends Controller
{
    public function home()
    {
        
        $data['lubricantes'] = Category::where("id",1)->first();
        $data['repuestos'] = Category::where("id",2)->first();
        $data['llantas'] = Category::where("id",11)->first();
        $data['filtros'] = Category::where("id",12)->first();
    
        
        $page = CmsPages::Status()->Type('page')->findOrFail(9);
        $data['seo'] = array(
            'title'         => $page->title,
            'description'   => $page->meta_description,
            'keywords'      => $page->tags,
        );
        
        if(is_null($data['lubricantes']) || is_null($data['repuestos']) || is_null($data['llantas']) || is_null($data['filtros'])){
            return abort(404);
        }
        return view('home',$data);
    }

    public function menssage(Request $request)
    {
         $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
            'secret'=>'6LeQBgAnAAAAANqzpgHdt8p9yxGAG6zNiGruMaQ0',
            'response'=>$request->g_recaptcha_response,
        ])->object();

        if($response->success && $response->score >=0.7){
            $correo = new LibraInternational($request);
            try {
                Mail::to('informes@librainternational.com.pe')->send($correo);
                return response()->json(['status' => true, 'msg' => "Tu mensaje fue enviado con exito"]);
            } catch (\Exception $e) {
                return response()->json(['status' => false, 'msg' => "Ocurri車 un error!!, intentalo m芍s tarde"]);
            }
        }else{
            return response()->json(['status' => true, 'msg' => "La verificaci車n de ReCaptcha ha fallado"]);
        } 
    }

    public function about()
    {
        $page = CmsPages::Status()->Type('page')->findOrFail(11);
        $data['seo'] = array(
            'title'         => $page->title,
            'description'   => $page->meta_description,
            'keywords'      => $page->tags,
        );
      return view('about',$data);
    }

    public function conditions()
    {
        $page = CmsPages::Status()->Type('page')->findOrFail(13);
        $data['page']=$page;
        $data['seo'] = array(
            'title'         => $page->title,
            'description'   => $page->meta_description,
            'keywords'      => $page->tags,
        );
        return view('conditions',$data);
    }

    public function devoluciones()
    {
        return view('devoluciones');
    }
    
    public function cotizacion()
    {
         $data['machinaries'] = Product::where("category_id",4)->orWhere("category_id",5)->orWhere("category_id",6)->orWhere("category_id",7)->orWhere("category_id",8)->orWhere("category_id",9)->orWhere("category_id",51)->orWhere("category_id",52)->orWhere("category_id",53)->get();
        
        $data['seo'] = array(
            'title'         => 'Cotización - Libra International',
            'description'   => 'E-commerce de repuesto y lubricantes para maquinaria pesada, Cargadores, Tractocamiones,Excabadoras, Minicargadores,Volquetes,XCMG,Perú,Tumbes',
            'keywords'      => 'XCMG,repuestos,perú,tumbes,cargadores,tractocamiones,excabadoras,minicargadores,lubricantes,',
        );
      return view('cotizacion',$data);
    }

    public function menssagecotizacion(Request $request)
    {
       
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
            'secret'=>'6LeQBgAnAAAAANqzpgHdt8p9yxGAG6zNiGruMaQ0',
            'response'=>$request->g_recaptcha_response,
        ])->object();

        if($response->success && $response->score >=0.7){
            $correo = new Cotizar($request);
            try {
                Mail::to('mdios@librainternational.com.pe')->send($correo);
                 return response()->json(['status' => true, 'msg' => $request->nombre." Tu mensaje fue enviado con exito"]);
            } catch (\Exception $e) {
                return response()->json(['status' => false, 'msg' => "Ocurrió un error!!, intentalo más tarde"]);
            }
        }else{
            return response()->json(['status' => true, 'msg' => "La verificación de ReCaptcha ha fallado"]);
        } 
    }

}
