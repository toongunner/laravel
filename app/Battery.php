<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Battery extends Model
{
    protected $table = 'batteries';
    
    protected $fillable = ['battRadio', 'battRoom','battFl', 'battBrand', 'battMod','battSize', 'battType', 'battYear','battQty','battTRadio', 'battEtc', 'battTRadio2','battEtc2', 'battTRadio3', 'battEtc3','battTRadio4', 'battEtc4','battTRadio5','battEtc5','battRadio2','battEtc6'];

    public function saveData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['battRadio'];
        $this->room = $data['battRoom'];
        $this->floor = $data['battFl'];
        $this->brand = $data['battBrand'];
        $this->model = $data['battMod'];
        $this->size = $data['battSize'];
        $this->type = $data['battType'];
        $this->year = $data['battYear'];
        $this->qty = $data['battQty'];
        $this->check1 = $data['battTRadio'];
        $this->note1 = $data['battEtc'];
        $this->check2 = $data['battTRadio2'];
        $this->note2 = $data['battEtc2'];
        $this->check3 = $data['battTRadio3'];
        $this->note3 = $data['battEtc3'];
        $this->check4 = $data['battTRadio4'];
        $this->note4 = $data['battEtc4'];
        $this->check5 = $data['battTRadio5'];
        $this->note5 = $data['battEtc5'];
        $this->result = $data['battRadio2'];
        $this->note6 = $data['battEtc6'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
    
    public function savenonData($data)
    {
        $this->locid = $data['locationid'];
        $this->available = $data['battRadio'];
        $this->mby = Auth::user()->name;
        $this->save();
    }
}
