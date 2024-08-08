<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Payments;
use App\Models\Categories;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Carbon;

class Dashboard extends Controller
{
    //
    public function index()
    {
        $totalProducts = Products::count();
        $totalCategories = Categories::count();
        $totalPayments = Payments::count();


        $totalAllUsers = User::count();
        $totalUser = User::where('role_as','0')->count();
        $totalAdmin = User::where('role_as','1')->count();

        $todayDate = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->month;
        $thisYear = Carbon::now()->year;

        $totalOrder = Orders::count();
        $todayOrder = Orders::whereDate('created_at', $todayDate)->count();
        $thisMonthOrder = Orders::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrder = Orders::whereYear('created_at', $thisYear)->count();

        return view('admin.dashboard', compact('totalProducts','totalCategories','totalPayments', 'totalAllUsers','totalUser','totalAdmin','totalOrder','todayOrder','thisMonthOrder','thisYearOrder'));
    }
}
