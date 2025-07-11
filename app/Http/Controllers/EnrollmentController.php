<?php

namespace App\Http\Controllers;




use App\Models\Enrollment;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 10 items par page, avec relations pour éviter le N+1
        $enrollments = Enrollment::with(['student', 'promotion'])
            ->latest()
            ->paginate(10);

        return view('enrollment.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enrollment.create', [
            'promotions' => Promotion::orderBy('name')->get(),
            'students'   => Student::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'enroll_no'    => 'required|string|max:50|unique:enrollments,enroll_no',
            'promotion_id' => 'required|exists:promotions,id',
            'student_id'   => 'required|exists:students,id',
            'join_date'    => 'required|date',
            'fee'          => 'required|numeric|min:0',
        ]);

        Enrollment::create($validated);
        return redirect('enrollments')->with('success', 'Enrollment created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        // $enrollment est déjà injecté ; on a besoin des relations pour l’affichage
        $enrollment->load(['student', 'promotion']);

        return view('enrollment.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        return view('enrollment.edit', [
            'enrollment'  => $enrollment->load(['student', 'promotion']),
            'promotions'  => Promotion::orderBy('name')->get(),
            'students'    => Student::orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        $validated = $request->validate([
            'enroll_no'    => 'required|string|max:50|unique:enrollments,enroll_no,' . $enrollment->id,
            'promotion_id' => 'required|exists:promotions,id',
            'student_id'   => 'required|exists:students,id',
            'join_date'    => 'required|date',
            'fee'          => 'required|numeric|min:0',
        ]);

        $enrollment->update($validated);

        return redirect()
            ->route('enrollment.index')
            ->with('success', 'Enrollment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Enrollment deleted successfully.');
    }
}
