<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('gender', ['m','f']);
            $table->string('address');
            $table->integer('mobilenumber')->nullable();
            $table->enum('role', ['warden','subwarden','student']);
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
