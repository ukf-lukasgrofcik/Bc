<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_links', function (Blueprint $table) {
            $table->id();
            $table->string('hash', 255)->nullable();
            $table->string('role', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->tinyInteger('registered')->default(0);
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('workplace_id')->unsigned()->nullable();
            $table->foreign('workplace_id')->references('id')->on('workplaces')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration_links');
    }
}
