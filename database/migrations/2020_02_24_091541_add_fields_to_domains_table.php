<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domains', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->text('content_length')->nullable();
            $table->text('response_code')->nullable();
            $table->text('body')->nullable();
            $table->text('h1')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domains', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('updated_at');
            $table->dropColumn('created_at');
            $table->dropColumn('content_length');
            $table->dropColumn('response_code');
            $table->dropColumn('body');
            $table->dropColumn('h1');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('meta_description');
        });
    }
}
