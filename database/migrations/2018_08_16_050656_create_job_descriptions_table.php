<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobDescriptionsTable extends Migration
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
        Schema::create('job_descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('job_date')->comment('登錄日');
            $table->char('emdn', 4)->comment('EMDN');
            $table->char('name', 100)->comment('姓名');
            $table->date('start_date')->comment('開始日')->nullable();
            $table->char('department', 100)->comment('部門');
            $table->char('title', 100)->comment('職銜');
            $table->char('level', 100)->comment('階級');
            $table->char('substitute', 100)->comment('代理人');
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
        Schema::dropIfExists('job_descriptions');
    }
}
