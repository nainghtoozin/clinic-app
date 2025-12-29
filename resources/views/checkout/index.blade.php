<x-public-layout>

    <div class="container py-5">

        <div class="mb-4 text-center">
            <h2 class="fw-bold">Checkout</h2>
            <p class="text-muted">Confirm your information and place order</p>
        </div>

        <div class="row g-4">

            {{-- User Info --}}
            <div class="col-lg-7">

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0 fw-semibold">Your Information</h5>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" value="{{ $user->phone ?? '-' }}" readonly>
                        </div>

                        <form action="{{ route('checkout.store') }}" method="POST">
                            @csrf
                            <button class="btn btn-primary btn-lg w-100">
                                Place Order
                            </button>
                        </form>

                    </div>
                </div>

            </div>

            {{-- Order Summary --}}
            <div class="col-lg-5">

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0 fw-semibold">Order Summary</h5>
                    </div>

                    <div class="card-body">

                        @php $total = 0; @endphp

                        @foreach ($cart as $item)
                            @php
                                $subtotal = $item['price'] * $item['qty'];
                                $total += $subtotal;
                            @endphp

                            <div class="d-flex justify-content-between mb-2">
                                <span>{{ $item['name'] }} × {{ $item['qty'] }}</span>
                                <span>${{ number_format($subtotal, 2) }}</span>
                            </div>
                        @endforeach

                        <hr>

                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

</x-public-layout>
