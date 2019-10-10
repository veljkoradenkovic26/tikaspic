<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;


use Illuminate\Support\Facades\DB;


class Komentar {
    //put your code here

    public $id;
    public $tekst;
    public $id_post;
    public $id_korisnik;
    private $table='komentar';


    public function get($id){
        $rezultat=DB::select('SELECT * FROM komentar'
            . ' JOIN post ON post.id_post=komentar.id_post'
            . ' JOIN korisnik ON korisnik.id_korisnik=komentar.id_korisnik'
            . ' WHERE komentar.id_post='.$id);

        return $rezultat;
    }

    public function getAll(){
        $rezultat=DB::table($this->table)
            ->select('*')
            ->join('post', 'post.id_post','=','komentar.id_post')
            ->join('korisnik','korisnik.id_korisnik','=','komentar.id_korisnik')
            ->get();


        return $rezultat;
    }

    public function getCom(){
        $rezultat=DB::table($this->table)
            ->select('*')
            ->join('post', 'post.id_post','=','komentar.id_post')
            ->join('korisnik','korisnik.id_korisnik','=','komentar.id_korisnik')
            ->where('komentar.id_komentar',$this->id)
            ->first();

        return $rezultat;
    }
    public function insert(){
        $rezultat=DB::table($this->table)
            ->insert([
                'tekst'=>$this->tekst,
                'id_post'=>$this->id_post,
                'id_korisnik'=>$this->id_korisnik
            ]);
        return $rezultat;
    }

    public function update(){

        $rezultat=DB::table($this->table)
            ->where('id_komentar',$this->id)
            ->update([
                'tekst'=>$this->tekst,
                'id_post'=>$this->id_post,
                'id_korisnik'=>$this->id_korisnik
            ]);
        return $rezultat;
    }

    public function delete(){
        $rezultat=DB::table($this->table)
            ->where('id_komentar',$this->id)
            ->delete();
        return $rezultat;
    }
}
