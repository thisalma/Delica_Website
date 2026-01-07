<?php

namespace App\Livewire;

use Livewire\Component;

class CartPage extends Component
{
    public $cart;

    public function mount()
    {
        $this->cart = auth()->user()->cart;

        if (!$this->cart) {
            $this->cart = auth()->user()->cart()->create();
        }
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
        // ✅ Load items WITH product
        $items = $this->cart->items()->with('product')->get();

        $total = $items->sum(fn ($item) =>
            $item->product->price * $item->quantity
        );

        return view('livewire.cart-page', [
            'items' => $items,
            'total' => $total,
        ])->layout('components.layouts.customer');
    }
}
