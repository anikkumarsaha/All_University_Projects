<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;
    
    protected $table = 'movies';


    public function MapCustomersMovies()
    {
        return $this->HasMany(Map_Customers_Movies::class,'m_id');
    }

    public function MyList()
    {
        return $this->HasMany(Mylist::class,'m_id');
    }
}
