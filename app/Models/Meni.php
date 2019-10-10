<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;


class Meni {
    //put your code here
    public $id;
    public $naziv;
    public $link;
    public $tip;
    private $table = 'meni';
    
     public function getAll(){
        
        $rezultat= DB::table($this->table)
                ->select('*')
                ->where('tip','=','korisnik')
                ->get();
        return $rezultat;
    }
    public function getAdmin(){
        
        $rezultat= DB::table($this->table)
                ->select('*')
                ->where('tip','=','admin')
                ->get();
        return $rezultat;
    }
    
       public function insert(){
        $rezultat=DB::table($this->table)
                ->insert([
                    'naziv'=>$this->naziv,
                    'link'=>$this->link,
                    'tip'=>$this->tip
                ]);
        return $rezultat;
    }
    
    public function update(){
        $rezultat=DB::table($this->table)
                ->update([
                    'naziv'=>$this->naziv,
                    'link'=>$this->link,
                    'tip'=>'korisnik'
                ]);
        return $rezultat;
    }
    
    public function delete(){
		$rezultat = DB::table($this->table)
			->where('id_meni', $this->id)
			->delete();
		return $rezultat;
	}
}
