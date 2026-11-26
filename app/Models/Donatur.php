<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Donatur extends Model
{
    protected $table = 'donatur';
    public $timestamps = false;

    protected $fillable = ['nama', 'kontak', 'email', 'tampilkan', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
