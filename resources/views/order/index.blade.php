@extends('layouts.app')

@section('title', 'Orders')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-8">Orders</h2>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto bg-white text-gray-700">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-6 border-b text-left">S.N.</th>
                            <th class="py-3 px-6 border-b text-left">User</th>
                            <th class="py-3 px-6 border-b text-left">Package</th>
                            <th class="py-3 px-6 border-b text-left">Total Amount</th>
                            <th class="py-3 px-6 border-b text-left">Payment Method</th>
                            <th class="py-3 px-6 border-b text-left">Status</th>
                            <th class="py-3 px-6 border-b text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-6 border-b">{{ $loop->iteration }}</td>
                                <td class="py-3 px-6 border-b">{{ $order->user->name }}</td>
                                <td class="py-3 px-6 border-b">{{ $order->package->name }}</td>
                                <td class="py-3 px-6 border-b">Rs. {{ number_format($order->total_price, 2) }}</td>
                                <td class="py-3 px-6 border-b">{{ $order->payment_method }}</td>
                                <td class="py-3 px-6 border-b">
                                    <span class="px-3 py-1 bg-green-600 text-white rounded-full">{{ $order->status }}</span>
                                </td>
                                <td class="py-3 px-6 border-b mx-auto p-auto">
                                    <a href="{{ route('orders.status', [$order->id, 'Pending']) }}" class="inline-block px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Pending</a>
                                    <a href="{{ route('orders.status', [$order->id, 'Confirmed']) }}" class="inline-block px-4 py-2 mt-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Confirmed</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
