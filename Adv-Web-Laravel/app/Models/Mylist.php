<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mylist extends Model
{
    use HasFactory;

    protected $table = 'favorites';
    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(Customers::class,'c_id');
    }

    public function movie()
    {
        return $this->belongsTo(Movies::class,'m_id');
    }


}
