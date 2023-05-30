<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'name',
        'company',
        'phone',
        'email',
    ];
    
    public function creator() {

        return $this->belongsTo(User::class);
    }
}
