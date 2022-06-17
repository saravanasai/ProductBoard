<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_product_id')->comment('activation request for product');
            $table->foreign('request_product_id')->references('product_id')->on('products');
            $table->string('request_domine')->unique()->default(null)->nullable()->comment('request domine name');
            $table->ipAddress('request_ip')->default(null)->nullable()->comment('request ip Address');
            $table->string('request_username')->default(null)->nullable()->comment('from User');
            $table->string('request_email')->comment('from User');
            $table->boolean('request_is_processed')->default(0)->comment('0 means false 1 means true');
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
        Schema::dropIfExists('key_requests');
    }
}
