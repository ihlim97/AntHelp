<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id'); // refers back to the senior citizen
            $table->unsignedInteger('service_provider_id');
            $table->unsignedInteger('request_id'); // service request must be completed before a review can be made
            $table->decimal('user_rating', 5, 1)->nullable();
            $table->longText('user_comment')->nullable();
            $table->longText('service_provider_reply')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
