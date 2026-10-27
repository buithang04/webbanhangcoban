<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tbl_product', function (Blueprint $table) {
            if (!Schema::hasColumn('tbl_product', 'product_name')) {
                $table->string('product_name')->nullable();
            }
            if (!Schema::hasColumn('tbl_product', 'product_quantity')) {
                $table->integer('product_quantity')->default(0);
            }
        });

        if (!Schema::hasTable('tbl_gallery')) {
            Schema::create('tbl_gallery', function (Blueprint $table) {
                $table->increments('gallery_id');
                $table->string('gallery_name');
                $table->string('gallery_image');
                $table->unsignedInteger('product_id');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_gallery');
        Schema::table('tbl_product', function (Blueprint $table) {
            if (Schema::hasColumn('tbl_product', 'product_name')) {
                $table->dropColumn('product_name');
            }
            if (Schema::hasColumn('tbl_product', 'product_quantity')) {
                $table->dropColumn('product_quantity');
            }
        });
    }
};