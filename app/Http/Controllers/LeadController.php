<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function leadsfetch()
    {
        $leads = Lead::all();
        return view("leads.index")->with(compact('leads'));
    }
}
