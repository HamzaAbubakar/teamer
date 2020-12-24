<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Global_option;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['reports'] = Report::all();
        $data['global_options'] = Global_option::latest()->first();
        return view('admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $operation = $request->operation;

        if ($operation == 'report_add') {

            $report = Report::create([
                'date' => strtotime($request->date),
                'name' => $request->name,
                'tasks' => $request->tasks,
                'doc_link' => $request->doc_link,
                'check_in' => strtotime($request->check_in),
                'check_out' => strtotime($request->check_out),
            ]);
        } else  if ($operation == 'notes_add') {

            $g_option = Global_option::create([
                'notes' => $request->notes,
            ]);
        }
        return redirect('reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reports = Report::findOrFail($id);
        $reports->delete();
        if ($reports->trashed()) {
            return redirect('reports')->with('msg', 'Record Deleted Successfully!');
        } else {
            return redirect('reports')->with('msg', 'Something Went Wrong!');
        }
    }
}
