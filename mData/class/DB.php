<?php
	
	class DB {
		public static $dbInstance;
		public $con;
		private $_query;
		public $results;

		public function __construct() {
			//sql connection to database
			if($this->con = mysqli_connect('localhost', 'root', '')){
				//CREATE DATABASE
				$dbName = 'advent';
				$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
				if(!$this->query($sql)){
					die('COULD NOT CREATE DATABASE'. mysqli_error());
				}else{
					//SELECT THE DATABASE TO WORK WITH
					$this->select_db($dbName);
				}
			}else{
				die('FAILED TO CONNECT TO SERVER'. mysqli_error());
			}
		}

		public function select_db($sql){
			if(mysqli_select_db($this->con,$sql)){
				return true;
			}
		}

		public function lastId($sql){
			$this->results = mysql_insert_id($this->con,$sql);
			return $this->results;
		}

		public static function DBInstance() {
			if (!isset(self::$dbInstance)){
				self::$dbInstance = new DB();
			}
			return self::$dbInstance;
		}

		public function query($sql){
			if($this->_query = mysqli_query($this->con, $sql)) {
				return $this;
			}else{
				return false;
			}
		}

		public function getResults(){
			$this->results = mysqli_fetch_assoc($this->_query);
			return $this->results;
		}

		public function ifExist() {
			$this->results = mysqli_num_rows($this->_query);
			return $this->results;
		}
	}
?>