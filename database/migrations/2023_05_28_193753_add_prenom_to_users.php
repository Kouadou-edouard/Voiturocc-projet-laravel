<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrenomToUsers extends Migration
{

  
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table -> string ('prenom', 100) -> nullable()->after('name');
          $table -> string ('username', 100) -> nullable()->after('prenom');
        });
    }

}
