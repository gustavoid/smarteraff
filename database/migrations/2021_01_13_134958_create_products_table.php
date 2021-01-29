<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idWebsite');
            $table->string('title',512)->nullable();
            $table->string('imageLink')->nullable();
            $table->float('comission')->nullable();
            $table->float('maxPrice')->nullable();
            $table->text('about')->nullable();
            $table->float('evaluation')->nullable();
            $table->string('format')->nullable();
            $table->string('language')->nullable();
            $table->string('accessMethod')->nullable();
            $table->string('link')->nullable();
            $table->string('cookie_duration')->nullable();
            $table->string('cookie_type')->nullable();
            $table->string('checkout')->nullable();
            $table->string('pageProduct')->nullable();
            $table->string('subject')->nullable();
            $table->float('percentage')->nullable();
            $table->dateTime('creation_date')->nullable();
            $table->boolean('favorites')->default(false);
            $table->string('type')->nullable();
            $table->string('status_aprovacao')->nullable();
            $table->boolean('uniqueName')->default(false);
            $table->boolean('midiaPatrocinada')->default(false);
            $table->boolean('ativeAds')->default(false);
            $table->boolean('recurring')->default(false);
            $table->integer('recorrente')->default(0.0);
            $table->boolean('lancamento')->default(false);
            $table->dateTime('startDate')->nullable();
            $table->dateTime('endDate')->nullable();
            $table->boolean('trial')->default(false);
            $table->boolean('upsell')->default(false);
            $table->boolean('affiliateToolsPage')->default(false);
            $table->boolean('mobileTrafic')->default(false);
            $table->string('emailProdutor')->nullable();
            $table->string('nomeProdutor')->nullable();
            $table->string('telProdutor')->nullable();
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
        Schema::dropIfExists('products');
    }
}
