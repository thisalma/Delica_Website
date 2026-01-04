<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    // Show all providers
    public function index()
    {
        $providers = User::where('role', 'provider')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.providers.index', compact('providers'));
    }

    // Approve a provider
    public function approve($id)
    {
        $provider = User::findOrFail($id);
        $provider->approved = true;
        $provider->save();

        return redirect()->route('admin.providers')->with('success', 'Provider approved successfully.');
    }

    // Decline a provider
    public function decline($id)
    {
        $provider = User::findOrFail($id);
        $provider->approved = false;
        $provider->save();

        return redirect()->route('admin.providers')->with('success', 'Provider declined.');
    }
}
