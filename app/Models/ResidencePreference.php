<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidencePreference extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'visa_id'];

    public function visa() {

        return $this->belongsTo(Visa::class);
    }

    public function roomTypes() {

        return $this->belongsToMany(RoomType::class);
    }
}
