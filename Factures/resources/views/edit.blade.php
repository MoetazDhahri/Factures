{{-- In create.blade.php --}}
<form action="{{ route('factures.store') }}" method="POST">

{{-- In edit.blade.php --}}
{{-- <form action="{{ route('factures.update', $facture) }}" method="POST"> --}}
{{--   @method('PUT') --}}

    @csrf {{-- CSRF Protection --}}

    <div>
        <label for="ID_commande">Commande ID:</label>
        <input type="number" id="ID_commande" name="ID_commande" value="{{ old('ID_commande', $facture->ID_commande ?? '') }}" required>
        @error('ID_commande') <span style="color:red;">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="Montant">Montant:</label>
        <input type="number" step="0.01" id="Montant" name="Montant" value="{{ old('Montant', $facture->Montant ?? '') }}" required>
         @error('Montant') <span style="color:red;">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="Date_facture">Date Facture:</label>
        <input type="date" id="Date_facture" name="Date_facture" value="{{ old('Date_facture', isset($facture) ? $facture->Date_facture->format('Y-m-d') : '') }}" required>
         @error('Date_facture') <span style="color:red;">{{ $message }}</span> @enderror
    </div>

     <div>
        <label for="Statut">Statut:</label>
        <input type="text" id="Statut" name="Statut" value="{{ old('Statut', $facture->Statut ?? '') }}" required>
         @error('Statut') <span style="color:red;">{{ $message }}</span> @enderror
    </div>

    <button type="submit">
        {{ isset($facture) ? 'Update Facture' : 'Create Facture' }}
    </button>
</form>