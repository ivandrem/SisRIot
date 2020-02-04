<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEditableToRolesTable extends Migration
{
    public function up()
    {
        if(Schema::hasTable('roles'))
        {
            Schema::table('roles', function(Blueprint $table){
                $table->boolean('editable')->nullable()->default(true);
            });
        }
    }

    public function down()
    {
        if(Schema::hasTable('roles'))
        {
            Schema::table('roles', function(Blueprint $table){
                $table->dropColumn('editable');
            });
        }
    }
}
