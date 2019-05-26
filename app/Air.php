<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Air extends Model
{
    protected $table = 'airstest';
    
    protected $fillable = ['acRadio','acRoom','acFl','acTmp','acRadio2','acSup','fcuName','fcuMod','fcuSer','fcuSize','acuName','acuMod','acuSer','acRadio3','acuEtc'];
    
    public function saveData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['acRadio'];
        $this->room = $data['acRoom'];
        $this->floor = $data['acFl'];
        $this->temp = $data['acTmp'];
        $this->type = $data['acRadio2'];
        $this->powersup = $data['acSup'];
        $this->fcubrand = $data['fcuName'];
        $this->fcumodel = $data['fcuMod'];
        $this->fcuserial = $data['fcuSer'];
        $this->size = $data['fcuSize'];
        $this->acubrand = $data['acuName'];
        $this->acumodel = $data['acuMod'];
        $this->acuserial = $data['acuSer'];
        $this->result = $data['acRadio3'];
        $this->note1 = $data['acuEtc'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
    
    public function savenonData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['acRadio'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
    
}
