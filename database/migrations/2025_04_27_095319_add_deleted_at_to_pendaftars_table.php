<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToPendaftarsTable extends Migration
{
    public function up()
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->softDeletes(); // ini akan buat kolom deleted_at
        });
    }

    public function down()
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
