<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->string('inv_oid', 32)->primary();
            $table->string('inv_no')->index();
            $table->date('inv_tanggal');
            $table->integer('inv_jumlah');
            $table->string('ref_user_oid');
            $table->string('ref_vendor_oid');
            $table->timestamps();

            $table->foreign('ref_user_oid')->references('user_oid')->on('user')->onDelete('cascade');
            $table->foreign('ref_vendor_oid')->references('vendor_oid')->on('vendor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
