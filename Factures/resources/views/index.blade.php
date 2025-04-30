{{-- Assuming you have a layout file --}}
@extends('layouts.app')

@section('content')
    <h1>Factures</h1>
    <a href="{{ route('factures.create') }}">Create New Facture</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Commande ID</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($factures as $facture)
                <tr>
                    <td>{{ $facture->ID_facture }}</td>
                    <td>{{ $facture->ID_commande }}</td>
                    <td>{{ number_format($facture->Montant, 2) }}</td>
                    <td>{{ $facture->Date_facture->format('Y-m-d') }}</td>
                    <td>{{ $facture->Statut }}</td>
                    <td>
                        <a href="{{ route('factures.show', $facture) }}">View</a>
                        <a href="{{ route('factures.edit', $facture) }}">Edit</a>
                        <form action="{{ route('factures.destroy', $facture) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No factures found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{-- Pagination Links --}}
    {{ $factures->links() }}
@endsection