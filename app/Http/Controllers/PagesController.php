<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Item;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $banners = Banner::orderBy('priority')->get();
        $packages = Package::paginate(9);
        return view('welcome', compact('banners', 'packages'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function viewpackage($id)
    {
        $package = Package::find($id);
        $items = Item::where('status', 'Show')->get();
        return view('viewpackage', compact('package', 'items'));
    }

    public function bookpackage($id)
    {
        $package = Package::find($id);
        $items = Item::where('status', 'Show')->get();
        return view('bookpackage', compact('package', 'items'));
    }

    public function search(Request $request)
    {
        // Validate the search input
        $request->validate([
            'query' => 'nullable|string|max:255',
        ]);

        // Get the search query from the request
        $search = $request->query('query');

        // Perform the search or return all items if no search term is entered
        $packages = Package::select('id', 'name', 'price', 'capacity', 'description')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('search', compact('packages'));
    }


    // to show all users
    public function users()
    {

        $users = User::where('role', 'user')->get();
        return view('users.index', compact('users'));
    }
    // view oder for user
    public function myorders()
    {
        // Fetch orders with package details
        $orders = auth()->user()->orders()->with('package')->get();
    
        return view('myorders', compact('orders'));
    }
    
}
