<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class LogsController extends Controller
{
    protected $apiUrl;
    protected $token;

    public function __construct()
    {
        $this->apiUrl = config('services.api.url'); // Obtiene la URL desde el archivo de configuración
        $this->token = session('authToken');
    }
    public function index()
    {
        $response = Http::withToken($this->token)->get($this->apiUrl.'logs');
       
        if ($response->successful()) {
            $logs = $response->json()['data'];
        
            // Convertir las fechas a Carbon
            $logs = collect($logs)->map(function ($log) {
                $log['createdAt'] = Carbon::parse($log['createdAt']);
                return $log;
            });
            return view('admin.logs.index', compact('logs'));
        }
        $logs = [];
        return view('admin.logs.index', compact('logs'));
    }

    public function details($id){

    }
}
