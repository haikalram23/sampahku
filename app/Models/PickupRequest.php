<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'alamat', 'jenis_sampah', 'berat_sampah', 'tanggal', 'jam', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
