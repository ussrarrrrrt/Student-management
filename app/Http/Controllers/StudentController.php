<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(5); // Pas besoin de links() dans la vue dans ce cas
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        // log les données du formulaire

        $input = $request->all();

        Student::create([
            'name' => $input['name'],
            'address' => $input['address'],
            'mobile' => $input['mobile']
        ]);
        return redirect('students')->with('flash_message', 'Student added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        info($id);
        $student = Student::findOrFail($id); // Trouve l'étudiant ou retourne 404
        return view('student.show', compact('student')); // Dossier correct : students
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {


        return view('student.edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $student = Student::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect('students')->with('flash_message', 'student update!');
    }



    public function destroy(string $id): RedirectResponse
    {
        student::destroy($id);
        return redirect('students')->with('flash_message', 'student deleted');
    }
}
