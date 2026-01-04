<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-600">
            Account Pending Approval
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-md w-full bg-white p-8 rounded-xl shadow text-center">
            <h1 class="text-2xl font-bold text-pink-600 mb-4">
                Your Account is Pending
            </h1>
            <p class="text-gray-700 mb-4">
                Your provider account is waiting for admin approval.
            </p>
            <p class="text-sm text-gray-500 mb-6">
                You will be notified once your account is approved.
            </p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">Logout</button>
            </form>
        </div>
    </div>
</x-app-layout>
