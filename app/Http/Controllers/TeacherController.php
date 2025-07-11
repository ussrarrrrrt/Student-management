<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::paginate(5); // Pas besoin de links() dans la vue dans ce cas
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
    {
        // log les données du formulaire

        $input = $request->all();

        Teacher::create([
            'nom' => $input['nom'],
            'address' => $input['address'],
            'mobile' => $input['mobile']
        ]);
        
        return redirect('teachers')->with('flash_message', 'Student added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        info($id);
        $teacher = Teacher::findOrFail($id); // Trouve l'étudiant ou retourne 404
        return view('teacher.show', compact('teacher')); // Dossier correct : students
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {


        return view('teacher.edit')->with('teacher', $teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $teacher = Teacher::find($id);
        $input = $request->all();
        $teacher->update($input);
        return redirect('teachers')->with('flash_message', 'teacher update!');
    }



    public function destroy(string $id):RedirectResponse
    {
        teacher::destroy($id);
        return redirect('teachers')->with('flash_message','teacher deleted');
}
}