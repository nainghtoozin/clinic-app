<x-public-layout>

    <div class="container py-5">

        {{-- Page Title --}}
        <div class="mb-4 text-center">
            <h2 class="fw-bold">My Cart</h2>
            <p class="text-muted">Review your selected products before checkout</p>
        </div>

        @if (empty($cart))
            {{-- Empty Cart --}}
            <div class="card border-0 shadow-sm text-center p-5">
                <i class="bi bi-cart-x fs-1 text-muted mb-3"></i>
                <h5>Your cart is empty</h5>
                <p class="text-muted mb-4">
                    Add products from the home page
                </p>
                <a href="{{ url('/') }}" class="btn btn-primary">
                    Continue Shopping
                </a>
            </div>
        @else
            <div class="row g-4">

                {{-- Cart Items --}}
                <div class="col-lg-8">

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0">
                            <h5 class="mb-0 fw-semibold">Cart Items</h5>
                        </div>

                        <div class="card-body">

                            @php $total = 0; @endphp

                            @foreach ($cart as $id => $item)
                                @php
                                    $subtotal = $item['price'] * $item['qty'];
                                    $total += $subtotal;
                                @endphp

                                <div class="d-flex align-items-center justify-content-between border rounded p-3 mb-3">

                                    {{-- Product Info --}}
                                    <div>
                                        <h6 class="mb-1">{{ $item['name'] }}</h6>
                                        <small class="text-muted">
                                            ${{ number_format($item['price'], 2) }}
                                        </small>
                                    </div>

                                    {{-- Quantity Controls --}}
                                    <div class="d-flex align-items-center gap-2">

                                        <button class="btn btn-outline-secondary btn-sm"
                                            onclick="updateQty({{ $id }}, {{ $item['qty'] - 1 }})">
                                            −
                                        </button>

                                        <span class="fw-semibold">{{ $item['qty'] }}</span>

                                        <button class="btn btn-outline-secondary btn-sm"
                                            onclick="updateQty({{ $id }}, {{ $item['qty'] + 1 }})">
                                            +
                                        </button>

                                    </div>

                                    {{-- Subtotal --}}
                                    <div class="fw-semibold">
                                        ${{ number_format($subtotal, 2) }}
                                    </div>

                                    {{-- Remove --}}
                                    <button class="btn btn-outline-danger btn-sm"
                                        onclick="removeItem({{ $id }})">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>

                {{-- Order Summary --}}
                <div class="col-lg-4">

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0">
                            <h5 class="mb-0 fw-semibold">Order Summary</h5>
                        </div>

                        <div class="card-body">

                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <span>Service Fee</span>
                                <span>$0.00</span>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                                <span>Total</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>

                            <a href="{{ route('checkout.index') }}" class="btn btn-primary w-100 btn-lg">
                                Proceed to Checkout
                            </a>

                        </div>
                    </div>

                </div>

            </div>

        @endif

    </div>

    {{-- Axios --}}


    <script>
        function updateQty(productId, qty) {
            axios.post('{{ route('cart.update') }}', {
                product_id: productId,
                qty: qty
            }).then(() => location.reload());
        }

        function removeItem(productId) {
            axios.post('{{ route('cart.remove') }}', {
                product_id: productId
            }).then(() => location.reload());
        }
    </script>

</x-public-layout>
