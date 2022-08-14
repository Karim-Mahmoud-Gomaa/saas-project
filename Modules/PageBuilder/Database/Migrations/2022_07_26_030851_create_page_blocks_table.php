<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pb_page_blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pb_pages')->cascadeOnDelete();
            // $table->integer('page_id')->unsigned();
            $table->integer('order')->default(0);
            $table->string('type')->default('block');
            $table->string('component');
            $table->longText('data');
            $table->timestamps();
        });
        // Schema::table('pb_page_blocks', function($table){
        //     // $table->foreignId('page_id')->constrained()->cascadeOnDelete();
        //     $table->foreign('page_id')->refrences('id')->on('pb_pages')
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_blocks');
    }
};
