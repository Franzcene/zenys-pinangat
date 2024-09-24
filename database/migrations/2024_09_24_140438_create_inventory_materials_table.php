<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the material
            $table->integer('quantity'); // Current stock level
            $table->integer('minimum_stock'); // Minimum stock level before alert
            $table->string('unit')->nullable(); // Measurement unit (e.g., kg, liters)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_materials');
    }
};
