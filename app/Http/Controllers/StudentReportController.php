<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentReportController extends Controller
{
    public function index()
    {
        // Fetch all students (assuming user_type 4 represents students)
        $students = User::where('user_type', 4)->get();
        
        // Pass the fetched students data to the view
        return view('admin.report.student', compact('students'));
    }
}