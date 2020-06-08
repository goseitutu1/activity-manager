<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSMSLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_m_s_logs', function (Blueprint $table) {
            $table->string('user_id');
            $table->string('user_name');
            $table->increments('SMS_id');
            $table->string('SMS_title');
            $table->mediumText('SMS_description');
            $table->string('customer_telephone');
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
        Schema::dropIfExists('s_m_s_logs');
    }
}
