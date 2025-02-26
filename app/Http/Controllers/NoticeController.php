<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::orderBy('notice_date','desc')->get();
        return view('notice.index',compact('notices'));
    }

    public function create()
    {
        return view('notice.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'notice_date' => 'required',
            'title' => 'required',
            'status' => 'required'
        ]);


        Notice::create($data);
        return redirect(route('notice.index'))->with('success','Notice Created Successfully');
    }

    public function edit($id)
    {
        $notice = Notice::find($id);
        return view('notice.edit',compact('notice'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'notice_date' => 'required',
            'title' => 'required',
            'status' => 'required'
        ]);

        $notice = Notice::find($id);
        $notice->update($data);
        return redirect(route('notice.index'))->with('success','Notice Updated Successfully');
    }

    public function destroy($id)
    {
        $notice = Notice::find($id);
        $notice->delete();
        return redirect(route('notice.index'))->with('success','Notice Deleted Successfully');
    }
}
