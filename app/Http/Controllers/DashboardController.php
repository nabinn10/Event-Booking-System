<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Notice;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalusers = User::count();
        $totalorders = Order::count();
        $totalitems = Item::count();
        $totalpackages = Package::count();

        // Example data for order statuses (Pending, Confirmed, etc.)
        $orderStatusData = Order::select(DB::raw('count(*) as count, status'))
            ->groupBy('status')
            ->get();

        // Example data for packages booked each month
        $monthlyPackages = Order::select(DB::raw('MONTH(booking_date) as month, count(*) as count'))
            ->groupBy(DB::raw('MONTH(booking_date)'))
            ->get();

        return view('dashboard', compact('totalusers', 'totalorders', 'totalitems', 'totalpackages', 'orderStatusData', 'monthlyPackages'));
    }
}
