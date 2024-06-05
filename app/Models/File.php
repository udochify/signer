<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'address',
        'user_id',
        'name',
        'path',
        'size',
        'hash',
        'is_url',
        'privacy_email',
        'privacy_name',
        'privacy_address',
        'privacy_phone',
        'privacy_gender',
    ];
    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
