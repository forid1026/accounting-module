@extends('layouts.app')

@section('title', 'Add Account')

@section('content')
<div class="bg-white p-6 rounded-xl shadow max-w-xl mx-auto">

    <h2 class="text-2xl font-bold mb-4">Add New Account</h2>

    <form action="{{ route('accounts.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>Code</label>
            <input type="text" name="code" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>Type</label>
            <select name="type" class="w-full border p-2 rounded" required>
                <option value="">Select Type</option>
                <option value="asset">Asset</option>
                <option value="liability">Liability</option>
                <option value="equity">Equity</option>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
        </div>

        <div class="mb-4">
            <label>Parent Account</label>
            <select name="parent_id" class="w-full border p-2 rounded">
                <option value="">None</option>
                @foreach($parents as $p)
                <option value="{{ $p->id }}">{{ $p->name }} ({{ $p->code }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Description</label>
            <textarea name="description" class="w-full border p-2 rounded"></textarea>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
    </form>

</div>
@endsection
