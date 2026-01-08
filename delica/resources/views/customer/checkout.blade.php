<x-layouts.customer>
    <div class="min-h-screen bg-pink-50 py-10">
        <livewire:checkout-page />
    </div>

    <!-- Livewire Order Confirmation / Error Listeners -->
    <script>
        // Success event
        window.addEventListener('order-placed', event => {
            // Show confirmation alert
            if (confirm(event.detail.message)) {
                // Redirect to cart (or orders page)
                window.location.href = '/customer/cart'; // <-- change to your preferred route
            }
        });

        // Error event
        window.addEventListener('order-error', event => {
            alert(event.detail.message);
        });
    </script>
</x-layouts.customer>
