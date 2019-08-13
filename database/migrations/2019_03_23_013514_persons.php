<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Persons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('person_name', 50)->default('')->nullable();
            $table->tinyInteger('sex')->default(null)->nullable();
            $table->date('birth_day')->default(null)->nullable();
            $table->string('zip', 7)->default('')->nullable();
            $table->string('address_code', 15)->default('')->nullable();
            $table->string('address1', 100)->default('')->nullable();
            $table->string('address2', 100)->default('')->nullable();
            $table->string('email', 200)->default('')->nullable();
            $table->string('tel', 15)->default('')->nullable();
            $table->json('traffic')->default(null)->nullable();
            $table->text('contents')->default(null)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
                Schema::drop('persons');
    }
}
