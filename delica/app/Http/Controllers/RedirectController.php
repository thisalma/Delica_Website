<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'provider' && !$user->is_approved) {
            return view('provider.pending');
        }

        if ($user->role === 'provider') {
            return redirect('/provider/dashboard');
        }

        return redirect('/customer/dashboard');
    }
}
