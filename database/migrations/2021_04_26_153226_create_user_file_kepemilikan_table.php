<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFileKepemilikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_file_kepemilikan', function (Blueprint $table) {
            $table->id();
            //$table->char('mime',255);
            $table->string('mime',255);
            //$table->blob('data');
            $table->binary('data');
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
        Schema::dropIfExists('user_file_kepemilikan');
    }
}
