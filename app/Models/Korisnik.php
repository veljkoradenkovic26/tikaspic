<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Korisnik {
    //put your code here
     public $id;
    public $ime;
    public $prezime;
    public $email;
    public $korisnicko_ime;
    public $lozinka;
    public $id_uloga;
    private $table='korisnik';
    
    public function getAll(){
        
        $rezultat=DB::table($this->table)
                ->select('*')
                ->join('uloga','uloga.id_uloga','=','korisnik.id_uloga')
                ->get();
        return $rezultat;
    }
    
    public function get(){
        $rezultat=DB::table($this->table)
                ->select('*')
                ->where('id_korisnik',$this->id)
                ->first();
        return $rezultat;
    }
    
    public function getByUsernameAndPassword(){
        $rezultat=DB::table($this->table)
                ->select('*')
                ->join('uloga','uloga.id_uloga','=','korisnik.id_uloga')
                ->where([
                    'korisnicko_ime'=>$this->korisnicko_ime,
                    'lozinka'=>md5($this->lozinka)
                ])
                ->first();
        return $rezultat;
    }
    
    public function insert(){
        $rezultat=DB::table($this->table)
                ->insert([
                    'ime'=>$this->ime,
                    'prezime'=>$this->prezime,
                    'email'=>$this->email,
                    'korisnicko_ime'=>$this->korisnicko_ime,
                    'lozinka'=>md5($this->lozinka),
                    'id_uloga'=>2
                ]);
        return $rezultat;
    }
    
    public function update(){
        
        $rezultat=DB::table($this->table)
                ->where('id_korisnik',$this->id)
                ->update([
                    'ime'=>$this->ime,
                    'prezime'=>$this->prezime,
                    'email'=>$this->email,
                    'korisnicko_ime'=>$this->korisnicko_ime,
                    
                    'id_uloga'=>2
                ])
                ;
                
        return $rezultat;
    }
    
       public function delete(){
        $rezultat=DB::table($this->table)
                ->where('id_korisnik',$this->id)
                ->delete();
                
        return $rezultat;
    }
}
