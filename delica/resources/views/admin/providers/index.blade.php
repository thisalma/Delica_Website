@extends('admin.layouts.app') {{-- We'll create a layout for admin later --}}

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Provider Management</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto">
    <table class="min-w-full bg-white rounded-xl shadow">
        <thead class="bg-pink-600 text-white">
            <tr>
                <th class="py-2 px-4 text-left">Name</th>
                <th class="py-2 px-4 text-left">Email</th>
                <th class="py-2 px-4 text-left">Status</th>
                <th class="py-2 px-4 text-left">Action</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach($providers as $p)
            <tr class="{{ $p->approved ? 'bg-gray-50' : '' }}">
                <td class="py-2 px-4">{{ $p->name }}</td>
                <td class="py-2 px-4">{{ $p->email }}</td>
                <td class="py-2 px-4">{{ $p->approved ? 'Approved' : 'Pending' }}</td>
                <td class="py-2 px-4">
                    @if(!$p->approved)
                        <a href="{{ route('admin.providers.approve', $p->id) }}" class="text-green-600 hover:underline">Approve</a> | 
                        <a href="{{ route('admin.providers.decline', $p->id) }}" class="text-red-600 hover:underline">Decline</a>
                    @else
                        ✔️
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
