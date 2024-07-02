<?php

use App\Models\Usuario;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as FakerFactory;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('run')->nullable();
            $table->string('nombre');
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('correo')->unique();
            $table->string('password', 256);
            $table->integer('tipo_usuario')->nullable();
            $table->json('info')->nullable();
            $table->json('integrations')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });


        $u = new Usuario();
        $u->nombre = 'Hernan';
        $u->apellido_paterno = 'Mujica';
        $u->apellido_materno = 'Cornejo';
        $u->correo = 'hmujica@duoc.cl';
        $u->password = hash('sha256', 'hmujicaduoc');
        $u->tipo_usuario = 1;
        $u->save();

        $u = new Usuario();
        $u->nombre = 'Administrador';
        $u->apellido_paterno = 'plantilla';
        $u->apellido_materno = 'didactica';
        $u->correo = 'admin@duoc.cl';
        $u->password = hash('sha256', 'adminduoc001');
        $u->tipo_usuario = 1;
        $u->save();


        // $faker = FakerFactory::create();

        // for ($i = 0; $i < 200; $i++) {
        //   $u = new Usuario();
        //   $u->run = $i%2==0 ? 10000000 + $i : null;
        //   $u->nombre = $faker->firstName;
        //   $u->apellido_paterno = $faker->lastName;
        //   $u->apellido_materno = $faker->lastName;
        //   $u->correo = $faker->unique()->safeEmail;
        //   $u->password = hash('sha256', '123456');
        //   $u->id_sede = 1300;
        //   $u->tipo_usuario = 2;
        //   $u->save();
        // }
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
