<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeKpasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pe_kpas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pe_id');
            $table->integer('kpi_id');
            $table->bigInteger('employe_id');
            $table->integer('achievement')->default(0);
            $table->date('date');
            $table->string('is_semester', 1)->default('0');
            $table->string('semester', 1)->nullable();
            $table->string('tahun', 4)->nullable();
            $table->string('status', 3)->default('0');
            $table->text('alasan_reject')->nullable();  // Alasan Reject dari manager
            $table->dateTime('release_at')->nullable();
            $table->dateTime('resend_at')->nullable(); // Untuk merevisi dan mengirim kembali
            $table->dateTime('verifikasi_at')->nullable();
            $table->dateTime('validasi_at')->nullable();
            $table->string('created_by')->nullable();
            $table->string('verifikasi_by')->nullable(); // Manager & Asmen
            $table->string('validasi_by')->nullable();  // HRD
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
        Schema::dropIfExists('pe_kpas');
    }
}
