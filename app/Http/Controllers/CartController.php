<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Add a product to the cart (stored in session).
     */
    public function add(Request $request): RedirectResponse
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('product_id');

        $cart[$productId] = ($cart[$productId] ?? 0) + 1;

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * Show the current cart contents.
     */
    public function index(): View
    {
        $cart = session()->get('cart', []);
        $cartItems = [];

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                ];
            }
        }

        return view('cart.index', compact('cartItems'));
    }

    /**
     * Checkout and create order for the logged-in user.
     */
    public function checkout(): RedirectResponse
    {
        $cart = session('cart');

        if (!$cart || empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty');
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Start order with total 0
        $order = $user->orders()->create([
            'total' => 0
        ]);

        $total = 0;

        foreach ($cart as $id => $qty) {
            $product = Product::find($id);

            if (!$product) continue;

            $total += $product->price * $qty;

            $order->items()->create([
                'product_id' => $id,
                'quantity' => $qty,
                'price' => $product->price,
            ]);
        }

        $order->update(['total' => $total]);

        session()->forget('cart');

        return redirect('/')->with('success', 'Order placed successfully!');
    }
}
