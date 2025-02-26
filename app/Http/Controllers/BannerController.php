<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'priority' => 'required',
            'title' => 'required',
            'photopath' => 'required|image',
        ]);

        //store the image
        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/banners'), $photoname);
        $data['photopath'] = $photoname;

        Banner::create($data);
        return redirect()->route('banners.index')->with('success', 'Banner created successfully');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'priority' => 'required',
            'title' => 'required',
            'photopath' => 'image',
        ]);
        $banner = Banner::find($id);
        if ($request->hasFile('photopath')) {
            //store the image
            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/banners'), $photoname);
            $data['photopath'] = $photoname;
            //delete the old image
            unlink(public_path('images/banners/' . $banner->photopath));
        }
        $banner->update($data);
        return redirect()->route('banners.index')->with('success', 'Banner updated successfully');
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        if(file_exists(public_path('images/banners/' . $banner->photopath)))
        unlink(public_path('images/banners/' . $banner->photopath));
        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully');
    }
}
