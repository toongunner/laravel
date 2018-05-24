<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Mdb extends Model
{
    protected $table = 'mdbs';
    
    protected $fillable = ['mdbRadio', 'mdbQty', 'mdbRadio2','mdbCode', 'mdbBrand', 'mdbPhrase','mdbSize', 'mdbYear', 'mdbMBreaker','mdbFXBreaker', 'mdbRLoad', 'mdbSLoad','mdbTLoad','mdbTRadio', 'mdbEtc', 'mdbTRadio2','mdbEtc2', 'metTRadio3', 'mdbEtc3','mdbTRadio4', 'mdbEtc4', 'mdbRadio3','mdbEtc5'];

    public function saveData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['mdbRadio'];
        $this->qty = $data['mdbQty'];
        $this->type = $data['mdbRadio2'];
        $this->code = $data['mdbCode'];
        $this->brand = $data['mdbBrand'];
        $this->phrase = $data['mdbPhrase'];
        $this->size = $data['mdbSize'];
        $this->year = $data['mdbYear'];
        $this->mcb = $data['mdbMBreaker'];
        $this->fx = $data['mdbFXBreaker'];
        $this->r = $data['mdbRLoad'];
        $this->s = $data['mdbSLoad'];
        $this->t = $data['mdbTLoad'];
        $this->check1 = $data['mdbTRadio'];
        $this->note1 = $data['mdbEtc'];
        $this->check2 = $data['mdbTRadio2'];
        $this->note2 = $data['mdbEtc2'];
        $this->check3 = $data['metTRadio3'];
        $this->note3 = $data['mdbEtc3'];
        $this->check4 = $data['mdbTRadio4'];
        $this->note4 = $data['mdbEtc4'];
        $this->result = $data['mdbRadio3'];
        $this->note5 = $data['mdbEtc5'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
        
}
