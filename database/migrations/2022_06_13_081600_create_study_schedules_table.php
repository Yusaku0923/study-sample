<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudySchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_schedules', function (Blueprint $table) {
            $table->id()->comment('学習スケジュールID');
            $table->unsignedBigInteger('record_id')->comment('学習記録ID');
            $table->date('schedule')->comment('学習予定日');
            $table->date('completed_at')->nullable()->comment('完了日');
            $table->unsignedBigInteger('scheduled_seconds')->default(0)->comment('学習予定時間（秒）');
            $table->unsignedBigInteger('executed_seconds')->default(0)->comment('学習実行時間（秒）');
            $table->text('text')->comment('メモ');
            $table->softDeletes()->comment('削除日時');
            // $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日時');
            // $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日時');
            $table->timestamps();

            $table->foreign('record_id')->references('id')->on('study_records');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_schedules');
    }
}
