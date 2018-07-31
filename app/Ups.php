<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ups extends Model
{
    protected $table = 'ups';
    
    protected $fillable = ['upsRadio','upsRoom','upsFl', 'upsCode', 'upsBrand','upsSno', 'upsMod', 'upsSize','upsYear','upsRadio2','upsEtc'];
    
    public function saveData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['upsRadio'];
        $this->room = $data['upsRoom'];
        $this->floor = $data['upsFl'];
        $this->code = $data['upsCode'];
        $this->brand = $data['upsBrand'];
        $this->serial = $data['upsSno'];
        $this->model = $data['upsMod'];
        $this->size = $data['upsSize'];
        $this->year = $data['upsYear'];
        $this->check1 = $data['upsRadio2'];
        $this->note1 = $data['upsEtc'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
    
    public function savenonData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['upsRadio'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
}
