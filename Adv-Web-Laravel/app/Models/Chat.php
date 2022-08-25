<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'inboxs';

    public function AnotherSide()
    {
        return $this->hasOne(Accounts::class,'u_id');
    }

    public function Me()
    {
        return $this->hasOne(Accounts::class,'s_id');
    }
    
}
