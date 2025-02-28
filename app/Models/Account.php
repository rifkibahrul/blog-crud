<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Account extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'account';
    protected $primaryKey = 'username';
    protected $fillable = ['username', 'password', 'name', 'role'];
    public $incrementing = false; // Karena primary key bukan integer

    public function posts()
    {
        return $this->hasMany(Post::class, 'username', 'username');
    }
}
