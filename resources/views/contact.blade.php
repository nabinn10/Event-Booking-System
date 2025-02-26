@extends('header')

@section('content')
<div class="w-3/5 mx-auto py-10 px-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-semibold text-center mb-6 text-gray-800">Contact Us</h1>
    <p class="text-lg text-gray-600 text-center mb-6">
        We'd love to hear from you! Whether you have a question about products, orders, or anything else, our team is ready to help.
    </p>

    <!-- Success Message -->
    @if(session('success'))
        <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg text-center mb-6">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Error Messages -->
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Contact Form -->
    <form action="/send-message" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-gray-700 font-medium">Name</label>
            <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                   value="{{ old('name', Auth::check() ? Auth::user()->name : '') }}" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Email</label>
            <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                   value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Phone Number</label>
            <input type="text" name="phone" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                   value="{{ old('phone_number', Auth::check() ? Auth::user()->phone_number : '') }}" required>
            @error('phone')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Message</label>
            <textarea name="message" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" rows="5" required>{{ old('message') }}</textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-red-900 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-red-800 transition duration-300">
                Send Message
            </button>
        </div>
    </form>
</div>

<!-- Auto-hide Success Message -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 3000);
        }
    });
</script>
@endsection
