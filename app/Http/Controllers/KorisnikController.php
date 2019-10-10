<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Meni;
use App\Models\Korisnik;
use Illuminate\Http\Request;


class KorisnikController extends BackendController{
    //put your code here
    private $data=[];
    public function __construct() {
        
        $meni= new Meni();
        $this->data['menus']=$meni->getAdmin();
       
    }
    
    public function tabelaKorisnik(){
        
         $korisnik = new Korisnik();
		$this->data['korisnici'] = $korisnik->getAll();

                
                return view('admin.pages.tabelaKorisnik',$this->data);
    }
    
     public function korisnik($id=null){
        
                $korisnik = new Korisnik();
		$this->data['korisnici'] = $korisnik->getAll();

		if(!empty($id)){
			$korisnik->id = $id;
			$this->data['korisnik'] = $korisnik->get();
		}

        
        return view('admin.pages.korisnik',$this->data);
    }
    
    public function storeKorisnik(Request $request){
        
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
            
            return redirect('/korisnik/tabela');
            
        }
        catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return redirect()->back()->with('error','Greska pri upisu u bazu');
        }
        
    }
    
     public function updateKorisnik($id,Request $request){
        
        try{
           $korisnik=new Korisnik();
           $korisnik->id=$id;
           
           $korisnik->ime=$request->get('ime');
            $korisnik->prezime=$request->get('prezime');
            $korisnik->email=$request->get('email');
            $korisnik->korisnicko_ime=$request->get('korisnicko_ime');
            
            $korisnik->update();
            
            return redirect('/korisnik/tabela');
            
        }
        catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return redirect()->back()->with('error','Greska pri upisu u bazu');
        }
        
    }
    
    
    public function deleteKorisnik($id){
        
        $korisnik=new Korisnik();
        $korisnik->id=$id;
        
                $korisnik->delete();
                return redirect()->back()->with('succeess','Uspesno!');
    }
}
