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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('size');
            $table->dateTime('date');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('client_ref')->nullable();
            $table->foreignId('client_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('client_contact_id')->constrained('client_contacts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('payment_terms');
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
        Schema::dropIfExists('projects');
    }
};
