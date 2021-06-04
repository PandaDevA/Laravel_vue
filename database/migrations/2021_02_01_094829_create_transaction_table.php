<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable(true);
            $table->string('credit')->nullable(true);
            $table->string('debit')->nullable(true);
            $table->double('balance')->nullable(true);
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
        Schema::dropIfExists('transaction');
        $table->dropColumn('description');
        $table->dropColumn('credit');
        $table->dropColumn('debit');
        $table->dropColumn('balance');
    }
}
