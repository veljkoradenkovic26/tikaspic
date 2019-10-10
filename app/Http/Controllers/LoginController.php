<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Korisnik;
use App\Models\Meni;
use Illuminate\Http\Request;


class LoginController extends Controller{
    //put your code here
    private $data=[];
    
     public function __construct() {
        
        $meni= new Meni();
        $this->data['menus']=$meni->getAll();
        
       
    }
    
     public function index(){
        
        
        return view('pages.login',$this->data);
    }
    
       public function login(Request $request){
        
        $request->validate([
            'Username'=>['required'],
            'Password'=>['required']
            ],
        [ 'required'=>':attribute is required'
        ]);
        
        $korisnicko_ime=$request->get('Username');
        $lozinka=$request->get('Password');
        
        $korisnik=new Korisnik();
        $korisnik->korisnicko_ime=$korisnicko_ime;
        $korisnik->lozinka=$lozinka;
        
        $login=$korisnik->getByUsernameAndPassword();
        
        if(!empty($login)){
            $request->session()->push('user',$login);
            return redirect('/');
        }
        return redirect()->back()->with('error','Niste registrovani');
    }
    
     public function logout(Request $request){
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect('/');
    }
    
    public function registracija(){
        
        return view('pages.registracija', $this->data);
    }
    
    public function registracijaStore(Request $request){
        
        $request->validate([
            'ime'=>'required',
            'prezime'=>'required',
            'email'=>'required|email',
            'korisnicko_ime'=>'required',
            'lozinka'=>'required'
        ],[
            'required'=>'Polje :attribute je obavezno!'
        ]);
        try{
            
            $korisnik=new Korisnik();
            $korisnik->ime=$request->get('ime');
            $korisnik->prezime=$request->get('prezime');
            $korisnik->email=$request->get('email');
            $korisnik->korisnicko_ime=$request->get('korisnicko_ime');
            $korisnik->lozinka=$request->get('lozinka');
            
            $korisnik->insert();
            
            return redirect()->back()->with('success','uspesno');
            
        }
        catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return redirect()->back()->with('error','Greska pri upisu u bazu');
        }
        
    }
}
