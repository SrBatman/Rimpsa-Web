<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logs;

class LogsController extends Controller
{
    //
    public function index()
    {
        $logs = Logs::all();
        return view('admin.logs.index', compact('logs'));
    }
}
