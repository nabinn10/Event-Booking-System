<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'capacity' => 'required|integer',
        ]);

        Package::create($data);
        return redirect()->route('packages.index')->with('success', 'Package created successfully.');
    }

    public function edit($id)
    {
        $package = Package::find($id);
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'capacity' => 'required|integer',
        ]);

        $package = Package::find($id);
        $package->update($data);
        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Package deleted successfully.');
    }

}
