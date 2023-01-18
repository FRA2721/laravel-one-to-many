<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * class DashboardController created
 * @author FRANCESCO CIMINO
 */
class DashboardController extends Controller
{
    public function index() {
        // return view 
        return view('admin.dashboard');
    }
}
