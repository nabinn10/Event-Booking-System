@extends('layouts.app')
@section('title') Categories @endsection
@section('content')
    <div class="my-10 text-right">
        <a href="{{route('category.create')}}" class="px-4 py-2 bg-blue-600 rounded text-white">Add Category</a>
    </div>
    <table class="w-full text-center">
        <tr>
            <th class="border py-2">Order</th>
            <th class="border py-2">Category Name</th>
            <th class="border py-2">Action</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td class="border py-2">{{$category->priority}}</td>
            <td class="border py-2">{{$category->name}}</td>
            <td class="border py-2">
                <a href="{{route('category.edit',$category->id)}}" class="px-2 py-1 bg-blue-600 rounded-lg text-white">Edit</a>
                <a href="{{route('category.destroy',$category->id)}}" class="px-2 py-1 bg-red-600 rounded-lg text-white" onclick="return confirm('Are you sure to Delete?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
