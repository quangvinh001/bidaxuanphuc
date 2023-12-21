<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        if (Gate::allow("check")) {
            $totalyear = Bill::where('trangthai', '=', '1')->sum('total');
            return view('admin.dashboard', compact( 'totalyear'));
        } else {
            // Người dùng không có quyền admin
            return abort(403, 'Unauthorized');
        }
    }
}
