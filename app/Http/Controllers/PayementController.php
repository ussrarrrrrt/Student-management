<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         
        $payements = course::paginate(5); // Pas besoin de links() dans la vue dans ce cas
        return view('payements.index', compact('courses'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $payements = Course::all();
        return view('promotion.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
