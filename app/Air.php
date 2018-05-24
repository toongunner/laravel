<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Air extends Model
{
    protected $table = 'airs';
    
    protected $fillable = ['acRadio','airQty','acRoom','acFl','acRadio2','acCode','acSup','acTmp','fcuName','fcuMod','fcuSer','fcuSize','acuName','acuMod','acuSer','acuYear','acRadio3','acuEtc'];
    
    public function saveData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['acRadio'];
        $this->qty = $data['airQty'];
        $this->room = $data['acRoom'];
        $this->floor = $data['acFl'];
        $this->type = $data['acRadio2'];
        $this->code = $data['acCode'];
        $this->powersup = $data['acSup'];
        $this->fcubrand = $data['fcuName'];
        $this->fcumodel = $data['fcuMod'];
        $this->fcuserial = $data['fcuSer'];
        $this->size = $data['fcuSize'];
        $this->acubrand = $data['acuName'];
        $this->acumodel = $data['acuMod'];
        $this->acuserial = $data['acuSer'];
        $this->year = $data['acuYear'];
        $this->result = $data['acRadio3'];
        $this->note1 = $data['acuEtc'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
    
}
