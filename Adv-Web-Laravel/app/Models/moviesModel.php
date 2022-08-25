<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\accountsModel;
use App\Models\customersMoviesModel;

class moviesModel extends Model
{
    use HasFactory;

    protected $table = "movies";
    protected $primaryKey = "id";
    public $timestamps=false;
    
}
