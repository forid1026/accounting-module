@extends('layouts.app')

@section('title', 'New Journal Entry')

@section('content')

<div class="bg-white p-6 rounded-xl shadow max-w-4xl mx-auto">

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 mb-3 rounded">
            {{ session('error') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold mb-4">New Journal Entry</h2>

    <form action="{{ route('journal.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <label>Date</label>
                <input type="date" name="date" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label>Reference</label>
                <input type="text" name="reference" class="w-full border p-2 rounded">
            </div>
        </div>

        <div class="mb-4">
            <label>Description</label>
            <textarea name="description" class="w-full border p-2 rounded"></textarea>
        </div>

        <hr class="my-4">

        <h3 class="text-xl font-semibold mb-3">Journal Items</h3>

        <table class="w-full" id="journalTable">
            <thead>
                <tr>
                    <th class="p-2 text-left">Account</th>
                    <th class="p-2">Debit</th>
                    <th class="p-2">Credit</th>
                    <th class="p-2 text-left">Note</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="p-2">
                        <select name="account_id[]" class="border p-2 rounded w-full">
                            @foreach($accounts as $acc)
                            <option value="{{ $acc->id }}">{{ $acc->name }} ({{ $acc->code }})</option>
                            @endforeach
                        </select>
                    </td>

                    <td class="p-2">
                        <input type="number" step="0.01" name="debit[]" class="border p-2 rounded w-full">
                    </td>

                    <td class="p-2">
                        <input type="number" step="0.01" name="credit[]" class="border p-2 rounded w-full">
                    </td>

                    <td class="p-2">
                        <input type="text" name="note[]" class="border p-2 rounded w-full">
                    </td>

                    <td class="p-2 text-center">
                        <button type="button" class="text-red-600" onclick="removeRow(this)">X</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="button" onclick="addRow()" class="mt-3 px-4 py-2 bg-gray-600 text-white rounded">+ Add Row</button>

        <div class="mt-6">
            <button class="px-6 py-2 bg-blue-600 text-white rounded">Save Entry</button>
        </div>

    </form>

</div>

<script>
function addRow() {
    let row = document.querySelector('#journalTable tbody tr').outerHTML;
    document.querySelector('#journalTable tbody').insertAdjacentHTML('beforeend', row);
}

function removeRow(btn) {
    let rows = document.querySelectorAll('#journalTable tbody tr');
    if (rows.length > 1) btn.closest('tr').remove();
}
</script>

@endsection
