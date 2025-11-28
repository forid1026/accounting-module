@extends('layouts.app')

@section('title', 'Edit Account')

@section('content')
<div class="bg-white p-6 rounded-xl shadow max-w-xl mx-auto">

    <h2 class="text-2xl font-bold mb-4">Edit Account</h2>

    <form action="{{ route('accounts.update', $account->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" value="{{ $account->name }}"
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>Code</label>
            <input type="text" name="code" value="{{ $account->code }}"
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>Type</label>
            <select name="type" class="w-full border p-2 rounded" required>
                @foreach(['asset','liability','equity','income','expense'] as $t)
                <option value="{{ $t }}" @selected($t==$account->type)>{{ ucfirst($t) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Parent</label>
            <select name="parent_id" class="w-full border p-2 rounded">
                <option value="">None</option>
                @foreach($parents as $p)
                <option value="{{ $p->id }}" @selected($p->id==$account->parent_id)>
                    {{ $p->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Description</label>
            <textarea name="description" class="w-full border p-2 rounded">
                {{ $account->description }}
            </textarea>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
    </form>

</div>
@endsection
