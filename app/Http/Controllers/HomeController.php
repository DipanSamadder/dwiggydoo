<?php

namespace App\Http\Controllers;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        return view('frontend.index');
    }

     function admin_dashboard(){
        $page['title'] = 'Dashboard';
        return view('backend.index', compact('page'));
    }
}
