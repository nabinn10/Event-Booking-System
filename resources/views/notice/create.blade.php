@extends('layouts.app')
@section('title')
    Create Notice
@endsection
@section('content')
    <form action="{{route('notice.store')}}" method="POST" class="mt-5">
        @csrf
        <input type="date" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Notice Date" name="notice_date" value="{{old('notice_date')}}">
        @error('notice_date')
            <span class="text-red-600 text-sm block -mt-5">{{$message}}</span>
        @enderror
        <input type="text" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Enter Notice" name="title" value="{{old('title')}}">
        @error('title')
            <span class="text-red-600 text-sm block -mt-5">{{$message}}</span>
        @enderror
        <select name="status" id="" class="block w-full my-5 rounded-lg border-gray-300">
            <option value="Show">Show</option>
            <option value="Hide">Hide</option>
        </select>
        <div class="flex justify-center gap-3">
            <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded-lg">Add Notice</button>
            <a href="{{route('notice.index')}}" class="bg-red-600 text-white px-10 py-2 rounded-lg ">Exit</a>
        </div>
    </form>
@endsection
