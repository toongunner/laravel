<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Rectifier extends Model
{
    protected $table = 'rectifiers';
    
    protected $fillable = ['recRadio','recBrand', 'recSno', 'recYear','recVolt', 'recLoad', 'recMod','recQty','recTRadio', 'recEtc', 'recTRadio2','recEtc2', 'recTRadio3', 'recEtc3','recTRadio4', 'recEtc4', 'recRadio2','recEtc5'];

    public function saveData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['recRadio'];
        $this->brand = $data['recBrand'];
        $this->ctrlserial = $data['recSno'];
        $this->year = $data['recYear'];
        $this->rectvolt = $data['recVolt'];
        $this->currload = $data['recLoad'];
        $this->rectmodule = $data['recMod'];
        $this->qty = $data['recQty'];
        $this->check1 = $data['recTRadio'];
        $this->note1 = $data['recEtc'];
        $this->check2 = $data['recTRadio2'];
        $this->note2 = $data['recEtc2'];
        $this->check3 = $data['recTRadio3'];
        $this->note3 = $data['recEtc3'];
        $this->check4 = $data['recTRadio4'];
        $this->note4 = $data['recEtc4'];
        $this->result = $data['recRadio2'];
        $this->note5 = $data['recEtc5'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
    
    public function savenonData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['recRadio'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
}
