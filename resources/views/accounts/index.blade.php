@extends('layouts.app')

@section('title', 'Chart of Accounts')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Chart of Accounts</h2>
        <a href="{{ route('accounts.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded">+ Add Account</a>
    </div>

    <table class="w-full table-auto">
        <thead>
            <tr class="border-b">
                <th class="p-2 text-left">Code</th>
                <th class="p-2 text-left">Name</th>
                <th class="p-2 text-left">Type</th>
                <th class="p-2 text-left">Parent</th>
                <th class="p-2 text-right">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($accounts as $account)
            <tr class="border-b">
                <td class="p-2">{{ $account->code }}</td>
                <td class="p-2">{{ $account->name }}</td>
                <td class="p-2 capitalize">{{ $account->type }}</td>
                <td class="p-2">{{ $account->parent?->name }}</td>

                <td class="p-2 text-right">
                    <a href="{{ route('accounts.edit', $account->id) }}" class="text-blue-600">Edit</a> |
                    <a href="{{ route('accounts.show', $account->id) }}" class="text-gray-600">View</a> |

                    <form action="{{ route('accounts.destroy', $account->id) }}"
                        method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this account?')"
                            class="text-red-600">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
