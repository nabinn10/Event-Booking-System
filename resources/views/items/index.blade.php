@extends('layouts.app')

@section('title', 'Items')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-extrabold text-gray-800">Items</h2>
        <a href="{{ route('items.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">Add Item</a>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 border-b text-gray-700">Name</th>
                        <th class="py-3 px-6 border-b text-gray-700">Rate</th>
                        <th class="py-3 px-6 border-b text-gray-700">Status</th>
                        <th class="py-3 px-6 border-b text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-6 border-b">{{ $item->name }}</td>
                        <td class="py-3 px-6 border-b">Rs. {{ number_format($item->rate, 2) }}</td>
                        <td class="py-3 px-6 border-b">{{ $item->status }}</td>
                        <td class="py-3 px-6 border-b">
                            <a href="{{ route('items.edit', $item->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition duration-300">Edit</a>
                            <a href="{{ route('items.destroy', $item->id) }}" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300" onclick="return confirm('Are you sure to Delete?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
