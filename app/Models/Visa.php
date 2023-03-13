<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'user_id'];

    public function type() {

        return $this->belongsTo(VisaType::class);
    }

    public function residencePreference() {

        return $this->hasOne(ResidencePreference::class);
    }
}
