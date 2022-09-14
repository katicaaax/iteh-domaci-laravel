<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameDescriptionColumnToIngredientsInPastriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pastries', function (Blueprint $table) {
            $table->renameColumn('description', 'ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pastries', function (Blueprint $table) {
            $table->renameColumn('ingredients', 'description');
        });
    }
}
