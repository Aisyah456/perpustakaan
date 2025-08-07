<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::active()->ordered()->get();

        return view('admin.Eresourcess.journal.index', compact('journals'));
    }

    public function show(Journal $journal)
    {
        return redirect($journal->access_url);
    }
}
