<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $table    = "training";
    protected $guarded  = []; 
    protected $appends  = ['devt_type'];   

    public function venues()
    {
        return $this->belongsTo(Venues::class, 'venuecode','Venuecode');
    }

    public function reftrain()
    {
        return $this->belongsTo(RefTrain::class, 'ref_train_train_num','train_num');
    }
   
    public function TrainAvail()
    {
        return $this->belongsTo(EmployeeTrainAvail::class, 'tr_code', 'tr_code');
    }

    public function facilitators()
    {
        return $this->belongsTo(Facilitator::class, 'facilcode', 'fac_code');
    }

    public function getDevtTypeAttribute()
    {
        $data = "";
        return $data;
    }
}
