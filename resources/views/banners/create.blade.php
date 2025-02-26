@extends('layouts.app')
@section('title')
    Create Banner
@endsection
@section('content')
    <form action="{{route('banners.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf
        <input type="text" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Priority" name="priority" value="{{old('priority')}}">
        @error('priority')
            <span class="text-red-600 text-sm block -mt-5">{{$message}}</span>
        @enderror
        <input type="text" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Banner Title" name="title" value="{{old('title')}}">
        @error('title')
            <span class="text-red-600 text-sm block -mt-5">{{$message}}</span>
        @enderror
        <input type="file" class="block w-full my-5 rounded-lg border-gray-300" name="photopath" value="{{old('photopath')}}">
        @error('photopath')
            <span class="text-red-600 text-sm block -mt-5">{{$message}}</span>
        @enderror
        <div class="flex justify-center gap-3">
            <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded-lg">Add Banner</button>
            <a href="{{route('banners.index')}}" class="bg-red-600 text-white px-10 py-2 rounded-lg ">Exit</a>
        </div>
    </form>
@endsection
