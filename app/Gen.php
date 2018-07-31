<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Gen extends Model
{
    protected $table = 'gens';
    
    protected $fillable = ['genRadio', 'genCode','EnBrand','EnSno', 'genYear','genBrand', 'genSno', 'genPhrase','genTRadio', 'genEtc', 'genTRadio2','genEtc2', 'genTRadio3', 'genEtc3','genTRadio4', 'genEtc4', 'genRadio2','genEtc5'];
    
    public function saveData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['genRadio'];
        $this->code = $data['genCode'];
        $this->enbrand = $data['EnBrand'];
        $this->enserial = $data['EnSno'];
        $this->year = $data['genYear'];
        $this->genbrand = $data['genBrand'];
        $this->genserial = $data['genSno'];
        $this->phrase = $data['genPhrase'];
        $this->check1 = $data['genTRadio'];
        $this->note1 = $data['genEtc'];
        $this->check2 = $data['genTRadio2'];
        $this->note2 = $data['genEtc2'];
        $this->check3 = $data['genTRadio3'];
        $this->note3 = $data['genEtc3'];
        $this->check4 = $data['genTRadio4'];
        $this->note4 = $data['genEtc4'];
        $this->result = $data['genRadio2'];
        $this->note5 = $data['genEtc5'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
    
    public function savenonData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['genRadio'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
}
