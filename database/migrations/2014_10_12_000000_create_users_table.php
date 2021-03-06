<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',150);
            $table->string('lastname',150);
            $table->integer('ci')->unique()->nullable();
            $table->string('email',250)->unique();
            $table->string('occupation',250)->nullable();
            $table->string('address',350)->nullable();
            $table->string('password',125);
            $table->boolean('email_verified_at');
            $table->boolean('status');
            $table->date('birthdate')->nullable();
            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('account_number')->nullable();
            $table->string('contract_number')->nullable();
            $table->string('phone')->nullable();
            $table->enum('type',['Estudiante','Docente','Administrativo']);
            $table->string('invoice',250)->nullable();
            $table->string('registter',250)->nullable();
            $table->string('image',250)->nullable();
            $table->bigInteger('branch_office_id')->unsigned()->nullable();
            $table->bigInteger('profile_id')->unsigned()->nullable();
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('branch_office_id')->references('id')->on('branch_offices');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
