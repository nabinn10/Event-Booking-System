@extends('layouts.app')
@section('title')
    Notices
@endsection
@section('content')
<div class="my-10 text-right">
    <a href="{{route('notice.create')}}" class="px-4 py-2 bg-blue-600 rounded text-white">Add Notice</a>
</div>

<table class="w-full text-center">
    <tr>
        <th class="border py-2">Notice Date</th>
        <th class="border py-2">Notice</th>
        <th class="border py-2">Status</th>
        <th class="border py-2">Action</th>
    </tr>
    @foreach($notices as $notice)
    <tr>
        <td class="border py-2">{{$notice->notice_date}}</td>
        <td class="border py-2">{{$notice->title}}</td>
        <td class="border py-2">{{$notice->status}}</td>
        <td class="border py-2">
            <a href="{{route('notice.edit',$notice->id)}}" class="px-2 py-1 bg-blue-600 rounded-lg text-white">Edit</a>
            <a href="{{route('notice.destroy',$notice->id)}}" onclick="return confirm('Are you sure to Delete?')" class="px-2 py-1 bg-red-600 rounded-lg text-white">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
