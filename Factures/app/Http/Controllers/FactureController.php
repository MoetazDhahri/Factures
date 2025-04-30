<?php

namespace App\Http\Controllers;

use App\Models\Facture; // Import the Facture model
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse; // Import for redirects

class FactureController extends Controller // Renamed the class
{
    /**
     * Display a listing of the resource.
     * GET /factures
     */
    public function index(): View
    {
        // Fetch all factures (consider pagination for many records)
        $factures = Facture::latest()->paginate(10); // Get latest 10 per page

        // Return the view, passing the factures data
        return view('factures.index', compact('factures'));
        // Assumes you have a view at resources/views/factures/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     * GET /factures/create
     */
    public function create(): View
    {
        // Return the view containing the creation form
        return view('factures.create');
        // Assumes you have a view at resources/views/factures/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     * POST /factures
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validate the incoming request data
        $validatedData = $request->validate([
            'ID_commande' => 'required|integer|exists:commandes,ID_commande_pk', // Adjust if your commande table/pk is different
            'Montant' => 'required|numeric|min:0',
            'Date_facture' => 'required|date',
            'Statut' => 'required|string|max:255',
        ]);

        // 2. Create the new Facture using mass assignment
        Facture::create($validatedData);

        // 3. Redirect back to the index page with a success message
        return redirect()->route('factures.index')
                         ->with('success', 'Facture created successfully.');
    }

    /**
     * Display the specified resource.
     * GET /factures/{facture}
     * Route model binding automatically fetches the Facture by its primary key (ID_facture)
     */
    public function show(Facture $facture): View
    {
        // Return the view, passing the specific facture
        return view('factures.show', compact('facture'));
        // Assumes you have a view at resources/views/factures/show.blade.php
    }

    /**
     * Show the form for editing the specified resource.
     * GET /factures/{facture}/edit
     */
    public function edit(Facture $facture): View
    {
        // Return the view for editing, passing the existing facture data
        return view('factures.edit', compact('facture'));
        // Assumes you have a view at resources/views/factures/edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     * PUT/PATCH /factures/{facture}
     */
    public function update(Request $request, Facture $facture): RedirectResponse
    {
        // 1. Validate the incoming request data
        $validatedData = $request->validate([
            'ID_commande' => 'required|integer|exists:commandes,ID_commande_pk', // Adjust validation as needed for update
            'Montant' => 'required|numeric|min:0',
            'Date_facture' => 'required|date',
            'Statut' => 'required|string|max:255',
        ]);

        // 2. Update the existing Facture
        $facture->update($validatedData);

        // 3. Redirect back to the index page (or show page) with a success message
        return redirect()->route('factures.index')
                         ->with('success', 'Facture updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /factures/{facture}
     */
    public function destroy(Facture $facture): RedirectResponse
    {
        // Delete the facture
        $facture->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('factures.index')
                         ->with('success', 'Facture deleted successfully.');
    }
}