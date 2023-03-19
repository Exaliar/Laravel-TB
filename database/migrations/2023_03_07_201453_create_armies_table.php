<?php

use App\Config\MenuTypesConfig;
use App\Config\UnitCategoryTypeConfig;
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
        Schema::create('armies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('lvl');
            $table->string('name');
            $table->enum('menu_type', MenuTypesConfig::TYPES);
            $table->enum('first_type', UnitCategoryTypeConfig::TYPES)->nullable();
            $table->enum('second_type', UnitCategoryTypeConfig::TYPES)->nullable();
            $table->enum('third_type', UnitCategoryTypeConfig::TYPES)->nullable();
            $table->integer('strength');
            $table->integer('health');
            $table->unsignedInteger('first_bonus')->nullable();
            $table->enum('first_bonus_who', UnitCategoryTypeConfig::TYPES)->nullable();
            $table->unsignedInteger('second_bonus')->nullable();
            $table->enum('second_bonus_who', UnitCategoryTypeConfig::TYPES)->nullable();
            $table->unsignedInteger('third_bonus')->nullable();
            $table->enum('third_bonus_who', UnitCategoryTypeConfig::TYPES)->nullable();
            $table->string('graphics')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('armies');
    }
};
