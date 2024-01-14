<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Lead;
use App\Models\LeadColumn;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::query()
            ->paginate(20);
        return view('history.index', compact('histories'));
    }

    public function show(History $history)
    {
        $lead = Lead::query()->where('id',$history->lead_id)->first();
        if(!$lead){
            $lead = "This lead has been deleted";
            return view('history.show', compact('history','lead'));
        }
        $lead = $lead->status;
        return view('history.show', compact('history','lead'));
    }
}
