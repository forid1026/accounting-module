<?php
namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\JournalEntry;
use App\Models\JournalEntryItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JournalEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = JournalEntry::with('items')->latest()->get();
        return view('journal.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = Account::orderBy('name')->get();
        return view('journal.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'         => 'required|date',
            'account_id.*' => 'required',
            'debit.*'      => 'nullable|numeric',
            'credit.*'     => 'nullable|numeric',
        ]);

        $debits  = array_sum($request->debit);
        $credits = array_sum($request->credit);

        if ($debits != $credits) {
            return back()->with('error', 'Debit and Credit must be equal.')
                ->withInput();
        }

        $entry = JournalEntry::create([
            'date'        => $request->date,
            'ref_no'   => $request->reference,
            'description' => $request->description,
            'status'      => 'draft',
        ]);

        foreach ($request->account_id as $index => $acc) {
            JournalEntryItem::create([
                'journal_entry_id' => $entry->id,
                'account_id'       => $acc,
                'debit'            => $request->debit[$index] ?? 0,
                'credit'           => $request->credit[$index] ?? 0,
                'note'             => $request->note[$index] ?? null,
            ]);
        }

        return redirect()->route('journal.index')->with('success', 'Journal Entry Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JournalEntry $journal)
    {
        $journal->load('items.account');
        return view('journal.show', compact('journal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
