<?php

namespace App\Http\Controllers\RoomType;

use App\Http\Controllers\Controller;
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    public function index() {

        $types = RoomType::all();
    }
}
