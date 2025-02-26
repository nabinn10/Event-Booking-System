@extends('header')

@section('content')
    <div class="container mx-auto px-6 py-12 max-w-5xl">
        <h1 class="text-2xl font-semibold text-center mt-3">Welcome to Our Event Management System</h1>
        <p class="text-center mt-4">Our event management system helps you plan and execute events seamlessly. From booking venues to managing guest lists, our system provides all the tools you need to ensure your event is a success. Whether it's a corporate event, wedding, or a small gathering, our platform is designed to handle events of all sizes with ease.</p>
        
        <div class="mt-8">
            <h2 class="text-xl font-semibold text-center text-gray-800">Key Features</h2>
            <ul class="list-disc mt-4 space-y-2 pl-8">
                <li>📅 **Event Scheduling**: Easily schedule events and set reminders for important tasks.</li>
                <li>📋 **Guest Management**: Keep track of guest lists, RSVPs, and meal preferences.</li>
                <li>🎟️ **Ticketing & Registration**: Set up and manage online registration and ticket sales.</li>
                <li>🏢 **Venue Booking**: Find and book event venues directly through the system.</li>
                <li>💳 **Payment Integration**: Process payments securely for event tickets and other services.</li>
                <li>🔧 **Customizable Event Options**: Tailor the event experience to meet your unique needs.</li>
            </ul>
        </div>

        <div class="mt-8">
            <h2 class="text-xl font-semibold text-center text-gray-800">How It Works</h2>
            <p class="mt-4 text-center">Our platform is designed to simplify the event management process for users, whether you’re organizing a corporate conference, a wedding, or a community event.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-6">
                <div class="text-center">
                    <h3 class="font-semibold">Step 1: Create Your Event</h3>
                    <p class="mt-2">Start by creating your event. Add important details like the name, date, and location.</p>
                </div>
                <div class="text-center">
                    <h3 class="font-semibold">Step 2: Manage Your Guests</h3>
                    <p class="mt-2">Manage your guest list, send invitations, and track RSVPs. Make sure everyone is informed!</p>
                </div>
                <div class="text-center">
                    <h3 class="font-semibold">Step 3: Execute & Enjoy</h3>
                    <p class="mt-2">On the day of your event, use our platform to ensure everything runs smoothly and enjoy the event without stress.</p>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <h2 class="text-xl font-semibold text-center text-gray-800">Contact Us</h2>
            <p class="text-center mt-4">Have questions or need support? Our team is here to assist you in every step of your event planning journey.</p>
            <div class="text-center mt-6">
                <p>Email us at: <a href="mailto:inspireevents62@gmail.com" class="text-blue-600 hover:underline">inspireevents62@gmail.com</a></p>
                <p>Or call us at: <span class="text-blue-600">+123 456 789</span></p>
            </div>
        </div>
    </div>
@endsection
