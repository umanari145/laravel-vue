<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('persons', function (Blueprint $table) {
            $table->string('delivery_zip', 7)->default('')->nullable()->after('tel');
            $table->string('delivery_address1', 100)->default('')->nullable()->after('delivery_zip');
            $table->string('delivery_address2', 100)->default('')->nullable()->after('delivery_address1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
