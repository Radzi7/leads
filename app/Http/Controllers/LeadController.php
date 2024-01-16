<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Lead;
use App\Models\LeadColumn;
use App\Models\Operator;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::query()
            ->paginate(50);
        $lead_columns = LeadColumn::query()
            ->paginate(50);

        return view('leads/index', compact('leads','lead_columns'));
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'number' => 'required|regex:/^(!?){0}([+]){1}([998]){3}([7-9]){1}([0-9]){1}([0-9]){3}([0-9]){2}([0-9]){2}$/m',
        ]);
        $leads = Lead::query()->where('status','New leads')->count();
        if($leads>=10){
            toastr()->error('There is a lot of new leads !');
            return redirect()->route('leads');
        }
        $lead = new Lead();
        $lead->status = 'New leads';
        $lead->lead_column_id = 1;
        $lead->name = $request->name;
        $lead->number = $request->number;
        $lead->comment = $request->comment;
        $lead->created_at = now();
        $lead->save();

        $history = new History();
        $history->action = 'create';
        $history->lead_id = $lead->id;
        $history->data = json_encode($lead->getAttributes());
        $history->save();

        toastr()->success('New lead created successfully !');
        return redirect()->route('leads', $lead);
    }

    public function show(Lead $lead)
    {
        return view('leads.show', compact('lead'));
    }

    public function edit(Lead $lead)
    {
        $lead_columns = LeadColumn::query()
            ->latest('created_at')
            ->paginate(10);
        $operators = Operator::query()
            ->latest('created_at')
            ->paginate(10);
        return view('leads.edit', compact('lead','lead_columns', 'operators'));
    }
    public function update(Request $request, Lead $lead){

        $request->validate([
            'name' => 'required|string',
            'number' => 'required|regex:/^(!?){0}([+]){1}([998]){3}([7-9]){1}([0-9]){1}([0-9]){3}([0-9]){2}([0-9]){2}$/m',
        ]);
        $lead->status = LeadColumn::query()->where('id', intval($request->status_select))->first()->getAttribute('name');
        $column_count = Lead::query()->where('lead_column_id',intval($request->status_select))->count();
        if(!$column_count >= 11){
            $lead->name = $request->name;
            $lead->number = $request->number;
            $lead->comment = $request->comment;
            $lead->operator_id = $request->operator_id;
            if(intval($request->status_select)==1){
                $lead->operator_id = null;
            }
            $lead->lead_column_id = intval($request->status_select);
            $lead->created_at = now();
            $lead->save();

            $history = new History();
            $history->action = 'update';
            $history->lead_id = $lead->id;
            $history->data = json_encode($lead->getAttributes());
            $history->save();

            toastr()->success('Lead updated successfully!');
            return redirect()->route('leads');
        }
        else toastr()->error('This column is full !');
        return redirect()->route('leads');
    }
    public function takeEdit(Lead $lead)
    {
        $operators = Operator::query()
            ->latest('created_at')
            ->paginate(10);
        return view('take.edit', compact('lead','operators'));
    }

    public function takeUpdate(Request $request, Lead $lead)
    {
        if($lead->status == "New leads"){
            $lead->status = "My list";
            $lead->lead_column_id = 2;
        }
        $lead->operator_id = $request->status_select;
        $lead->created_at = now();
        $lead->save();

        $history = new History();
        $history->action = 'change operator';
        $history->lead_id = $lead->id;
        $history->data = json_encode($lead->getAttributes());
        $history->save();

        toastr()->success('Operator added successfully !');
        return redirect()->route('leads');
    }

    public function columnEdit(Lead $lead)
    {
        $columns = LeadColumn::query()
            ->latest('created_at')
            ->paginate(10);
        $operators = Operator::query()
            ->latest('created_at')
            ->paginate(10);
        return view('column.edit', compact('lead','columns','operators'));
    }

    public function columnUpdate(Request $request, Lead $lead)
    {
        $lead->status = LeadColumn::query()->where('id', intval($request->status_select))->first()->getAttribute('name');
        $column_count = Lead::query()->where('lead_column_id',intval($request->status_select))->count();
//        dd($lead->status);
        if(!$column_count >= 11){
            if(intval($request->status_select)==1){
                $lead->operator_id = null;
            } else {
                $lead->operator_id = intval($request->operator);
            }
            $lead->lead_column_id = intval($request->status_select);
            $lead->created_at = now();
            $lead->save();

            $history = new History();
            $history->action = 'change column';
            $history->lead_id = $lead->id;
            $history->data = json_encode($lead->getAttributes());
            $history->save();

            toastr()->success('Lead updated successfully!');
            return redirect()->route('leads');
        }
        toastr()->error('This column is full !');
        return redirect()->route('leads');
    }

    public function commentEdit(Lead $lead)
    {
        return view('comment.edit', compact('lead'));
    }

    public function commentUpdate(Request $request, Lead $lead)
    {
        $lead->comment = $request->comment;
        $lead->created_at = now();
        $lead->save();

        $history = new History();
        $history->action = 'edit comment';
        $history->lead_id = $lead->id;
        $history->data = json_encode($lead->getAttributes());
        $history->save();

        toastr()->success('Comment edited successfully !');

        return view('leads.show', compact('lead'));
    }
    public function delete(Lead $lead)
    {
        $history = new History();
        $history->action = 'delete lead';
        $history->lead_id = $lead->id;
        $history->data = json_encode($lead->getAttributes());
        $lead->created_at = now();
        $history->save();
        $lead->delete();
        toastr()->error('Lead deleted !');
        return redirect()->route('leads');
    }
}
