<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPastryPastryCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pastry_pastry_category', function (Blueprint $table) {
            $table->foreign('pastry_id')->references('id')->on('pastries')->onDelete('cascade');
            $table->foreign('pastry_category_id')->references('id')->on('pastry_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pastry_pastry_category', function (Blueprint $table) {
            $table->dropForeign('pastry_pastry_category_pastry_id_foreign');
            $table->dropForeign('pastry_pastry_category_pastry_category_id_foreign');
        });
    }
}
