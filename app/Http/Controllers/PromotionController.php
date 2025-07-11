<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Promotion;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PromotionController extends Controller
{
    public function index(): View
    {
        $promotions = Promotion::with('course')->paginate(5);
        return view('promotion.index', compact('promotions'));
    }

    public function create(): View
    {
        $courses = Course::all();

        return view('promotion.create', compact('courses'));
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();

        Promotion::create([
            'name' => $input['name'],
            'course_id' => $input['course_id'], // Vérifie bien l’orthographe de ce champ
            'start_date' => $input['start_date']
        ]);

        return redirect('promotions')->with('flash_message', 'Promotion added!');
    }

    public function show($id): View
    {
        $promotion = Promotion::findOrFail($id);
        return view('promotion.show', compact('promotion'));
    }

    public function edit($id): View
    {
        $courses = Course::all(); // pour un <select> peut-être ?
        $promotion = Promotion::findOrFail($id); // on récupère bien l'objet

        return view('promotion.edit', compact('promotion', 'courses'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->update($request->all());

        return redirect('promotions')->with('flash_message', 'Promotion updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        promotion::destroy($id);
        return redirect('promotions')->with('flash_message', 'promotion deleted');
    }
}
