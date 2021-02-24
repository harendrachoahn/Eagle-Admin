<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddedUserProfileFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('lname')->after('phone')->nullable();
            $table->string('fname')->after('phone')->nullable();
            $table->string('profile')->after('password')->nullable();
            $table->string('address')->after('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lname');
            $table->dropColumn('fname');
            $table->dropColumn('profile');
            $table->dropColumn('address');
        });
    }
}
