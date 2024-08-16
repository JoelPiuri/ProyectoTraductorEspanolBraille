<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->char('caracterEspanol', 1)->collation('utf8mb4_bin')->unique();
            $table->string('braille')->collation('utf8mb4_bin');
            $table->string('tipoCaracter');
            $table->timestamps();

            // Establecer charset y collation
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_bin';
        });

        Schema::create('translationsBrailleEsp', function (Blueprint $table) {
            $table->id();
            $table->string('braille');
            $table->string('caracterEspanol');
            $table->string('tipoCaracter');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('translations');
        Schema::dropIfExists('translationsBrailleEsp');
    }
};

