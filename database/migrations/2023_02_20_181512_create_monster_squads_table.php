<?php

use App\Config\MonstersSquadTypeConfig;
use App\Config\MonstersTypeConfig;
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
        Schema::create('monster_squads', function (Blueprint $table) {
            $table->uuid('id');
            $table->enum('squad_type', MonstersSquadTypeConfig::TYPES);
            $table->unsignedTinyInteger('lvl');
            $table->enum('type', MonstersTypeConfig::TYPES);
            $table->foreignId('first_monster')->nullable()->constrained('monsters');
            $table->unsignedInteger('first_monster_count');
            $table->foreignId('second_monster')->nullable()->constrained('monsters');
            $table->unsignedInteger('second_monster_count');
            $table->foreignId('third_monster')->nullable()->constrained('monsters');
            $table->unsignedInteger('third_monster_count');
            $table->foreignId('fourth_monster')->nullable()->constrained('monsters');
            $table->unsignedInteger('fourth_monster_count');
            $table->foreignId('fifth_monster')->nullable()->constrained('monsters');
            $table->unsignedInteger('fifth_monster_count');
            $table->foreignId('sixth_monster')->nullable()->constrained('monsters');
            $table->unsignedInteger('sixth_monster_count');
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
        Schema::dropIfExists('monster_squads');
    }
};
