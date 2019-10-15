<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('Nome do evento');
            $table->integer('user_id');
            $table->integer('privacy_event_id')->comment('Publico do evento');
            $table->string('location')->comment('Localização do evento');
            $table->string('presentation')->comment('Apresentação do evento');
            $table->foreign('privacy_event_id')->references('id')->on('privacy_events')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('user')
                ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('event');
    }
}
