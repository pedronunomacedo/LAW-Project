<div class="card user_order">
    <div class="card-body">
        <h4 class="card-title">Order {{ $order->id }}</h4>
        <div class="order_info">
            <p>{{ $order->orderdate }} | {{ $order->products()->get()->sum('pivot.totalprice') }} € | {{ $order->orderstate }}</p>
        </div>
        <div class="order_products">
            <h5>Products</h5>
            @foreach($order->products()->get() as $product)
                <div id="order{{ $order->id }}Product{{ $product->id }}">
                    <p>{{ $product->prodname }} | {{ $product->pivot->quantity }} | {{ $product->pivot->totalprice }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>