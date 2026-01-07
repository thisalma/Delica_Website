<x-layouts.customer>

<div class="max-w-6xl mx-auto px-6 py-10">

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- LEFT CARD -->
        <div class="bg-white rounded-xl shadow p-6 text-center">

            @if($user->profile_image)
                <img src="{{ asset('storage/'.$user->profile_image) }}"
                     class="w-32 h-32 rounded-full object-cover mx-auto mb-4">
            @else
                <img src="https://api.dicebear.com/7.x/adventurer/svg?seed={{ $user->name }}"
                     class="w-32 h-32 rounded-full mx-auto mb-4">
            @endif

            <h2 class="text-2xl font-bold text-pink-600">{{ $user->name }}</h2>
            <p class="text-gray-600">{{ $user->email }}</p>
            <p class="text-gray-600">{{ $user->phone ?? 'No phone' }}</p>
            <p class="text-gray-700">{{ $user->address ?? 'No address added' }}</p>

            <div class="mt-4 bg-pink-100 text-pink-700 px-4 py-2 rounded">
                Total Orders: <b>{{ $orderCount }}</b>
            </div>
        </div>

        <!-- RIGHT FORM -->
        <div class="md:col-span-2 bg-white rounded-xl shadow p-6">

            <h3 class="text-xl font-bold text-pink-600 mb-4">
                Edit Profile
            </h3>

            <form method="POST" action="{{ route('customer.profile.update') }}"
                  enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="font-semibold">Full Name</label>
                    <input type="text" name="name" value="{{ $user->name }}"
                           class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="font-semibold">Email</label>
                    <input type="email" value="{{ $user->email }}"
                           readonly class="w-full border rounded p-2 bg-gray-100">
                </div>

                <div>
                    <label class="font-semibold">Phone</label>
                    <input type="text" name="phone" value="{{ $user->phone }}"
                           class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="font-semibold">Address</label>
                    <input type="text" name="address" value="{{ $user->address }}"
                           class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="font-semibold">Profile Picture</label>
                    <input type="file" name="profile_image"
                           class="w-full border rounded p-2">
                </div>

                <button type="submit"
                        class="bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700">
                    Save Changes
                </button>

            </form>

        </div>

    </div>

</div>

</x-layouts.customer>
