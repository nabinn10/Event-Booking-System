@extends('layouts.app')
@section('title')
    Add Package
@endsection
@section('content')
    <form action="{{route('packages.store')}}" method="POST">
        @csrf
        <input type="text" placeholder="Package Name" name="name" class="block w-full my-5 rounded-lg border-gray-300" value="{{old('name')}}">
        @error('name')
            <span class="text-red-600 text-sm block -mt-5">{{$message}}</span>
        @enderror
        <input type="text" placeholder="Description" name="description" class="block w-full my-5 rounded-lg border-gray-300" value="{{old('description')}}">
        @error('description')
            <span class="text-red-600 text-sm block -mt-5">{{$message}}</span>
        @enderror
        <input type="text" placeholder="Price" name="price" class="block w-full my-5 rounded-lg border-gray-300" value="{{old('price')}}">
        @error('price')
            <span class="text-red-600 text-sm block -mt-5">{{$message}}</span>
        @enderror
        <input type="text" placeholder="Capacity (No of Person)" name="capacity" class="block w-full my-5 rounded-lg border-gray-300" value="{{old('capacity')}}">
        @error('capacity')
            <span class="text-red-600 text-sm block -mt-5">{{$message}}</span>
        @enderror
        <div class="flex justify-center gap-3">
            <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded-lg">Add Package</button>
            <a href="{{route('packages.index')}}" class="bg-red-600 text-white px-10 py-2 rounded-lg ">Exit</a>
        </div>
    </form>
@endsection
