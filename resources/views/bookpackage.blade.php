@extends('header')
@section('content')
    <div class="grid grid-cols-4 gap-10 mt-5 px-24">
        <div class="border-r">
            <h1 class="text-2xl font-semibold">{{$package->name}}</h1>
            <p class="text-gray-700 text-xl font-bold">Rs. {{$package->price}}</p>
            <p class="text-gray-700">Capacity: {{$package->capacity}} person</p>
            <p class="text-justify mt-5">{{$package->description}}</p>
        </div>
        <div class="col-span-3">
            <form action="{{route('addtocart')}}" method="POST" class="grid grid-cols-3">
                @csrf
                <input type="hidden" name="package_id" value="{{$package->id}}">
                <div class="col-span-2">
                    <h2 class="text-2xl font-semibold">Available Items</h2>
                    <div class="p-2 m-2">
                        <input type="checkbox" name="selectall" id="selectall" class="mr-2">
                        <label for="selectall">Select All</label>
                    </div>
                    @error('items')
                    <p class="text-red-500 ml-2 text-xs">{{$message}}</p>
                    @enderror
                    @csrf
                    @foreach($items as $item)
                    <div class="flex justify-between p-2 border m-2 rounded hover:bg-gray-100">
                        <div>
                            <input type="checkbox" name="items[]" value="{{$item->id}}" class="mr-2" id="item{{$loop->iteration}}">
                            <label for="item{{$loop->iteration}}">{{$item->name}}</label>
                        </div>
                        <span class="ml-10">Rs. {{$item->rate}}/person</span>
                    </div>
                    @endforeach
                </div>
                <div class="flex flex-col justify-center border-l">
                    <h2 class="text-2xl font-semibold pl-1 ml-2">Checkout</h2>
                    <div class="p-2 m-2">
                        <label for="people" class="ml-2">No of People</label>
                        <input type="text" name="no_of_people" id="people" class="w-52 block border rounded p-1 ml-2" placeholder="Min {{$package->capacity*0.2}} and Max {{$package->capacity}}" value="{{old('no_of_people')}}">
                        @error('no_of_people')
                        <p class="text-red-500 ml-2 text-xs">{{$message}}</p>
                        @enderror
                        <label for="date" class="ml-2">For Date</label>
                        <input type="date" name="booking_date" id="date" class="w-52 block border rounded p-1 ml-2" min="{{date('Y-m-d')}}" value="{{old('booking_date')}}">
                        @error('booking_date')
                        <p class="text-red-500 ml-2 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <button class="bg-blue-600 w-52 text-white px-4 py-2 rounded-lg mt-5 ml-5">Book Now</button>
                    <a href="{{route('viewpackage',$package->id)}}" class="bg-red-600 w-52 text-center text-white px-4 py-2 rounded-lg mt-5 ml-5">Exit</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('selectall').addEventListener('change', function() {
            var checkboxes = document.getElementsByName('items[]');
            for(var i=0; i<checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
    </script>
@endsection
