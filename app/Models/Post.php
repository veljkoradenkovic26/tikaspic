<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;


class Post {
    //put your code here
    public $id;
    public $naslov;
    public $opis;
    public $sadrzaj;
    public $slika;
    public $alt;
    public $id_korisnik;
    private $table = 'post';

    public function getAll($perPage){
        $rezultat= DB::table($this->table)
            ->select('*')
            ->join('korisnik','korisnik.id_korisnik','=','post.id_korisnik')
            ->paginate($perPage);

        return $rezultat;
    }
    public function getPosts(){
        $rezultat= DB::table($this->table)
            ->select('*')
            ->join('korisnik','korisnik.id_korisnik','=','post.id_korisnik')
            ->get();

        return $rezultat;
    }

    public function getByUnos($unos){
        $rezultat= DB::table($this->table)
            ->select('*','post.id_post as postId')
            ->join('korisnik as k','post.id_korisnik','=','k.id_korisnik')
            ->where('post.naslov','like','%'.$unos.'%')
            ->orWhere('post.sadrzaj','like','%'.$unos.'%')
            ->orderBy('post.kreirano','desc')
            ->get();
        ;
        return $rezultat;
    }





    public function get($id){
        $rezultat= DB::table($this->table)
            ->select('*',
                'korisnik.korisnicko_ime as postKorisnik')
            ->join('korisnik','korisnik.id_korisnik','=','post.id_korisnik')
            ->where('post.id_post','=',$id)
            ->first();
        return $rezultat;

    }

    public function getPost() {
        $rezultat = DB::table($this->table)
            ->select('*')
            ->where('id_post',$this->id)
            ->first();
        return $rezultat;
    }

    public function insert(){

        $rezultat=DB::table($this->table)
            ->insert([
                'naslov'=>$this->naslov,
                'opis'=>$this->opis,
                'sadrzaj'=>$this->sadrzaj,
                'slika'=>$this->slika,
                'alt'=>$this->alt,
                'id_korisnik'=>$this->id_korisnik,
                'kreirano'=>time()

            ]);
        return $rezultat;
    }

    public function update(){
        $data=[
            'naslov'=>$this->naslov,
            'opis'=>$this->opis,
            'sadrzaj'=>$this->sadrzaj,
            'alt'=>$this->alt,
            'id_korisnik'=>$this->id_korisnik,
            'kreirano'=>time()
        ];

        if(!empty($this->slika)){

            $data['slika'] = $this->slika;
        }

        $rezultat = DB::table($this->table)
            ->where('id_post',$this->id)
            ->update($data)
        ;
        return $rezultat;
    }

    public function delete(){
        $rezultat=DB::table($this->table)
            ->where('id_post',$this->id)
            ->delete();
        return $rezultat;
    }

}
