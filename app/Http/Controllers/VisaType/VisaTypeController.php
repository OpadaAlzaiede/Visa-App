<?php

namespace App\Http\Controllers\VisaType;

use App\Http\Controllers\Controller;
use App\Models\VisaType;
use Illuminate\Http\Request;

class VisaTypeController extends Controller
{
    public function index() {

        $types = VisaType::all();
    }
}
