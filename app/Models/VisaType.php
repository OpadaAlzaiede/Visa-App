<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function visas() {

        return $this->hasMany(Visa::class);
    }
}
