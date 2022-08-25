<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\accountsModel;
use App\Models\moviesModel;


class customersMoviesModel extends Model
{
    use HasFactory;

    protected $table = "map_customer_movie";
    protected $primaryKey = "id";
    public $timestamps=false;

    public function accountsModel(){
        return $this->belongsTo(accountsModel::class,'c_id','id');
    }

    public function moviesModel(){
        return $this->belongsTo(moviesModel::class,'m_id','id');
    }
}
