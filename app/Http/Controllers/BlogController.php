<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\CmsPages;

class BlogController extends Controller
{
    public function index(){
        $notes = CmsPages::Status()->Type('blog')->orderBy('id','desc')->paginate(5);
        $relacionadas = CmsPages::Status()->Type('blog')->inRandomOrder()->limit(10)->get();
        
        $page = CmsPages::Status()->Type('page')->findOrFail(10);
        $seo = array(
            'title'         => $page->title,
            'description'   => $page->meta_description,
            'keywords'      => $page->tags,
        );
        
        return view('blog',compact('notes','relacionadas','seo'));
    }
    
    public function show(Request $request){
        $id = last(explode('-', $request->url()));
        $note = CmsPages::Status()->Type('blog')->findOrFail($id);
        $relacionadas = CmsPages::Status()->Type('blog')->inRandomOrder()->limit(10)->get();
        $tags = $array = explode(",", $note->tags);
        
         $seo = array(
            'title'         =>  $note->title.' | Libra International',
            'description'   => $note->meta_description,
            'keywords'      => $note->tags,
        );
        
        return view('blog-detail')->with(compact('note','relacionadas','tags','seo'));
    }
}
