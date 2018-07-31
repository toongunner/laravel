<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Mdb extends Model
{
    protected $table = 'mdbs';
    
    protected $fillable = ['mdbRadio','mdbRadio2','mdbBrand', 'mdbPhrase','mdbYear', 'mdbMBreaker','mdbFXBreaker', 'mdbRLoad', 'mdbSLoad','mdbTLoad','mdbTRadio', 'mdbEtc', 'mdbTRadio2','mdbEtc2', 'mdbTRadio3', 'mdbEtc3','mdbTRadio4', 'mdbEtc4', 'mdbRadio3','mdbEtc5'];

    public function saveData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['mdbRadio'];
        $this->type = $data['mdbRadio2'];
        $this->brand = $data['mdbBrand'];
        $this->phrase = $data['mdbPhrase'];
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
        $this->check3 = $data['mdbTRadio3'];
        $this->note3 = $data['mdbEtc3'];
        $this->check4 = $data['mdbTRadio4'];
        $this->note4 = $data['mdbEtc4'];
        $this->result = $data['mdbRadio3'];
        $this->note5 = $data['mdbEtc5'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
    
    public function savenonData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['mdbRadio'];       
        $this->mby = Auth::user()->name;
        $this->save();
    }
        
}
