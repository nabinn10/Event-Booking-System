@extends('header')
@section('content')
    <div class="flex justify-center items-center mt-10">
        <div class="w-96 bg-white p-6 rounded-lg shadow-lg border">
            <h2 class="text-2xl font-bold text-center">Login</h2>
            <form action="{{route('login')}}" method="POST" class="mt-6">
                @csrf
                <input type="email" name="email" placeholder="Email" class="w-full p-2 border border-gray-300 rounded-lg" value="{{old('email')}}">
                @error('email')
                    <span class="text-red-500 text-sm block mt-1">{{$message}}</span>
                @enderror
                <input type="password" name="password" placeholder="Password" class="w-full p-2 border border-gray-300 rounded-lg mt-3">
                @error('password')
                    <span class="text-red-500 text-sm block mt-1">{{$message}}</span>
                @enderror
                <button type="submit" class="w-full bg-blue-600 text-white rounded-lg p-2 mt-3">Login</button>
            </form>
            <div class="text-center">
                <p class="mt-3">Don't have an account? <a href="{{route('register')}}" class="text-blue-600">Register</a></p>
            </div>
        </div>
    </div>
@endsection
