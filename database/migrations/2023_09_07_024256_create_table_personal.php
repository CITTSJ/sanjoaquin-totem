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
            $table->string('apellido')->nullable();
            $table->string('correo')->nullable();
            $table->string('cargo')->nullable();
            $table->string('ubicacion')->nullable();
            $table->integer('jefatura_id')->nullable();
            $table->string('puesto')->nullable();
            $table->string('imagen')->nullable();
            $table->boolean('mostrar')->default(true);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });


        DB::unprepared(file_get_contents('database/import/sql_personal.sql'));

        $personales = Personal::get();

        foreach ($personales as $p) {
          // $p->nombre = Str::replace('-',' ',$p->run);
          // split nombre
          $p->nombre = Str::ucfirst(Str::lower(explode(' ', $p->nombre)[0]));
          // $p->apellido = Str::ucfirst(Str::lower($p->apellido));
          $p->apellido = Str::ucfirst(Str::lower(explode(' ', $p->apellido)[0]));
          // $p->nombre = Str::ucfirst($p->nombre);
          $p->correo = Str::lower(trim($p->correo));


          // if

          if ($p->imagen > 0) {
            if ($p->imagen >= 10000) {
              $p->imagen = 'local-' . $p->imagen . '.png';
            } else {
              $p->imagen = 'local-' . $p->imagen . '.jpg';
            }
          }

          if ($p->imagen == 0) {
            $p->imagen = null;
          }



          // if ($p->imagen == 'image.png') {
          //   $p->imagen = null;
          // }
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
