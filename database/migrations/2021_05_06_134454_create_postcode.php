<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostcode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_juusho', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('address_cd', 8)->default('')->nullable();
            $table->string('zip', 7)->default('')->nullable();
            $table->tinyInteger('m_prefectures_id')->default(null)->nullable();
            $table->string('ken', 7)->default('')->nullable();
            $table->string('shikuchouson_cd', 10)->default('')->nullable();
            $table->string('shikuchouson', 30)->default('')->nullable();
            $table->string('ooaza_cd', 10)->default('')->nullable();
            $table->string('ooaza', 30)->default('')->nullable();
            $table->string('aza', 30)->default('')->nullable();
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
        Schema::dropIfExists('postcode');
    }
}
