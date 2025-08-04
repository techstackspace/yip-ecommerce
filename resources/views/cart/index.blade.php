@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Your Cart</h2>

    @if (count($cartItems))
        @foreach($cartItems as $item)
            <div class="border p-4 mb-4 rounded shadow-sm">
                <p><strong>{{ $item['product']->name }}</strong></p>
                <p>Quantity: {{ $item['quantity'] }}</p>
                <p>Price: ₦{{ number_format($item['product']->price * $item['quantity'], 2) }}</p>
            </div>
        @endforeach

        <form method="POST" action="{{ route('cart.checkout') }}">
            @csrf
            <button class="bg-green-600 text-white px-4 py-2 rounded">Checkout</button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
