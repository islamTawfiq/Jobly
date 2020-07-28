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
        array('id' => 25,'code' => 'BT','name' => "Bhutan",'phonecode' => 975),
        array('id' => 69,'code' => 'ET','name' => "Ethiopia",'phonecode' => 251),
        array('id' => 83,'code' => 'GH','name' => "Ghana",'phonecode' => 233),
        array('id' => 31,'code' => 'IO','name' => "British Indian Ocean Territory",'phonecode' => 246),
		array('id' => 160,'code' => 'NG','name' => "Nigeria",'phonecode' => 234),
        array('id' => 113,'code' => 'KE','name' => "Kenya",'phonecode' => 254),
        array('id' => 166,'code' => 'PK','name' => "Pakistan",'phonecode' => 92),
        array('id' => 173,'code' => 'PH','name' => "Philippines",'phonecode' => 63),
        array('id' => 206,'code' => 'LK','name' => "Sri Lanka",'phonecode' => 94),
        array('id' => 227,'code' => 'UG','name' => "Uganda",'phonecode' => 256),
        array('id' => 178,'code' => 'QA','name' => "Qatar",'phonecode' => 974),
		);
		DB::table('countries')->insert($countries);
	}
}
