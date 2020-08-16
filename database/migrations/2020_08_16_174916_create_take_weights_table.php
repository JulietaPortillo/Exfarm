<?php

use App\Models\TakeWeight;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakeWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('take_weights', function (Blueprint $table) {
            $table->id();
            $table->string('code_id');
            $table->string('weight');
            $table->date('registration_date');
            $table->string('status')->default(TakeWeight::ACTIVE);
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
        Schema::dropIfExists('take_weights');
    }
}
