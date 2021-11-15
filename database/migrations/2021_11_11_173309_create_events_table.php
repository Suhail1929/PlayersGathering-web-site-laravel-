<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('events', function (Blueprint $table) {
            $table->id('id');
            $table->string('title', 100);
            $table->string('game', 50);
            $table->text('message');
            $table->datetime('date');
            $table->integer('NumP');
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
        Schema::dropIfExists('events',function (Blueprint $table){
        $table->dropColumn('deleted_at');
    });
    }
}
