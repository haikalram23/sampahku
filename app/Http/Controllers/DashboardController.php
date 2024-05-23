<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $isAuthenticated = Auth::check();
        $faqs = Faq::all();
        return view('dashboard', compact('isAuthenticated', 'faqs'));
    }

    public function admin()
    {
        return view('admin');
    }
}
