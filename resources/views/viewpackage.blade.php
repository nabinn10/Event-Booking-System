@extends('header')
@section('content')
    <div class="container mx-auto px-6 py-5">
        <h2 class="text-center font-extrabold text-4xl text-gray-800 mb-8">Package Details</h2>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Left Section: Package Details -->
            <div class="lg:col-span-2 bg-white p-8 rounded-lg shadow-lg">
                <h1 class="text-3xl font-semibold text-gray-800 mb-4">{{$package->name}}</h1>
                <p class="text-xl font-bold text-blue-600 mb-4">Rs. {{$package->price}}</p>
                <p class="text-gray-600 mb-6">Capacity: <span class="font-semibold">{{$package->capacity}} person</span></p>
                <p class="text-gray-700 text-lg mb-6">{{$package->description}}</p>
                <div class="flex justify-start mt-5">
                    <a href="{{route('bookpackage',$package->id)}}" class="bg-blue-600 text-white text-lg px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">
                        Book Package
                    </a>
                </div>
            </div>

            <!-- Right Section: Available Items -->
            <div class="bg-white p-6 rounded-lg shadow-lg mt-8 lg:mt-0">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Available Items</h3>
                <ul class="space-y-3">
                    @foreach($items as $item)
                        <li class="text-lg text-gray-600 flex items-center">
                            <i class="ri-check-double-line text-green-500 mr-2"></i>
                            {{$item->name}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
