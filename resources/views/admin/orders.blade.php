@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Admin - All Orders</h2>

    @foreach($orders as $order)
        <div class="border p-4 mb-4 rounded shadow-sm">
            <p><strong>Order #{{ $order->id }}</strong> by {{ $order->user->name }}</p>
            <p>Total: ₦{{ number_format($order->total, 2) }}</p>
            <ul class="ml-4 mt-2 text-sm text-gray-600">
                @foreach($order->items as $item)
                    <li>{{ $item->product->name }} x {{ $item->quantity }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
@endsection
