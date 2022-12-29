<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Leave;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $leaves = [
            'Sick Leave',
            'Casual',
            'Public Holiday',
            'Religious Holiday',
            'Maternity Leave',
            'Paternity Leave',
            'Bereavement Leave',
            'Compensatory Leave',
            'Sabatical Leave',
            'Unpaid Leave',
        ];
        foreach($leaves as $leave){
            Leave::firstOrCreate(['name'=>$leave]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
