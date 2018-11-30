<?php  

namespace Ecom\Model;

use \Ecom\DB\Sql;
use \Ecom\Model;

class Produto extends Model{

	public static function listAll(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM produtos");
	}


	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_products_save(:id, :nome, :preco, :imagem, :created_at)", array(
			":id"=>$this->getid(),
			":nome"=>$this->getnome(),
			":preco"=>$this->getnome(),
			":imagem"=>$this->getimagem(),
			":created_at"=>$this->getcreated_at()
		));

		$this->setData($results[0]);

	}

	public function get($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM produtos WHERE id = :id", [
			':id'=>$id
		]);
	}

	public function delete(){

		$sql = new Sql();

		$sql->query("DELETE FROM produtos WHERE id = :id", [
			':id'=>$this->getid()
		]);
	}

	public function checkPhoto(){
		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "site" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "produtos" . DIRECTORY_SEPARATOR . $this->getid() . ".jpg"
			)){

			$imagem = "/res/site/img/produtos/" . $this->getid() . ".jpg";

		} else {

			$imagem = "/res/site/img/product.jpg";
		}

		return $this->setimagem($imagem);

	}

	public function getValues(){

		$this->checkPhoto();

		$values = parent::getValues();

		return $values;
	}

	public function setPhoto($file){

		$extension = explode ('.', $file['name']);
		$extension = end($extension);

		switch ($extension){
			case "jpg":
			case "jpeg":
			$image = imagecreatefromjpeg($file["tmp_name"]);
			break;

			case "gif":
			$image = imagecreatefromgif($file["tmp_name"]);
			break;

			case "png":
			$image = imagecreatefrompng($file["tmp_name"]);
			break;

		}

		$dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "site" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "produtos" . DIRECTORY_SEPARATOR . $this->getid() . ".jpg";

		imagejpeg($image, $dist);

		imagedestroy($image);

		$this->checkPhoto();

	}




}
?>