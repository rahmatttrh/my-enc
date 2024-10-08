<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employe_id');
            $table->date('date')->default('2024-01-01');
            $table->integer('achievement')->default(0);
            $table->integer('discipline')->default(0);
            $table->integer('kpi')->default(0);
            $table->integer('behavior')->default(0);
            $table->integer('pengurang')->default(0);
            $table->string('status', 3)->default('0');
            $table->string('is_semester', 1)->default('0');
            $table->string('semester', 1)->nullable();
            $table->string('tahun', 4)->nullable();
            $table->text('komentar')->nullable();
            $table->text('pengembangan')->nullable();
            $table->string('evidence')->nullable();
            $table->text('alasan_reject')->nullable();  // Alasan Reject dari manager
            $table->string('nd_dibuat', 50)->nullable();
            $table->string('nd_from', 50)->nullable();
            $table->string('nd_for', 1)->nullable();  // Status : [1] atasan langsung [2] karyawan tersebut [3] keduanya 
            $table->text('nd_alasan')->nullable();  // Alasan Need Discuss
            $table->date('nd_date')->nullable();
            $table->string('complained', 1)->default('0');
            $table->string('complain_alasan')->nullable();
            $table->date('complain_date')->nullable();
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
        Schema::dropIfExists('pes');
    }
}
