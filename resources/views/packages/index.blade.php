@extends('layouts.app')

@section('title', 'Packages')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-extrabold text-gray-800">Packages</h2>
        <a href="{{ route('packages.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">Add Package</a>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 border-b text-gray-700">Package Name</th>
                        <th class="py-3 px-4 border-b text-gray-700">Description</th>
                        <th class="py-3 px-4 border-b text-gray-700">Price</th>
                        <th class="py-3 px-4 border-b text-gray-700">Capacity</th>
                        <th class="py-3 px-4 border-b text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $package)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b">{{ $package->name }}</td>
                        <td class="py-3 px-4 border-b truncate max-w-xs" title="{{ $package->description }}">{{ Str::limit($package->description, 50) }}</td>
                        <td class="py-3 px-4 border-b">Rs. {{ number_format($package->price, 2) }}</td>
                        <td class="py-3 px-4 border-b">{{ $package->capacity }} people</td>
                        <td class="py-3 px-4 border-b">
                            <div class="flex space-x-2">
                                <a href="{{ route('packages.edit', $package->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition duration-300">
                                     Edit
                                </a>
                                <a href="{{ route('packages.destroy', $package->id) }}" onclick="return confirm('Are you sure to delete?')" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition duration-300">
                                     Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
