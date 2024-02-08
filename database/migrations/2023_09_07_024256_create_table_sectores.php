<?php

use App\Models\Sector;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector', function (Blueprint $table) {
            $table->id();
            $table->string('ubicacion')->nullable();
            $table->string('nombre')->nullable();
            $table->string('imagen')->nullable();
            $table->string('piso')->nullable();
            $table->string('descripcion')->nullable();
            $table->boolean('mostrar')->default(true);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        DB::unprepared(file_get_contents('database/import/sql_sector.sql'));


        $sectores = Sector::get();

        foreach ($sectores as $s) {
          $s->nombre = Str::replace('_',' ',$s->nombre);
          $s->update();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
};
