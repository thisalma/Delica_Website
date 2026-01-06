<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;

class CartPage extends Component
{
    public $cart;

    public function mount()
    {
        // Get existing cart or create a new one for the authenticated user
        $this->cart = auth()->user()->cart
            ?? auth()->user()->cart()->create();
    }

    public function increase($id)
    {
        $item = $this->cart->items()->find($id);
        if ($item) {
            $item->increment('quantity');
        }
    }

    public function decrease($id)
    {
        $item = $this->cart->items()->find($id);
        if ($item && $item->quantity > 1) {
            $item->decrement('quantity');
        }
    }

    public function remove($id)
    {
        $item = $this->cart->items()->find($id);
        if ($item) {
            $item->delete();
        }
    }

    public function render()
    {
        $items = $this->cart->items()->with('product')->get();
        $total = $items->sum(fn($i) => $i->product->price * $i->quantity);

        return view('livewire.cart-page', [
            'items' => $items,
            'total' => $total,
        ])->layout('components.layouts.customer'); // <-- Wraps the page in your layout
    }
}
