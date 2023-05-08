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
        Schema::create('invoice_det', function (Blueprint $table) {
            $table->string('invd_oid', 32)->primary();
            $table->string('ref_inv_no');
            $table->string('ref_brg_code');
            $table->integer('invd_qty');
            $table->integer('invd_jml');
            $table->timestamps();

            $table->foreign('ref_inv_no')->references('inv_no')->on('invoice')->onDelete('cascade');
            $table->foreign('ref_brg_code')->references('brg_code')->on('barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_det');
    }
};
