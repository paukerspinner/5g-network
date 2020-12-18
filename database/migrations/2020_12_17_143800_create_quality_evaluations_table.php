<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualityEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quality_evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('network_node_id');
            $table->unsignedBigInteger('evaluation_criteria_id');
            $table->unsignedTinyInteger('value');
            $table->timestamps();
        });

        Schema::table('quality_evaluations', function(Blueprint $table) {
            $table->foreign('network_node_id')->references('id')->on('network_nodes')->onDelete('cascade');
            $table->foreign('evaluation_criteria_id')->references('id')->on('evaluation_criterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quality_evaluations');
    }
}
