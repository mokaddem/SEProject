<?php
include '../cible.php';

class cibleTest extends PHPUnit_Framework_TestCase{
	// CE TEST NE MMARCHE PAS !! J'AI LAISSé LA STRUCTURE,
    // IL FAUDRA CHANGER LA FONCTION testCible... -Mitsuko
	
    public function testCible(){
	  // Create new Car and pass in a name
	  $car = // appel fonction de cible.php
	  
      // Get the car name
	  $result = $car->name();
	  
      // Assert that the name has been set correctly
	  $this->assertEquals("Murcielago", $result);
	}

}



?>