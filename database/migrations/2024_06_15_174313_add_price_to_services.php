<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPriceToServices extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->after('title');
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
};