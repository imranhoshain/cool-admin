<?php
namespace App\helpers;
use PDO;
use PDOException;
/**
* Database connection class
*/
class Connection{
	protected $con;	
	private $user = 'root';
	private $password = '';
	public function __construct(){
		try{
			$this->con = new PDO('mysql:host=localhost;dbname=banking',$this->user,$this->password);
		}
		catch (PDOException $e){
			print "ERROR!: " . $e->getMessage() . "<br \>";
			die();
		}
	}
}
?>