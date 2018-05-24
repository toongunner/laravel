<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Meter extends Model
{
    protected $table = 'meters';
    
    protected $fillable = ['metRadio', 'metQty', 'metCode','metSerial', 'metCon', 'metSize', 'metRadio2', 'metEtc'];
    
    public function saveData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['metRadio'];
        $this->qty = $data['metQty'];
        $this->code = $data['metCode'];
        $this->serial = $data['metSerial'];
        $this->condition = $data['metCon'];
        $this->size = $data['metSize'];
        $this->result = $data['metRadio2'];
        $this->note = $data['metEtc'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
}
