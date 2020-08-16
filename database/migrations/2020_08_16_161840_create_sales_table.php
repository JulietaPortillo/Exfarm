<?php

use App\Models\Sale;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('code_id');
            $table->string('weight');
            $table->decimal('sale_price');
            $table->integer('age');
            $table->date('sale_date');
            $table->string('status')->default(Sale::ACTIVE);
            $table->timestamps();

            $table->foreignId('purchase_id')->constrained('purchases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
