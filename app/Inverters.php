<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Inverters extends Model
{
    protected $table = 'inverters';
    
    protected $fillable = ['invRadio', 'invQty', 'invRoom','invFl', 'invCode', 'invBrand','invSno', 'invMod', 'invSize','invYear','invRadio2','invEtc'];
    
    public function saveData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['invRadio'];
        $this->qty = $data['invQty'];
        $this->room = $data['invRoom'];
        $this->floor = $data['invFl'];
        $this->code = $data['invCode'];
        $this->brand = $data['invBrand'];
        $this->serial = $data['invSno'];
        $this->model = $data['invMod'];
        $this->size = $data['invSize'];
        $this->year = $data['invYear'];
        $this->check1 = $data['invRadio2'];
        $this->note1 = $data['invEtc'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
    
    public function savenonData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['invRadio'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
}
