<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobDescription;

class JobDescriptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job_description.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job_description = new JobDescription();
        
        $data = $this->validate($request, [
            'name'=> 'required',
            'emdn'=>'required',
            'job_date'=>'required',
            'start_date'=>'required',
            'department'=>'required',
            'title'=>'required',
            'level'=>'required',
            'substitute'=>'required'
        ]);
        

        $job_description->saveJobDescription($data);
        return redirect('/home')->with('success', '已新增工作說明。');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_descriptions = JobDescription::all();

        return view('job_description.index',compact('job_descriptions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job_description = JobDescription::where('id', $id)
                        ->first();

        return view('job_description.edit', compact('job_description', 'id'));
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
        $job_description = new JobDescription();
        $data = $this->validate($request, [
            'name'=> 'required',
            'emdn'=>'required',
            'job_date'=>'required',
            'start_date'=>'required',
            'department'=>'required',
            'title'=>'required',
            'level'=>'required',
            'substitute'=>'required'
        ]);
        $data['id'] = $id;
        $job_description->updateJobDescription($data);

        return redirect('/home')->with('success', '工作說明已修改。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job_description = JobDescription::find($id);
        $job_description->delete();

        return redirect('/home')->with('success', '產品已刪除。');
    }
}
