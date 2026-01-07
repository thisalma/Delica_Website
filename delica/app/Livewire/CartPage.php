<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;

class CartPage extends Component
{
    public $cart;

    public function mount()
    {
        // Get the user's cart with items and related products (eager loaded)
        $this->cart = auth()->user()->cart()->with('items.product')->first();

        // If the user has no cart, create one
        if (!$this->cart) {
            $this->cart = auth()->user()->cart()->create();
        }
    }

    public function increase($id)
    {
        $item = $this->cart->items->find($id);
        if ($item) {
            $item->increment('quantity');
            $item->refresh(); // Refresh the model to get the latest value
            $this->cart->refresh(); // Refresh cart relations
        }
    }

    public function decrease($id)
    {
        $item = $this->cart->items->find($id);
        if ($item && $item->quantity > 1) {
            $item->decrement('quantity');
            $item->refresh();
            $this->cart->refresh();
        }
    }

    public function remove($id)
    {
        $item = $this->cart->items->find($id);
        if ($item) {
            $item->delete();
            $this->cart->refresh();
        }
    }

    public function render()
    {
        $items = $this->cart->items->where('selected', true);
        $total = $items->sum(fn($i) => $i->product->price * $i->quantity);

        return view('livewire.cart-page', [
            'items' => $items,
            'total' => $total,
        ])->layout('components.layouts.customer');
    }
}
