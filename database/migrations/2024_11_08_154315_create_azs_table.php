<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('azs', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('address');
            $table->string('owner');
            $table->integer('fuel_stock');
            $table->decimal('fuel_price', 5, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('azs');
    }
};
