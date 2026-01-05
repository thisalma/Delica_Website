@extends('provider.layouts.app')

@section('title', 'Pending Approval')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center">
    <div class="bg-white p-10 rounded-2xl shadow-lg text-center max-w-md w-full">

        <h1 class="text-3xl font-extrabold text-pink-600 mb-4">
            Welcome, {{ auth()->user()->name }} 🌸
        </h1>

        <p class="text-gray-700 mb-3">
            Your provider account is currently under review.
        </p>

        <p class="text-sm text-gray-500 mb-6">
            Once approved by the admin, you will gain full access to your dashboard.
        </p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                class="w-full py-2 bg-pink-500 text-white rounded-lg font-semibold hover:bg-pink-600 transition">
                Logout
            </button>
        </form>

    </div>
</div>
@endsection
