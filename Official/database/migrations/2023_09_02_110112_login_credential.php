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
        Schema::create('Officials', function(Blueprint $req){
            $req->id();
            $req->string('Name');
            $req->bigInteger('Mobile');
            $req->string('Password');
            $req->string('Designation');
            $req->string('UserName');
            $req->timestamps();



        });

    }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
