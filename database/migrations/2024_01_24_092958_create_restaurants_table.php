<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('address', 150);
            $table->string('p_iva', 100);
            $table->text('photo')->nullable();
            $table->string('telephone', 20)->nullable();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id') //rendo colonna una Fk
                ->references('id') //si riferisce alla colonna id
                ->on("users") //della tabella users
                ->onDelete('cascade');
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('restaurants');
    }
};
