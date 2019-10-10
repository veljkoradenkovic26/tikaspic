<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use App\Models\Tim;
use Illuminate\Support\Facades\Mail;

use App\Models\Meni;
use App\Models\Post;
use App\Models\Komentar;
use App\Models\Korisnik;
use Illuminate\Http\Request;
use function view;


class FrontendController extends Controller{
    //put your code here

    private $data=[];

      public function __construct() {

        $meni= new Meni();
        $this->data['menus']=$meni->getAll();


    }

    public function download(){
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download(public_path('dokumentacija.pdf'), 'dokumentacija.pdf', $headers);
    }

      public function index(){

        $post=new Post();

        $this->data['posts']=$post->getAll(3);


        return view('pages.home', $this->data);
    }

      public function getPost($id){
       $post=new Post();

       $this->data['singlePost']=$post->get($id);
       $komentar=new Komentar();
        $post->id=$komentar->id_post;
       $this->data['comments']=$komentar->get($id);

        return view('pages.post', $this->data);
    }



    public function about(){

        return view('pages.about',$this->data);
    }



    public function tim(){

        $tim= new Tim();
        $this->data['tim']=$tim->getAll(4);

        return view('pages.tim', $this->data);
    }

    public function kontakt(){

        return view('pages.kontakt',$this->data);
    }


    public function store(Request $request){

        $validate=[

            'name'=>'required',
            'last'=>'required',

            'mail'=>'required|email',
            'naslov'=>'required',
            'message'=>'required'
        ];

        $customMessage=[
            'required'=>'Polje :attribute je obavezno'
        ];

        $request->validate($validate,$customMessage);

        try{
            $subject=$request->Input('naslov');
            $message=$request->Input('message');
            $to='vekicaradenkovic@gmail.com';
            $headers='From: '.$request->Input('mail');

            mail($to, $subject, $message, $headers);


            return redirect()->back()->with('success','Uspeh');


        }
        catch(\Exception $ex){
            \Log::error('Greska:'.$ex->getMessage());
            return redirect()->back()->with('error','Greska');
        }
    }

     public function profil($id){

                $korisnik = new Korisnik();


		if(!empty($id)){
			$korisnik->id = $id;
			$this->data['korisnik'] = $korisnik->get();
		}


        return view('pages.profil',$this->data);
    }

     public function updateProfil($id,Request $request){

        try{
           $korisnik=new Korisnik();
           $korisnik->id=$id;

           $korisnik->ime=$request->input('ime');
            $korisnik->prezime=$request->input('prezime');
            $korisnik->email=$request->input('email');
            $korisnik->korisnicko_ime=$request->input('korisnicko_ime');


            $korisnik->update();

            return redirect()->back()->with('succeess','Uspesno!');

        }
        catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return redirect()->back()->with('error','Greska pri upisu u bazu');
        }

    }



     public function storeComment(Request $request){

        try{



            $komentar=new Komentar();
            $komentar->tekst=$request->get('comment');
            $komentar->id_post=$request->get('id_post');
            $komentar->id_korisnik=session()->get('user')[0]->id_korisnik;


            $komentar->insert();

            return redirect('/')->with('succeess','Uspesno!');

        }
        catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return redirect()->back()->with('error','Greska pri upisu u bazu');
        }

   }


}
