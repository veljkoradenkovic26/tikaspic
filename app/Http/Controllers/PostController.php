<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Meni;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpOption\Tests\PhpOptionRepo;


class PostController extends BackendController{
    //put your code here
    private $data=[];
    private $model = null;
    public function __construct() {

        $meni= new Meni();
        $this->data['menus']=$meni->getAdmin();
        $this->model = new Post();

    }

    public function tabelaPost(){

        $post = new Post();
        $this->data['postovi'] = $post->getPosts();


        return view('admin.pages.tabelaPost',$this->data);
    }

    public function post($id=null){

        $post = new Post();
        $this->data['postovi'] = $post->getPosts();

        if(!empty($id)){
            $post->id = $id;
            $this->data['post'] = $post->getPost();
        }


        return view('admin.pages.post',$this->data);
    }

    public function storePost(Request $request){

        $request->validate([
            'title'=>'required',
            'desc'=>'required',
            'content'=>'required',
            'photo'=>'required|mimes:jpg,jpeg,png',
            'alt'=>'required'
        ],[
            'required'=>'Polje :attribute je obavezno!'
        ]);


        $photo=$request->file('photo');
        $extension=$photo->getClientOriginalExtension();
        $tmp=$photo->getPathName();

        $folder='images/';
        $file_name=time().".".$extension;
        $new_path=public_path($folder).$file_name;

        try{

            File::move($tmp,$new_path);



            $post=new Post();
            $post->naslov=$request->get('title');
            $post->opis=$request->get('desc');
            $post->sadrzaj=$request->get('content');
            $post->slika='images/'.$file_name;
            $post->alt=trim($request->get('alt'));
            $post->id_korisnik=1;
            $post->insert();

            return redirect('/post/tabela');

        }
        catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return redirect()->back()->with('error','Greska pri ubacivanju u bazu');
        }
        catch(FileException $ex){
            \Log::error('Pogresan fajl'.$ex->getMessage());
            return redirect()->back()->with('error','Greska sa slikom');
        }
        catch(ErrorException $ex){
            \Log::error('Greska sa fajlom'.$ex->getMessage());
            return redirect()->back()->with('error','Greska sa fajlom');
        }
    }


    public function updatePost($id,Request $request){



        $post=new Post();
        $post->id=$id;

        $post->naslov=$request->get('title');
        $post->opis=$request->get('desc');
        $post->sadrzaj=$request->get('content');


        $post->alt=trim($request->get('alt'));
        $post->id_korisnik=1;
        $photo=$request->file('photo');

        try{

            if(!empty($photo)){





                $tmp_putanja = $photo->getPathName();
                $ime_fajla = time().'.'.$photo->getClientOriginalExtension();
                $putanja = 'images/'.$ime_fajla;
                $putanja_server = public_path($putanja);

                File::move($tmp_putanja, $putanja_server);

                $post->slika = $putanja;
            }





            $post->update();

            return redirect('/post/tabela');

        }
        catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return redirect()->back()->with('error','Greska pri ubacivanju u bazu');
        }
        catch(FileException $ex){
            \Log::error('Pogresan fajl'.$ex->getMessage());
            return redirect()->back()->with('error','Greska sa slikom');
        }
        catch(ErrorException $ex){
            \Log::error('Greska sa fajlom'.$ex->getMessage());
            return redirect()->back()->with('error','Greska sa fajlom');
        }
    }

    public function deletePost($id){

        $post=new Post();
        $post->id=$id;


        $post->delete();
        return redirect()->back()->with('succeess','Uspeh!');
    }
    // AJAX all
    public function index(){
        try{

            $posts = $this->model->get();
            return response($posts, 200);
        }
        catch(\Exception $ex){
            \Log::error('Greska: ' . $ex->getMessage());
            return response(null, 500);
        }
    }
    // AJAX search
    public function search(Request $request){

        $this->model=new Post();

        $unos = $request->get('unos');


        return $this->model->getByUnos($unos);


    }


}
