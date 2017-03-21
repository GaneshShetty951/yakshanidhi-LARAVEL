<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYakshaganaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('melas',function(Blueprint $table){
            $table->increments('mela_id');
            $table->integer('manager_id')->unsigned()->nullable();
            $table->string('mela_name')->unique();
            $table->String('mela_pic')->nullable();
            $table->string('mela_email')->nullable();
            $table->string('contact',10);
            $table->string('village');
            $table->string('taluk');
            $table->string('district');
            $table->string('PINCODE');
            $table->timestamps();

            $table->foreign('manager_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
        Schema::create('prasanghas',function(Blueprint $table){
            $table->increments('prasangha_id');
            $table->string('prasangha_name')->unique();
            $table->string('prasangha_author')->nullable();
            $table->integer('prasangha_year')->nullable;
            $table->timestamps();
        });
        Schema::create('artists',function(Blueprint $table){
            $table->increments('artist_id');
            $table->integer('mela_id')->unsigned();
            $table->string('artist_first_name');
            $table->string('artist_second_name');
            $table->string('artist_pic');
            $table->string('artist_type');
            $table->string('artist_place');
            $table->timestamps();

            $table->foreign('mela_id')
            ->references('mela_id')
            ->on('melas')
            ->onDelete('cascade');
        });
        Schema::create('shows',function(Blueprint $table){
            $table->increments('show_id');
            $table->integer('mela_id')->unsigned();
            $table->integer('prasangha_id')->unsigned();
            $table->string('show_producer_name');
            $table->date('show_date');
            $table->time('show_time');
            $table->string('contact_1',10);
            $table->string('contact_2',10)->nullable();
            $table->string('village');
            $table->string('taluk');
            $table->string('district');
            $table->string('PINCODE',6);
            $table->timestamps();

            $table->foreign('mela_id')
                ->references('mela_id')
                ->on('melas')
                ->onDelete('cascade');

            $table->foreign('prasangha_id')
                ->references('prasangha_id')
                ->on('prasanghas')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('show');
        Schema::drop('artist');
        Schema::drop('prasangha');
        Schema::drop('mela');
    }
}
