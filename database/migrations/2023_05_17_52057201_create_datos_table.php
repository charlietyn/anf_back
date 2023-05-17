<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 */
class CreateDatosTable extends Migration
{

/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!\Doctrine\DBAL\Types\Type::hasType('char')) {
            \Doctrine\DBAL\Types\Type::addType('char', \Doctrine\DBAL\Types\StringType::class);
        }
        /*Generating tables and columns*/
        $connection =Schema::connection('db');
        $exist_table=$connection->hasTable("datos");
        if(!$exist_table){
            Schema::create("datos",function (Blueprint $table) {
                $table->engine = "InnoDB";
                $table->integer('id',true);
                $table->string('nombre',20);
                $table->string('apellidos',20);
                $table->integer('edad');
                $table->string('sexo',20);
                $table->integer('correo');
            });
        }else{
            Schema::table("datos",function (Blueprint $table) {

				/*Validating pk */
                $sm=Schema::connection("db")->getConnection()->getDoctrineSchemaManager();
                $foundpk = true;

				$indexesfound = $sm->listTableIndexes('datos');
                $find = array_filter($indexesfound, function ($element) {
                    return $element->getName() === 'id';
                });
                if (count($find) == 0) {
                    $foundpk = false;
                }                
                if(Schema::hasColumn("datos",'id')){
                   $table->integer('id',true)->change();
                }
               else{
                   $table->integer('id',true);
                }                
                if(Schema::hasColumn("datos",'nombre')){
                   $table->string('nombre',20)->change();
                }
               else{
                   $table->string('nombre',20);
                }                
                if(Schema::hasColumn("datos",'apellidos')){
                   $table->string('apellidos',20)->change();
                }
               else{
                   $table->string('apellidos',20);
                }                
                if(Schema::hasColumn("datos",'edad')){
                   $table->integer('edad')->change();
                }
               else{
                   $table->integer('edad');
                }                
                if(Schema::hasColumn("datos",'sexo')){
                   $table->string('sexo',20)->change();
                }
               else{
                   $table->string('sexo',20);
                }                
                if(Schema::hasColumn("datos",'correo')){
                   $table->integer('correo')->change();
                }
               else{
                   $table->integer('correo');
                }            
			});

		  }
            Schema::table("datos",function (Blueprint $table) {

				/*Adding indexes */

				$sm=Schema::connection("db")->getConnection()->getDoctrineSchemaManager();

				$indexesfound = $sm->listTableIndexes('datos');
                foreach ($indexesfound as $el) {
                    if ($el->isUnique() && !$el->isPrimary())
                        $table->dropUnique($el->getName());
                }
                $find = array_filter($indexesfound, function ($element) {
                    return $element->getName() === 'correo';
                });
				if (count($find)==0)
					$table->unique('correo', 'correo');
                $find = array_filter($indexesfound, function ($element) {
                    return $element->getName() === 'id';
                });
				if (count($find)==0)
					$table->primary('id', 'id');


            });

    }

   public function down()
    {
        Schema::dropIfExists('datos');


        return false;
    }
}
