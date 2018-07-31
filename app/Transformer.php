<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transformer extends Model
{
    protected $table = 'transformers';
    
    protected $fillable = ['tranRadio','tranBrand','tranPhrase','tranSize','tranYear','tranTRadio','tranEtc','tranTRadio2','tranEtc2','tranRadio2','tranEtc3'];
    
    public function saveData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['tranRadio'];
        $this->brand = $data['tranBrand'];
        $this->phrase = $data['tranPhrase'];
        $this->size = $data['tranSize'];
        $this->year = $data['tranYear'];
        $this->check1 = $data['tranTRadio'];
        $this->note1 = $data['tranEtc'];
        $this->check2 = $data['tranTRadio2'];
        $this->note2 = $data['tranEtc2'];
        $this->result = $data['tranRadio2'];
        $this->note3 = $data['tranEtc3'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
    
    public function savenonData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['tranRadio'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
    
   
}
