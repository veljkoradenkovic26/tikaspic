<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Support\Facades\DB;


class Tim {
    //put your code here

    public $id;
    public $putanja;
    public $alt;
    public $naslov;
    private $table='tim';

    public function getAll($perPage){

        $rezultat=DB::table($this->table)
            ->select('*')
            ->paginate($perPage);


        return $rezultat;
    }

}
