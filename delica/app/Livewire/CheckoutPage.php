<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutPage extends Component
{
    public $items;
    public $subtotal = 0;
    public $paymentMethod = null;
    public $deliveryFee = 250;

    public function mount()
    {
        $user = Auth::user();

        // 🔒 Block checkout if profile incomplete
        if (!$user->phone || !$user->address) {
            return redirect()->route('customer.cart')
                ->with('error', 'Please complete your profile before checkout.');
        }

        // ✅ Load the user's cart items with product
        $cart = $user->cart;

        if (!$cart || $cart->items()->count() === 0) {
            return redirect()->route('customer.cart')
                ->with('error', 'Your cart is empty.');
        }

        $this->items = $cart->items()->with('product')->get();

        // Calculate subtotal
        $this->subtotal = $this->items->sum(fn($i) => $i->product->price * $i->quantity);
    }

    public function updatedPaymentMethod()
    {
        $this->deliveryFee = $this->paymentMethod === 'COD' ? 250 : 0;
    }

    public function placeOrder()
    {
        $user = Auth::user();

        if (!$this->items || $this->items->isEmpty()) {
            return redirect()->route('customer.cart')
                ->with('error', 'Your cart is empty.');
        }

        // ✅ Create the order
        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $this->subtotal + $this->deliveryFee,
            'status' => 'pending',
            'payment_method' => $this->paymentMethod,
        ]);

        // ✅ Create order items
        foreach ($this->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // ✅ Remove cart items (not the cart)
        $cart = $user->cart;
        if ($cart) {
            $cart->items()->delete();
        }

        return redirect()->route('customer.orders')
            ->with('success', 'Order placed successfully 🎉');
    }

    public function render()
    {
        return view('livewire.checkout-page', [
            'items' => $this->items,
            'subtotal' => $this->subtotal,
            'deliveryFee' => $this->deliveryFee,
            'total' => $this->subtotal + $this->deliveryFee,
        ]);
    }
}
