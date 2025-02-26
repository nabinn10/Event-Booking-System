@extends('header')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">My Orders</h2>

        @if ($orders->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md">
                <p>No orders found.</p>
            </div>
        @else
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="w-full border-collapse">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-5 text-left">Package</th>
                            <th class="py-3 px-5 text-left">People</th>
                            <th class="py-3 px-5 text-left">Items</th>
                            <th class="py-3 px-5 text-left">Booking Date</th>
                            <th class="py-3 px-5 text-left">Total Price</th>
                            <th class="py-3 px-5 text-left">Payment</th>
                            <th class="py-3 px-5 text-left">Status</th>
                            <th class="py-3 px-5 text-left">Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="border-b hover:bg-gray-100">
                                <!-- Display Package Name -->
                                <td class="py-3 px-5">
                                    {{ $order->package->name ?? 'N/A' }}
                                </td>

                                <!-- Number of People -->
                                <td class="py-3 px-5">{{ $order->no_of_people }}</td>
                                <td class="py-3 px-5">
                                    {!! nl2br(e(str_replace(',', "\n", $order->item_names))) !!}
                                </td>


                                <!-- Booking Date -->
                                <td class="py-3 px-5">{{ date('d M, Y', strtotime($order->booking_date)) }}</td>

                                <!-- Total Price -->
                                <td class="py-3 px-5 font-semibold text-green-600">
                                    Rs. {{ number_format($order->total_price, 2) }}
                                </td>

                                <!-- Payment Method -->
                                <td class="py-3 px-5">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold
                                        {{ $order->payment_method === 'COD' ? 'bg-yellow-200 text-yellow-800' : 'bg-blue-200 text-blue-800' }}">
                                        {{ $order->payment_method }}
                                    </span>
                                </td>

                                <!-- Order Status -->
                                <td class="py-3 px-5">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold 
                                        {{ $order->status === 'Approved' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                        {{ $order->status }}
                                    </span>
                                </td>

                                <!-- Order Date -->
                                <td class="py-3 px-5">{{ $order->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
