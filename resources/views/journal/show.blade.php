@extends('layouts.app')

@section('title', 'Journal Entry Details')

@section('content')
<div class="bg-white p-6 rounded-xl shadow max-w-3xl mx-auto">

    <h2 class="text-2xl font-bold mb-4">Journal Entry</h2>

    <p><strong>Date:</strong> {{ $journal->date }}</p>
    <p><strong>Reference:</strong> {{ $journal->reference }}</p>
    <p><strong>Description:</strong> {{ $journal->description }}</p>

    <hr class="my-4">

    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="p-2 text-left">Account</th>
                <th class="p-2 text-right">Debit</th>
                <th class="p-2 text-right">Credit</th>
            </tr>
        </thead>

        <tbody>
            @foreach($journal->items as $item)
            <tr class="border-b">
                <td class="p-2">{{ $item->account->name }}</td>
                <td class="p-2 text-right">{{ number_format($item->debit, 2) }}</td>
                <td class="p-2 text-right">{{ number_format($item->credit, 2) }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection
