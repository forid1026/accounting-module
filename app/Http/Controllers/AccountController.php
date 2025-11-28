<?php
namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::with('parent')->orderBy('type')->get();

        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        $parents = Account::all();
        return view('accounts.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:accounts,code',
            'type' => 'required',
        ]);

        Account::create($request->all());

        return redirect()->route('accounts.index')->with('success', 'Account created successfully!');
    }

    public function show(Account $account)
    {
        return view('accounts.show', compact('account'));
    }

    public function edit(Account $account)
    {
        $parents = Account::where('id', '!=', $account->id)->get();
        return view('accounts.edit', compact('account','parents'));
    }

    public function update(Request $request, Account $account)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:accounts,code,' . $account->id,
            'type' => 'required',
        ]);

        $account->update($request->all());

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully!');
    }

    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully!');
    }
}
