<?php

use App\Models\Personal;
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
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('run')->nullable();
            $table->string('tipo')->nullable();
            $table->string('nombre')->nullable();
            $table->string('correo')->nullable();
            $table->string('cargo')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('puesto')->nullable();
            $table->string('imagen')->nullable();
            $table->boolean('mostrar')->default(true);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });


        DB::unprepared(file_get_contents('database/import/sql_personal.sql'));

        $personales = Personal::get();

        foreach ($personales as $p) {
          $p->nombre = Str::replace('_',' ',$p->nombre);
          $p->correo = Str::upper(trim($p->correo));
          if ($p->imagen == 'image.png') {
            $p->imagen = null;
          }
          $p->update();
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
