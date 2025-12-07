<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Main dashboard method that redirects based on user role
     */
    public function dashboard()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        switch ($user->role) {
            case 'super_admin':
                return redirect()->route('dashboard.super-admin');
            case 'institution_admin':
                return redirect()->route('dashboard.institution-admin');
            case 'teacher':
                return redirect()->route('dashboard.teacher');
            case 'user':
            default:
                return redirect()->route('dashboard.user');
        }
    }

    /**
     * User Dashboard
     */
    public function userDashboard()
    {
        return view('dashboard.user');
    }

    /**
     * Institution Admin Dashboard
     */
    public function institutionAdminDashboard()
    {
        return view('dashboard.institution_admin');
    }

    /**
     * Teacher Dashboard
     */
    public function teacherDashboard()
    {
        return view('dashboard.teacher');
    }

    /**
     * Super Admin Dashboard
     */
    public function superAdminDashboard()
    {
        return view('dashboard.super_admin');
    }
}