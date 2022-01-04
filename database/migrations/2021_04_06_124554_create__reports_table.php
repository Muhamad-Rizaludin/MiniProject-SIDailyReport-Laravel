<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('IdKaryawan');
            $table->string('NamaKaryawan');
            $table->string('KodeJabatan');
            $table->string('NamaJabatan');
            $table->string('KodeJobdesk');
            $table->string('NamaJobdesk');
            $table->string('JobdeskDetail');
            $table->string('KegHarian');
            $table->string('status');
            $table->string('keterangan');
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
        Schema::dropIfExists('reports');
    }
}