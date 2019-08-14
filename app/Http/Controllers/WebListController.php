<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Webs;
class WebListController extends Controller
{
    public function index(){
        $webs=Webs::paginate(15);
        return view('weblist')->with('webs',$webs);
    }
}
