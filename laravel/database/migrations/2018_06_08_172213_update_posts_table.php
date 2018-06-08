<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('posts',function(Blueprint $table){
            $table->tinyInteger('status')->after('remark')->default(0)->comment('0:待處理、1:處理中、2:已完成、9:已刪除');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('posts',function(Blueprint $table){
            $table->dropColumn('status');
        });
    }
}
