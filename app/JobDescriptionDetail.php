<?php
/**
 *    
 * JDS----------------------------------------------
 *  RCN/登錄日/EMDN/NAME/(工作）起始日/部門/職銜(稱)/階級/代理人
 *  JDSDATA------------------------------------------
 *  別: 職務/每日/每週/每月/每季/每年/目標/其他
 *  類: 執行/稽查/規劃/管理/其他
 *  部: 業務/會計/儲運/資訊/出版
 *  身: A/R/C/I
 *  主題:
 *  說明:
 *  目標:
 *  達成率:
 *  停用:
 *  備註:
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDescriptionDetail extends Model
{
    /**
     * id 	
     * job_description_id 	
     * type 別	
     * category 類	
     * department 部門	
     * subject 職銜	
     * description 說明	
     * target 目標	
     * result 達成率	
     * is_used 是否停用	
     * note 備註	
     * created_at 	
     * updated_at  */

    protected $fillable = ['job_description_id', 'type', 'category', 'department', 'subject', 'description', 'target', 'result', 'is_used', 'note'];

    public function saveJobDescriptionDetail($data)
    {
        $this->job_description_id = $data['job_description_id'];
        $this->type = $data['type'];
        $this->category = $data['category'];
        $this->department = $data['department'];
        $this->subject = $data['subject'];
        $this->description = $data['description'];
        $this->target = $data['target'];
        $this->result = $data['result'];
        $this->is_used = $data['is_used'];
        $this->note = $data['note'];
        $this->save();
        return 1;
    }

    public function updateJobDescriptionDetail($data)
    {
        $job_description_detail = $this->find($data['id']);
        $job_description_detail->job_description_id = $data['job_description_id'];
        $job_description_detail->type = $data['type'];
        $job_description_detail->category = $data['category'];
        $job_description_detail->department = $data['department'];
        $job_description_detail->subject = $data['subject'];
        $job_description_detail->description = $data['description'];
        $job_description_detail->target = $data['target'];
        $job_description_detail->result = $data['result'];
        $job_description_detail->is_used = $data['is_used'];
        $job_description_detail->note = $data['note'];


        $job_description_detail->save();
        return 1;
    }

}
