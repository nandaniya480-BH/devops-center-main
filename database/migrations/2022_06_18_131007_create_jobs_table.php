<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('item_title')->nullable();
            $table->text('item_slug')->nullable();
            $table->text('item_content')->nullable();
            $table->text('item_location')->nullable();
            $table->text('item_type')->nullable();
            $table->text('item_social_linkedin')->nullable();
            $table->text('item_social_xing')->nullable();
            $table->text('item_contact_full_name')->nullable();
            $table->text('item_contact_email')->nullable();
            $table->text('item_contact_phone')->nullable();
            $table->boolean('item_is_active')->default(true);
            $table->longText('item_tags')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
