<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function info()
    {
        $info = [];
        if (!empty(Auth::user())) {
            $info = [
                'name' => Auth::user()->name,
                'email' => Auth::user()->email
            ];
        }
        return json_encode($info, JSON_UNESCAPED_UNICODE);
    }
}
