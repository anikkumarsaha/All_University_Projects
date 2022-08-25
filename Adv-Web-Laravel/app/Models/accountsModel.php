<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\moviesModel;
use App\Models\customersMoviesModel;

class accountsModel extends Model
{
    use HasFactory;

    protected $table = "accounts";

    public $timestamps=false;

}
