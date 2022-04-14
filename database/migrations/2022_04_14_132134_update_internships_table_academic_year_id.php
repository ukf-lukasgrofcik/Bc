<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInternshipsTableAcademicYearId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internships', function (Blueprint $table){
            $table->bigInteger('academic_year_id')->unsigned()->nullable();
            $table->foreign('academic_year_id')->references('id')->on('academic_years')->onDelete('set null')->onUpdate('set null');
            $table->dropColumn('academic_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internships', function (Blueprint $table){
            $table->string('academic_year', 255)->nullable();
            $table->dropForeign(['academic_year_id']);
            $table->dropColumn('academic_year_id');
        });
    }
}
