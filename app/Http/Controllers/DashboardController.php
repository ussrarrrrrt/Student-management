<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Promotion;
use App\Models\Course;
use App\Models\Payment;

class DashboardController extends Controller
{
 // app/Http/Controllers/DashboardController.php


    public function index()
    {
        
        return view('dashboard.index', [
            'studentsCount'  => Student::count(),
            'teachersCount'  => Teacher::count(),
            'promosCount'    => Promotion::count(),
            'coursesCount'   => Course::count(),
            'latestStudents' => Student::latest()->limit(5)->get(),
            // 'payments'    => Payment::latest()->limit(10)->get(), // si tu gères les paiements
        ]);
    }
}
   
