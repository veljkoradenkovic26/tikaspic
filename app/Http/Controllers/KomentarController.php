<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Meni;
use App\Models\Komentar;
use App\Models\Post;
use Illuminate\Http\Request;

class KomentarController {
    //put your code here


    public function __construct() {

        $meni= new Meni();
        $this->data['menus']=$meni->getAdmin();

    }

    public function tabelaKomentar(){
        $k = new Komentar();
        $this->data['komentari'] = $k->getAll();
        return view('admin.pages.tabelaKomentar',$this->data);
    }

    public function komentar($id=null){

        $komentar = new Komentar();
        $this->data['komentari'] = $komentar->getAll();

        if(!empty($id)){
            $komentar->id = $id;
            $this->data['komentar'] = $komentar->getCom();
        }

        $post=new Post();
        $this->data['postovi']=$post->getPosts();


        return view('admin.pages.komentar',$this->data);
    }

    public function storeKomentar(Request $request){



        $request->validate([
            'tekst'=>'required',
            'id_post'=>'required'
        ],[
            'required'=>'Polje :attribute je obavezno!'
        ]);

        try{

            $komentar=new Komentar();
            $komentar->tekst=$request->get('tekst');
            $komentar->id_post=$request->get('id_post');
            $komentar->id_korisnik=session()->get('user')[0]->id_korisnik;


            $komentar->insert();

            return redirect('/komentar/tabela');

        }
        catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return redirect()->back()->with('error','Greska pri upisu u bazu');
        }
    }

    public function updateKomentar($id,Request $request){

        try{
            $komentar=new Komentar();
            $komentar->id=$id;

            $komentar->tekst=$request->get('tekst');
            $komentar->id_post=$request->get('id_post');
            $komentar->id_korisnik=session()->get('user')[0]->id_korisnik;


            $komentar->update();

            return redirect('/komentar/tabela');

        }
        catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return redirect()->back()->with('error','Greska pri upisu u bazu');
        }

    }

    public function deleteKomentar($id){

        $komentar=new Komentar();
        $komentar->id=$id;

        $komentar->delete();
        return redirect('/');
    }
}
