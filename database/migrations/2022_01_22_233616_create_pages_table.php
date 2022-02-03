<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function down()
    {
        Schema::dropIfExists("pages");
    }

    public function up()
    {
        Schema::create("pages", function (Blueprint $table) {
            $table->id();

            $table->string("title")->unique();
            $table
                ->string("slug")
                ->unique()
                ->index();

            $table->mediumText("body");
            $table->text("excerpt");

            $table->boolean("published");
            $table->dateTime("published_at");

            $table->softDeletes();
            $table->timestamps();
        });
    }
}
