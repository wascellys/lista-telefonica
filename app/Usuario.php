<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{   


    protected $fillable = [
        'nome', 'user', 'telefone',
    ];


    // protected $casts = [
    //     'user' => 'datetime',
    // ];


    // //user pertence
    // public function user(){
    //     return $this->belongTo(User::class,'user');
    // }


     //usuario tem um user
     public function user(){
        return $this->belongsTo(User::class);
    }
}
