<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cells', function (Blueprint $table) {
            $table->id();
            $table->foreignId('row_id')
                ->constrained('rows')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('column_id')
                ->constrained('columns')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('type', array_keys(config('enums.cell_types')));
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
        Schema::dropIfExists('cells');
    }
};
