<?php

use Illuminate\Database\Seeder;

class ImportCountriesDB extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
	DB::table('importing_countries')->delete();
	$countries = array(
        array('id' => 1,'code' => '','name' => "Qatar",'phonecode' => 974),
        array('id' => 2,'code' => '','name' => "Bahrrian",'phonecode' => 973),
        array('id' => 3,'code' => '','name' => "Saudi Arabia",'phonecode' => 966),
        array('id' => 4,'code' => '','name' => "United Arab Emirates",'phonecode' => 971),
        array('id' => 5,'code' => '','name' => "Oman",'phonecode' => 968),
        array('id' => 6,'code' => '','name' => "Libya",'phonecode' => 218),
        array('id' => 7,'code' => '','name' => "Lebanon",'phonecode' => 961),
        array('id' => 8,'code' => '','name' => "Kuwait",'phonecode' => 965),
        array('id' => 9,'code' => '','name' => "Jordan",'phonecode' => 962),
        array('id' => 10,'code' => '','name' => "Israel + Palestine",'phonecode' => 972),
        array('id' => 11,'code' => '','name' => "Iraq + Palestine",'phonecode' => 964),
        array('id' => 12,'code' => '','name' => "Egypt",'phonecode' => 20),

		);
		DB::table('importing_countries')->insert($countries);
	}
}
