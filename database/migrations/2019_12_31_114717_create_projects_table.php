<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('class_id');
            $table->string('project_code', 20);
            $table->string('product_name', 100);
            $table->string('description', 300);
            $table->string('image_path', 150);
            $table->string('production_time', 15);
            $table->string('leader_name', 30);
            $table->string('team_name', 30);
            $table->string('team_member', 120);
            $table->unsignedTinyInteger('season_id');
            $table->unsignedBigInteger('token_id');
            $table->unique(['project_code', 'season_id']);
            $table->timestamps();
            $table->foreign('token_id')->references('id')->on('tokens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}