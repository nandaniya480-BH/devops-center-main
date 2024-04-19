<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilePodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_pods', function (Blueprint $table) {
            $table->increments('id')->startingValue(1001);
            $table->bigInteger('item_profile_number');
            $table->text('item_name')->nullable();
            $table->text('item_last_name')->nullable();
            $table->text('item_profile_title')->nullable();
            $table->text('item_slug')->nullable();
            $table->text('item_content_teaser')->nullable();
            $table->text('item_content')->nullable();
            $table->date('item_available_from_date')->nullable();
            $table->longText('item_skill_tags')->nullable();
            $table->text('item_experience')->nullable();
            $table->text('item_language')->nullable();
            $table->boolean('item_is_active')->default(true);
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
        Schema::dropIfExists('profile_pods');
    }
}
