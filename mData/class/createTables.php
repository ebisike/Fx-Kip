<?php
	
	class createTables extends DB{

		public function createT(){
			$sql = "CREATE TABLE `sexs`(
		  `id` int(255) NOT NULL AUTO_INCREMENT,
		  `lecturer_id` int(255) NOT NULL,
		  `session` varchar(9) NOT NULL,
		  `stuRegNo` varchar(11) NOT NULL,
		  `siwesScore` int(8) NOT NULL,
		  `projectScore` int(8) NOT NULL,
		  `time` date NOT NULL,
		  PRIMARY KEY (`id`)
		)";#ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;

		$stmt  = DB::DBInstance()->query($sql);
		var_dump($sql);
		}

	}
?>