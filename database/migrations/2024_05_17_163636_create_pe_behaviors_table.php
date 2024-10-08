<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeBehaviorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upp()
    {
        Schema::create('pe_behaviors', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('objective', 50);
            $table->text('description')->nullable();
            $table->tinyInteger('bobot')->default(0);
            $table->string('priode', 50)->nullable();
            $table->string('level',3)->default('s');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   //  public function down()
   //  {
   //      Schema::dropIfExists('pe_behaviors');
   //  }
}
