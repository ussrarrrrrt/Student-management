<?php

namespace App\Http\Controllers;

use App\Models\Payement;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class PayementController extends Controller
{

    public function index()
    {
        $payements = Payement::with('enrollment.student')
                     ->latest()
                     ->paginate(10);

        return view('payement.index', compact('payements'));
    }

    public function create()
    {
        $enrollments = Enrollment::with('student')->get();
        return view('payement.create', compact('enrollments'));
    }

     
    
    public function store(Request $request)
    {
        info('i am here');
        info($request);

        $data = $request->validate([
            'enrollment_id' => 'required',
            'paid_date'     => 'required|date',
            'amount'        => 'required',
        ]);

        Payement::create([
            'enrollment_id' => $data['enrollment_id'],
            'paid_date' => $data['paid_date'],
            'amount' => $data['amount']
        ]);

        return redirect('payement')->with('flash_message', 'Paiement enregistré avec succès ');
    }

 
    
    public function show(Payement $payement)
    {
        return view('payement.show', compact('payement'));
    }

    
    public function edit(Payement $payement)
    {
        $enrollments = Enrollment::with('student')->get();
        return view('payement.edit', compact('payement', 'enrollments'));
    }


    public function update(Request $request, Payement $payement)
    {
        $data = $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date'     => 'required|date',
            'amount'        => 'required|numeric|min:0',
        ]);

        $payement->update($data);

        return redirect()
               ->route('payements.index')
               ->with('success', 'Paiement mis à jour !');
    }


    public function destroy(Payement $payement)
    {
        $payement->delete();
        return redirect()
               ->route('payement.index')
               ->with('success', 'Paiement supprimé.');
    }
}

