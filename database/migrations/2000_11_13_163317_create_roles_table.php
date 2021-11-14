<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id')->unsigned();
            $table->string('nom_role');
        });
        $this->rolepardefaut();
    }
    private function rolepardefaut()
    {
        
        $role=[1=>'Visiteur',2=>'Utilisateur',3=>'Admin'];
        for( $id=1;$id<4;$id++){
        DB::table('roles')->insert([
            'id'=>$id,
            'nom_role'=>$role[$id],
        ]);
        }
    }
   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
