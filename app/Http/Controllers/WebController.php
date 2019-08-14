<?php

namespace App\Http\Controllers;

use App\Checkweb;
use Illuminate\Http\Request;
use App\Webs;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function index(){
        $webs=Webs::paginate(15);
        return view('web.list')->with('webs',$webs);
    }
    public function commit(){
        $webs=Webs::paginate(15);
        return view('web.commit')->with('webs',$webs);
    }
    public function add(Request $request){
        $validatedData = $request->validate([
            'url' => 'required|url'
        ]);
        $checkweb=new Checkweb();
        $checkweb->url=$request->input('url');
        $checkweb->user_id=Auth::id();
        $checkweb->saveOrFail();
        return view('web.thanks');
    }
}
