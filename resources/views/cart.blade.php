@extends('header')
@section('content')
@include('layouts.alert')
    <h2 class="font-bold text-3xl text-center my-5">My Cart</h2>

    <div class="px-24 mt-10">
        <table class="w-full">
            <tr>
                <th class="border px-4 py-2">Package Name</th>
                <th class="border px-4 py-2">Booking Date for</th>
                <th class="border px-4 py-2">No of People</th>
                <th class="border px-4 py-2">Items</th>
                <th class="border px-4 py-2">Package Price</th>
                <th class="border px-4 py-2">Items Price</th>
                <th class="border px-4 py-2">Total Price</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
            @foreach ($carts as $cart)
                <tr>
                    <td class="border px-4 py-2">{{ $cart->package->name }}</td>
                    <td class="border px-4 py-2">{{ $cart->booking_date }}</td>
                    <td class="border px-4 py-2">{{ $cart->no_of_people }}</td>
                    <td class="border px-4 py-2">
                        @foreach ($cart->items as $item)
                            <p>{{ $item }}</p>
                        @endforeach
                    </td>
                    <td class="border px-4 py-2">Rs. {{$cart->package->price}}</td>
                    <td class="border px-4 py-2">Rs. {{$cart->itemprice}}/plate</td>
                    <td class="border px-4 py-2">Rs. {{$cart->package->price + $cart->itemprice * $cart->no_of_people}}</td>
                    <td class="border px-4 py-2 grid gap-2 justify-center">
                        <a href="{{route('checkout',$cart->id)}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg" onclick="return confirm('Are you sure to Book the Venue?')">Checkout</a>
                        <a href="{{route('deletecart',$cart->id)}}" class="bg-red-600 text-white px-4 py-2 rounded-lg" onclick="return confirm('Are you sure to Remove Cart?')">Remove</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
