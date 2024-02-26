<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'user_id', 'review', 'star'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Jika Anda ingin menyertakan relasi ke user, tambahkan ini:
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}