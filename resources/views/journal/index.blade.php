@extends('layouts.app')

@section('title', 'Journal Entries')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">
    
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Journal Entries</h2>
        <a href="{{ route('journal.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ New Entry</a>
    </div>

    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="p-2 text-left">Date</th>
                <th class="p-2 text-left">Reference</th>
                <th class="p-2 text-left">Description</th>
                <th class="p-2 text-right">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($entries as $e)
            <tr class="border-b">
                <td class="p-2">{{ $e->date }}</td>
                <td class="p-2">{{ $e->reference }}</td>
                <td class="p-2">{{ $e->description }}</td>
                <td class="p-2 text-right">
                    <a href="{{ route('journal.show', $e->id) }}" class="text-blue-600">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection
