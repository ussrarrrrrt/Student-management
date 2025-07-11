<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(5); // Pas besoin de links() dans la vue dans ce cas
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        // log les données du formulaire

        $input = $request->all();
        Course::create([
            'nom' => $input['nom'],
            'syallbus' => $input['syallbus'],
            'duration' => $input['duration']
        ]);
        return redirect('courses')->with('flash_message', 'Course added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        info($id);
        $course = Course::findOrFail($id); // Trouve l'étudiant ou retourne 404
        return view('course.show', compact('course')); // Dossier correct : courses
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {


        return view('course.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $course = Course::find($id);
        $input = $request->all();
        $course->update($input);
        return redirect('courses')->with('flash_message', 'course update!');
    }



    public function destroy(string $id): RedirectResponse
    {
        course::destroy($id);
        return redirect('courses')->with('flash_message', 'course deleted');
    }
}
