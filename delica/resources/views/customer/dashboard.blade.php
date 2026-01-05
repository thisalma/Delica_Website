<x-layouts.customer>
    <div class="min-h-screen bg-gray-50">

       

        <!-- MAIN CONTENT -->
        <main class="max-w-7xl mx-auto px-6 py-8">

            <!-- LOGO + WELCOME -->
            <div class="flex flex-col items-center justify-center mb-8">
                <img src="{{ asset('images/LOGO.png') }}" 
                     class="w-28 h-28 object-contain rounded-full shadow-md mb-3" 
                     alt="Delica Logo">
                <h1 class="text-3xl font-extrabold text-pink-600 tracking-wide">
                    DELICA
                </h1>
                <p class="mt-2 text-gray-700">Welcome to your customer dashboard!</p>
            </div>

           

            <!-- BANNER -->
            <div class="mt-8">
                <img src="{{ asset('images/banner_new.png') }}" 
                     class="w-full h-full object-cover rounded-xl shadow-md"
                     alt="Promotional Banner">
            </div>

            <!-- GLOBAL JOURNEY -->
            <div class="mt-14 text-center">
                <h2 class="text-3xl font-bold text-pink-600 tracking-wide">
                    Our Global Journey
                </h2>
            </div>

            <!-- 2 BOXES SECTION -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">

                <!-- LEFT BOX -->
                <div class="bg-white shadow-lg p-6 rounded-xl flex gap-5 items-start">
                    <img src="{{ asset('assets/smallpic.png') }}" 
                         class="h-full w-28 object-cover rounded-lg shadow-md" 
                         alt="Authenticity">

                    <div>
                        <h3 class="text-xl font-bold text-pink-600 mb-2">Authenticity</h3>
                        <p class="text-gray-700 leading-relaxed">
                            At DELICA, we source our products from trusted international partners,
                            ensuring real ingredients, original flavors, and the highest quality.
                        </p>
                    </div>
                </div>

                <!-- RIGHT BOX WITH ICONS -->
                <div class="bg-white shadow-lg p-6 rounded-xl">
                    <h3 class="text-xl font-bold text-pink-600 mb-4">Why Choose Us?</h3>

                    <div class="space-y-5">

                        <x-dashboard.icon-card title="Quality Guarantee" icon="check-circle" description="We deliver only premium-grade products ensuring freshness and safety." />
                        <x-dashboard.icon-card title="Fast Delivery" icon="truck" description="Your favorite products delivered quickly and safely to your doorstep." />
                        <x-dashboard.icon-card title="Worldwide Selection" icon="globe" description="Explore products from different countries and unique global flavors." />

                    </div>
                </div>

            </div>

            <!-- ORDER IN 4 STEPS -->
            <div class="mt-16 text-center">
                <h2 class="text-3xl font-bold text-pink-600 tracking-wide mb-10">
                    Order in 4 Easy Steps
                </h2>

                <div class="flex flex-col md:flex-row items-center justify-center gap-10">
                    <x-dashboard.step-card number="1" title="Search" description="Browse our wide range of global products." icon="search" />
                    <x-dashboard.step-card number="2" title="Select" description="Choose your favorite items and add to cart." icon="plus" />
                    <x-dashboard.step-card number="3" title="Order" description="Complete your purchase in a few clicks." icon="shopping-bag" />
                    <x-dashboard.step-card number="4" title="Enjoy" description="Sit back and enjoy your items." icon="smile" />
                </div>
            </div>

            <div class="mt-32"></div>

            <!-- FOOTER -->
            <footer class="bg-pink-600 text-white w-full py-12 px-8">
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">

                    <div>
                        <h3 class="text-xl font-semibold mb-3">About DELICA</h3>
                        <p class="text-gray-100 leading-relaxed">
                            DELICA brings you authentic international snacks, drinks, and rare delicacies
                            sourced from trusted global suppliers.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold mb-3">Quick Links</h3>
                        <ul class="space-y-2 text-gray-100">
                            <li><a href="{{ route('customer.dashboard') }}" class="hover:text-white">Home</a></li>
                            <li><a href="{{ route('customer.products') }}" class="hover:text-white">Products</a></li>
                            <li><a href="{{ route('customer.cart') }}" class="hover:text-white">Cart</a></li>
                            <li><a href="{{ route('customer.orders') }}" class="hover:text-white">Order History</a></li>
                            <li><a href="{{ route('customer.profile') }}" class="hover:text-white">Profile</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold mb-3">Contact Us</h3>
                        <p class="text-gray-100 mb-3">Email: support@delica.com</p>
                        <p class="text-gray-100 mb-4">Phone: +94 76 123 4567</p>

                        <div class="flex space-x-4 mt-4">
                            <a href="#" class="hover:text-white"><x-icons.facebook /></a>
                            <a href="#" class="hover:text-white"><x-icons.instagram /></a>
                            <a href="#" class="hover:text-white"><x-icons.tiktok /></a>
                        </div>
                    </div>

                </div>

                <div class="text-center text-gray-200 mt-12 border-t border-pink-400 pt-6">
                    © {{ date('Y') }} DELICA — All Rights Reserved.
                </div>
            </footer>
        </main>
    </div>
</x-layouts.customer>
