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
        if(!Schema::hasTable('role_user')){
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->foreignKey('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignKey('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
          });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
};
