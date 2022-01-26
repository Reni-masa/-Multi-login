<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'information',
        'filename',
        'is_selling',
    ];

    // リレーション
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
