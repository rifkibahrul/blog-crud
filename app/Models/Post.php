<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post'; // Pastikan nama tabel sesuai
    protected $primaryKey = 'idpost'; // Sesuai dengan skema database
    public $timestamps = false; // Matikan timestamps

    protected $fillable = ['title', 'content', 'date', 'username'];

    public function account()
    {
        return $this->belongsTo(Account::class, 'username', 'username');
    }
}
