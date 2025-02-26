@extends('header')
@section('content')
    <div class="grid grid-cols-4 gap-10 px-24 mt-10">
        {{-- eSewa payment option --}}
        <div class="col-span-3 grid grid-cols-1 gap-10 border-r">
            <div>
                <img src="https://esewa.com.np/common/images/esewa_logo.png" alt=""
                    class="w-2/3 bg-green-600 p-4 rounded-lg">
            </div>
        </div>

        {{-- Payment Summary --}}
        <div>
            <h2 class="font-bold text-xl">Summary</h2>
            <div class="mt-5">
                <p>Total Amount</p>
                <p class="font-bold">Rs. {{ $totalprice }}</p>

                {{-- eSewa Payment Form --}}
                <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                    <input type="hidden" id="amount" name="amount" value="{{ $totalprice }}" required>
                    <input type="hidden" id="tax_amount" name="tax_amount" value="0" required>
                    <input type="hidden" id="total_amount" name="total_amount" value="{{ $totalprice }}" required>
                    <input type="hidden" id="transaction_uuid" name="transaction_uuid" required>
                    <input type="hidden" id="product_code" name="product_code" value="EPAYTEST" required>
                    <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
                    <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0"
                        required>
                    <input type="hidden" id="success_url" name="success_url"
                        value="{{ route('order.store', [$cart->id, $totalprice]) }}" required>
                    <input type="hidden" id="failure_url" name="failure_url" value="{{ route('cart.index') }}" required>
                    <input type="hidden" id="signed_field_names" name="signed_field_names"
                        value="total_amount,transaction_uuid,product_code" required>
                    <input type="hidden" id="signature" name="signature" required>
                    <input value="Pay Now with eSewa" type="submit"
                        class="bg-green-600 text-white py-2 px-5 rounded-lg mt-5 w-full">
                </form>

                <form action="{{ route('order.store', [$cart->id, $totalprice]) }}" method="GET">
                    <button type="submit" class="bg-gray-700 text-white py-2 px-5 rounded-lg mt-3 w-full" onclick="return confirm('Are you sure to Book the Venue?')">
                        Cash on Event Day
                    </button>
                </form>

            </div>
        </div>
    </div>

    @php
        $transaction_uuid = uniqid();
        $product_code = 'EPAYTEST';
        $data =
            'total_amount=' . $totalprice . ',transaction_uuid=' . $transaction_uuid . ',product_code=' . $product_code;
        $secret = '8gBm/:&EnhH.1/q';
        $s = hash_hmac('sha256', $data, $secret, true);
        $signature = base64_encode($s);
    @endphp

    <script>
        document.getElementById('transaction_uuid').value = "{{ $transaction_uuid }}";
        document.getElementById('signature').value = "{{ $signature }}";
    </script>
@endsection
