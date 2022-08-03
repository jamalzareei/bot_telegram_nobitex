<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');

            $table->text('path');
            $table->string('size_file', 100)->nullable();
            $table->string('type_file', 50)->nullable();
            $table->text('base_url')->nullable();
            $table->text('file_id_telegram')->nullable();
            
            $table->unsignedBigInteger('bot_id')->nullable();
            // $table->foreign('bot_id')->references('id')->on('bots');

            $table->timestamp("actived_at")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
