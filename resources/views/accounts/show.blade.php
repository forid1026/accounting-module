@extends('layouts.app')

@section('title', 'Account Details')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow max-w-xl mx-auto">

        <h2 class="text-2xl font-bold mb-4">Account Details</h2>

        <p><strong>Name:</strong> {{ $account->name }}</p>
        <p><strong>Code:</strong> {{ $account->code }}</p>
        <p><strong>Type:</strong> {{ ucfirst($account->type) }}</p>
        <p><strong>Parent:</strong> {{ $account->parent?->name ?? 'None' }}</p>
        <p><strong>Description:</strong> {{ $account->description }}</p>

    </div>
@endsection
