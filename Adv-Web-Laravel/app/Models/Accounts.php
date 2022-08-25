<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $table = 'accounts';
    public $timestamps = false;

    public function MapCustomersMovies()
    {
        return $this->HasMany(Map_Customers_Movies::class,'c_id');
    }

    public function MyList()
    {
        return $this->HasMany(Mylist::class,'c_id');
    }


}
