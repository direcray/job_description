<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobDescription;
use App\JobDescriptionDetail;

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

        $job_description_id = $job_description->saveJobDescription($data);

        $input = $request->all();
        $detail_type = $input['type'];
        $detail_category = $input['category'];
        $detail_depart = $input['depart'];
        $detail_role = $input['role'];
        $detail_subject = $input['subject'];
        $detail_description = $input['description'];
        $detail_target = $input['target'];
        $detail_result = $input['result'];
        $detail_is_used = $input['is_used'];
        $detail_note = $input['note'];

        $detail_data = array();
        for ($i = 0; $i < count($detail_type); $i ++) {
            reset($detail_data);
            $job_description_detail = new JobDescriptionDetail();
            $detail_data['job_description_id'] = $job_description_id;
            $detail_data['type'] = $detail_type[$i];
            $detail_data['category'] = $detail_category[$i];
            $detail_data['department'] = $detail_depart[$i];
            $detail_data['role'] = $detail_role[$i];
            $detail_data['subject'] = $detail_subject[$i];
            $detail_data['description'] = $detail_description[$i];
            $detail_data['target'] = $detail_target[$i];
            $detail_data['result'] = $detail_result[$i];
            $detail_data['is_used'] = $detail_is_used[$i];
            $detail_data['note'] = $detail_note[$i];
            $job_description_detail->saveJobDescriptionDetail($detail_data);
        }

        return redirect('/job_descriptions')->with('success', '已新增工作說明。'. $request->input('type.1'));
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
        $job_description_details = JobDescriptionDetail::where('job_description_id', $id)->get();

        return view('job_description.edit', compact('job_description', 'job_description_details', 'id'));
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

        $input = $request->all();
        $detail_id = $input['detail_id'];
        $detail_type = $input['type'];
        $detail_category = $input['category'];
        $detail_depart = $input['depart'];
        $detail_role = $input['role'];
        $detail_subject = $input['subject'];
        $detail_description = $input['description'];
        $detail_target = $input['target'];
        $detail_result = $input['result'];
        $detail_is_used = $input['is_used'];
        $detail_note = $input['note'];

        $detail_data = array();
        for ($i = 0; $i < count($detail_type); $i ++) {
            reset($detail_data);
            $job_description_detail = new JobDescriptionDetail();
            $detail_data['job_description_id'] = $id;
            $detail_data['type'] = $detail_type[$i];
            $detail_data['category'] = $detail_category[$i];
            $detail_data['department'] = $detail_depart[$i];
            $detail_data['role'] = $detail_role[$i];
            $detail_data['subject'] = $detail_subject[$i];
            $detail_data['description'] = $detail_description[$i];
            $detail_data['target'] = $detail_target[$i];
            $detail_data['result'] = $detail_result[$i];
            $detail_data['is_used'] = $detail_is_used[$i];
            $detail_data['note'] = $detail_note[$i];

            if ($detail_id[$i] == "") {
                $job_description_detail->saveJobDescriptionDetail($detail_data);
            } else {
                $detail_data['id'] = $detail_id[$i];
                $job_description_detail->updateJobDescriptionDetail($detail_data);
            }
        }


        return redirect('/job_descriptions')->with('success', '工作說明已修改。');
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

        return redirect('/job_descriptions')->with('success', '產品已刪除。');
    }
}
