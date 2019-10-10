<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;


use App\Models\Meni;

class BackendController extends Controller{
    //put your code here
    
    private $data=[];
    
     public function __construct() {
        
        $meni= new Meni();
        $this->data['menus']=$meni->getAdmin();
       
    }
    
    public function index(){
        
        return view('admin.pages.home', $this->data);
    }
}
