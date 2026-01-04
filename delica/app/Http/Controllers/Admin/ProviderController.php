<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProviderController extends Controller
{
    // List all providers
    public function index()
    {
        $providers = User::where('role', 'provider')->orderBy('created_at', 'desc')->get();
        return view('admin.providers.index', compact('providers'));
    }

    // Approve provider
    public function approve($id)
    {
        $provider = User::findOrFail($id);
        $provider->approved = true;
        $provider->save();

        return redirect()->route('admin.providers')->with('success', 'Provider approved successfully.');
    }

    // Decline provider
    public function decline($id)
    {
        $provider = User::findOrFail($id);
        $provider->approved = false;
        $provider->save();

        return redirect()->route('admin.providers')->with('success', 'Provider declined.');
    }
}
