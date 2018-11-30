<?php  

namespace Ecom\Model;

use \Ecom\DB\Sql;
use \Ecom\Model;

class User extends Model{

	const SESSION = "User";

	public static function login($login, $password){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM users WHERE id = :LOGIN", array(
			":LOGIN"=>$login	

		));

		if (count($results) === 0){
			throw new \Exception("Usuario inexistente ou senha inválida 1.");
		
		}

		$data = $results[0];

		if ($password === $data["password"]){

			$user = new User();

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {
			throw new \Exception("Usuario inexistente ou senha inválida 2.");
		}

	}

	public static function verifyLogin($type = 2){

		//const typeadmin = 2;
		//const typeoper = 3;

		if (
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["id"] > 0
			||
			(int)$_SESSION[User::SESSION]["type"] !== $type
			//||
			//(bool)$_SESSION[User::SESSION]["type"] !== $type3
		) {

			header("Location: /admin/login");
			exit;

		}


	}

	public static function logout(){

		$_SESSION[User::SESSION] = NULL;

	}

	public static function listAll(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM users");
	}

	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_users_save(:name, :password, :email, :type)", array(
			":name"=>$this->getname(),
			":password"=>$this->getemail(),
			":email"=>$this->getpassword(),
			":type"=>$this->gettype()
		));

		$this->setData($results[0]);
	}

	public function get($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM users a WHERE a.id = :id", array(
			":id"=>$id
		));

		$this->setData($results[0]);

	}

	public function update(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_usersupdate_save(:id, :name, :password, :email, :type)", array(
			":id"=>$this->getid(),
			":name"=>$this->getname(),
			":password"=>$this->getemail(),
			":email"=>$this->getpassword(),
			":type"=>$this->gettype()
		));

		$this->setData($results[0]);

	}

	public function delete(){

		$sql = new Sql();

		$sql->query("CALL sp_users_delete(:id)", array(
			":id"=>$this->getid()
		));
	}



}
?>