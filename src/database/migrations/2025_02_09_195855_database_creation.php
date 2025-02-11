<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('personal_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('movement_id');
            $table->float('value');
            $table->dateTime('date');

            $table->foreign('user_id', 'personal_record_fk0')->references('id')->on('users');
            $table->foreign('movement_id', 'personal_record_fk1')->references('id')->on('movements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('user');
        Schema::drop('movement');
        Schema::drop('personal_record');
    }
};
