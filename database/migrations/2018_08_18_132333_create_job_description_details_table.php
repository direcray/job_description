<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobDescriptionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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
    public function up()
    {
        Schema::create('job_description_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_description_id');
            $table->char('type', 100)->comment('別');
            $table->char('category', 100)->comment('類');
            $table->char('department', 100)->comment('部門');
            $table->char('subject', 100)->comment('職銜');
            $table->text('description')->comment('說明');
            $table->char('target', 100)->comment('目標');
            $table->char('result', 100)->comment('達成率');
            $table->char('is_used', 1)->comment('是否停用');
            $table->text('note')->comment('備註');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_description_details');
    }
}
