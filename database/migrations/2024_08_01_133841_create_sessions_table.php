<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('payload');
            $table->integer('last_activity');
            $table->ipAddress('ip_address'); 
            $table->text('user_agent')->nullable(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
