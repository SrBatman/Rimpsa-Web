<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Payments;
use App\Models\Categories;
use App\Models\User;
use App\Models\Orders;
use App\Models\Brands;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class Dashboard extends Controller
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = config('services.api.url'); // Obtiene la URL desde el archivo de configuración
    }
    public function index()
    {
        $totalProducts = Products::count();
        $totalCategories = Categories::count();
        $totalBrands = Brands::count();
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


        $data = [
            'username' => env('API_USER'),
            'password' => env('API_PASS'),
        ];
    
        // Realizar la solicitud POST al backend para obtener el token
        $response = Http::post($this->apiUrl . 'login', $data);
    
        if ($response->successful()) {
            // Obtener el token JWT de la respuesta
            $token = $response->json()['token'];
    
            // Almacenar el token en la sesión o en el almacenamiento local
            session(['authToken' => $token]);

        }



        return view('admin.dashboard', compact('totalProducts','totalCategories','totalPayments', 'totalBrands','totalAllUsers','totalUser','totalAdmin','totalOrder','todayOrder','thisMonthOrder','thisYearOrder'));
    }



}
