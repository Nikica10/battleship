<?php


class Game
{
	
	public function newGame() {
		$ship = "0 0 0 0 0 0 0 0 0 0\n";

		

		$myFile = fopen('battleship_db.txt', 'w+');

		$bytes = 0;

		for ($i=0; $i < 10; $i++) {

			if($i === 9){
				$ship = "0 0 0 0 0 0 0 0 0 0";
			}
			$bytes = $bytes + fwrite($myFile, $ship);


		}

		$this->placeShip();
	

		if ( $bytes > 0 ){
			return true;
		}
	}

	public function placeShip() {
		$direction = array(
				0 => 'vodoravno',
				1 => 'okomito'
			);
		$d = rand(0,1);

		$sea = $this->getSea();

		if ($direction[ $d ] === 'vodoravno') {
			//postavi brod vodoravno
			
			$x = rand(0,4);
			$y = rand(0,9);
			//$key je $x, $k je $y
			$shipEnd = $x + 5;  
			//var_dump($shipEnd); die();
			foreach ($sea as $key => $row) {
				
	 			foreach ($row as $k => $column) {

	 				if ($key == $y) {
	 					if ($k >= $x && $k <= $shipEnd) {
	 						$sea[$key][$k] = 'X';
	 						}
	 					}

	 				
	 			}
	 		}

	 				

	 		
	 		//Zapiši modificirani array Sea u bazu
	 		$this->saveSea($sea);

		}
		elseif($direction[ $d ] === 'okomito'){
			//postavi brod okomito
			
			$x = rand(0,9);
			$y = rand(0,4);
			//$key je $x, $k je $y
			$shipEnd = $y + 5;  

			//$this->placeShipInsideArray()
			foreach ($sea as $key => $row) {
	 			foreach ($row as $k => $column) {

	 				if ($k == $x) {
	 					if ($key >= $y && $key <= $shipEnd) {
	 						$sea[$key][$k] = 'X';
	 					}
	 					
	 				}


	 			}
	 		}
	 		//Zapiši modificirani array Sea u bazu
	 		$this->saveSea($sea);

			
		}


	}//end of placeship

	public function saveSea($sea){
			$myFile = fopen('battleship_db.txt', 'w+');

			foreach ($sea as $key => $line) {
				$l = implode(' ', $line);
				fwrite($myFile, $l);

			}

	}

	public function getSea() {
		$sea = array();

		$file = fopen('battleship_db.txt', 'r');

		

		while (!feof($file)) {

			$line = fgets($file);

			$sea[] = explode(' ', $line);  // probat stavit limit 10 na explode
		}

		return $sea;
	}

	public function shoot() {

			$num = 0;

			foreach ($_POST['ship'] as $value) {
				
				 if ($value === 'X') {
				 	$num++;
				 }
				
			}

			echo 'Your score is ' . $num;
	}


		


}
