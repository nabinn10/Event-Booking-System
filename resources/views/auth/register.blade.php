@extends('header')
@section('content')
    <div class="flex items-center justify-center mt-10">
        <div class="w-96 bg-white p-6 rounded-lg shadow-lg border">
            <h2 class="text-2xl font-bold text-center">Register</h2>
            <form action="{{route('register')}}" method="POST" class="mt-6">
                @csrf
                <input type="text" name="name" placeholder="Name" class="w-full p-2 border border-gray-300 rounded-lg" value="{{old('name')}}">
                @error('name')
                    <span class="text-red-500 text-sm block mt-1">{{$message}}</span>
                @enderror
                <input type="email" name="email" placeholder="Email" class="w-full p-2 border border-gray-300 rounded-lg mt-3" value="{{old('email')}}">
                @error('email')
                    <span class="text-red-500 text-sm block mt-1">{{$message}}</span>
                @enderror
                <input type="text" name="phone_number" placeholder="Phone" class="w-full p-2 border border-gray-300 rounded-lg mt-3" value="{{old('phone_number')}}">
                @error('phone_number')
                    <span class="text-red-500 text-sm block mt-1">{{$message}}</span>
                @enderror


                <input type="password" name="password" placeholder="Password" class="w-full p-2 border border-gray-300 rounded-lg mt-3">
                @error('password')
                    <span class="text-red-500 text-sm block mt-1">{{$message}}</span>
                @enderror
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-2 border border-gray-300 rounded-lg mt-3">
                @error('password_confirmation')
                    <span class="text-red-500 text-sm block mt-1">{{$message}}</span>
                @enderror
                <button type="submit" class="w-full bg-blue-600 text-white rounded-lg p-2 mt-3">Register</button>
            </form>
            <div class="text-center">
                <p class="mt-3">Already have an account? <a href="{{route('login')}}" class="text-blue-600">Login</a></p>
            </div>
        </div>
    </div>
@endsection
