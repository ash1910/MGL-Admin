<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHaorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('haors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('upazila_id');

            $table->string('name')->nullable();
            $table->string('area')->nullable();
            $table->string('thumb_img')->nullable();
            $table->string('thumb_img_big')->nullable();
            $table->string('header_img')->nullable();
            $table->text('overview')->nullable();
            $table->text('about')->nullable();
            $table->text('description')->nullable();
            $table->json('gallery_items')->nullable();

            $table->foreign('district_id')
                ->references('id')->on('districts');

            $table->foreign('upazila_id')
                ->references('id')->on('upazilas');

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
        Schema::dropIfExists('haors');
    }
}
