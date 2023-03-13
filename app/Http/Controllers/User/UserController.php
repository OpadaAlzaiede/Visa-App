<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $users = User::with(['visas'])
                    ->all();

        return view('admin.users', compact('users'));
    }
}
