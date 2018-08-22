<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDescription extends Model
{
    /**
     * id 	
     * job_date 登錄日	
     * emdn EMDN	
     * name 姓名	
     * start_date 開始日	
     * department 部門	
     * title 職銜	
     * level 階級	
     * substitute 代理人	
     * created_at 	
     * updated_at 
     */
    protected $fillable = ['job_date', 'name', 'emdn', 'start_date', 'department', 'title', 'level', 'substitute'];

    public function saveJobDescription($data)
    {
        $this->job_date = $data['job_date'];
        $this->name = $data['name'];
        $this->emdn = $data['emdn'];
        $this->start_date = $data['start_date'];
        $this->department = $data['department'];
        $this->title = $data['title'];
        $this->level = $data['level'];
        $this->substitute = $data['substitute'];
        $this->save();
        return $this->id;
    }

    public function updateJobDescription($data)
    {
        $job_description = $this->find($data['id']);
        $job_description->job_date = $data['job_date'];
        $job_description->emdn = $data['emdn'];
        $job_description->start_date = $data['start_date'];
        $job_description->department = $data['department'];
        $job_description->title = $data['title'];
        $job_description->level = $data['level'];
        $job_description->substitute = $data['substitute'];
        $job_description->save();
        return 1;
    }
}
