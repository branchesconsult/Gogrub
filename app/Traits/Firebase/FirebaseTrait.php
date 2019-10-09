<?php

namespace App\Traits\Firebase;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;



/**
 * Firebase connection and Return Database.
 */
trait FirebaseTrait
{
    public function getDatabase()
    {
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/databasekey.json');
        
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();
      
        $database = $firebase->getDatabase();
      
       return $database;
    }
}