<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('chat_id')->nullable(); // telegram chat id...
            $table->string('email')->nullable();
            $table->string('phone')->unique(); // 0098...
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->integer('login_telegram')->default(0);
            $table->string('password');
            $table->string('national_code')->nullable(); // code meli
            $table->timestamp('birth_date')->nullable();
            $table->string('balance')->default(0);
            $table->string('code_confirm')->nullable();
            $table->string('document_id')->nullable(); // photo user
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
