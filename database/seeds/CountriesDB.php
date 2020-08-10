<?php

use Illuminate\Database\Seeder;

class CountriesDB extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
	DB::table('countries')->delete();
	$countries = array(
        array('id' => 1,'code' => '','name' => "Bhutan",'phonecode' => 975),
        array('id' => 2,'code' => '','name' => "Ethiopia",'phonecode' => 251),
        array('id' => 3,'code' => '','name' => "Ghana",'phonecode' => 233),
        array('id' => 4,'code' => '','name' => "Nepal",'phonecode' => 977),
		array('id' => 5,'code' => '','name' => "Nigeria",'phonecode' => 234),
        array('id' => 6,'code' => '','name' => "Kenya",'phonecode' => 254),
        array('id' => 7,'code' => '','name' => "Pakistan",'phonecode' => 92),
        array('id' => 8,'code' => '','name' => "Philippines",'phonecode' => 63),
        array('id' => 9,'code' => '','name' => "Sri Lanka",'phonecode' => 94),
        array('id' => 10,'code' => '','name' => "Uganda",'phonecode' => 256),
        array('id' => 11,'code' => '','name' => "India",'phonecode' => 91),
		);
		DB::table('countries')->insert($countries);
	}
}
