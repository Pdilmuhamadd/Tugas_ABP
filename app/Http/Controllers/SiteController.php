<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SiteController extends Controller
{
    public function auth(Request $req) {
        $u = User::where([
            ['email', $req->em],
            ['password', $req->pwd],
        ])->first();

        if (isset($u)) {
            session()->put('email', $u->email);
            session()->put('name', $u->name);

            return "<script>
            alert('Welcome, " . session('name') . "');
            location.href='/product';
            </script>";
        }
        return redirect('/login')->with('msg', 'Email / password salah');
    }
}
