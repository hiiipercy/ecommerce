<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class backendController extends Controller
{
    public function index(){
        $this->setPageTitle('Ecommerce','Admin');
        $breadcrumb = ['My Profile'=>''];
        return view('backend.layouts.app',['breadcrumb'=>$breadcrumb]);
    }
}
