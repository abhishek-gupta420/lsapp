<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $title ="Welcome to Blog";
        return view("pages.index")->with('title',$title);
        //return view('pages.index', compact('title'));
    }

    public function about(){

        $title ="About Us";
        return view("pages.about")->with('title',$title);
      // return view('pages.about');
    }

    public function services(){

        $data=array(
            'title'=>'Services',
            'services'=>['web disign','SEO','coding']
        );
        return view("pages.services")->with($data);
     //   $title ="Services";
        //return view("pages.index")->with('title',$title);
        //return view('pages.services');
    }
}
