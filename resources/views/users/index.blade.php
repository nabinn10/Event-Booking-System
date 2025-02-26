@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-8">Users</h2>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="py-3 px-6 border-b text-left">Name</th>
                            <th class="py-3 px-6 border-b text-left">Email</th>
                            <th class="py-3 px-6 border-b text-left">Phone</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-6 border-b">{{$user->name}}</td>
                                <td class="py-3 px-6 border-b">{{$user->email}}</td>
                                <td class="py-3 px-6 border-b">{{$user->phone_number}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
