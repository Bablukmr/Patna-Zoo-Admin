<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    public function index()
    {
        $tenders = Tender::orderBy('id', 'asc')->get();
        return view('tender', compact('tenders'));
    }
}
