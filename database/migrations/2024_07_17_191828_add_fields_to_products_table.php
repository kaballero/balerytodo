<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('box', 255)->nullable();
            $table->string('registry', 255)->nullable();
            $table->string('site', 255)->nullable();
            $table->string('package', 255)->nullable();
            $table->integer('pieces')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['box', 'registry', 'site', 'package', 'pieces']);
        });
    }
}
