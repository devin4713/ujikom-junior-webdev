<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard', [
            'title' => 'Dashboard',
            'empcount' => Employee::count()
        ]);
    }
}
