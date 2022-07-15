<?php 
namespace App\Models;
use PDO;
class BaseModel 
{ 
	protected static function getConnect(){
        $conn = new PDO('mysql:host=127.0.0.1;dbname=php2_asm1;charset=utf8', 'root', '');
        return $conn;
    } 
	public function insert($arr){
		$this->queryBuilder = "insert into $this->tableName ";
		$cols = " (";
		$vals = " (";
		foreach ($arr as $key => $value) {
			$cols .= " $key,";
			$vals .= " :$key,";
		}
		$cols = rtrim($cols, ',');
		$vals = rtrim($vals, ',');
		$cols .= ") ";
		$vals .= ") ";
		$this->queryBuilder .= $cols . ' values ' . $vals;
		$stmt = $this->getConnect()
					->prepare($this->queryBuilder);
		foreach ($arr as $key => &$value) {
			$stmt->bindParam(":$key", $value);
		}
		// var_dump($this->queryBuilder);die;
		$stmt->execute();
	}
	public function update($arr){
		$this->queryBuilder = "update $this->tableName set ";
		
		foreach ($arr as $key => $value) {
			$this->queryBuilder .= " $key = :$key,";
		}
		$this->queryBuilder = rtrim($this->queryBuilder, ',');
		$this->queryBuilder .= " where id = :id";
		$stmt = $this->getConnect()
					->prepare($this->queryBuilder);
		foreach ($arr as $key => &$value) {
			$stmt->bindParam(":$key", $value);
		}
		$stmt->bindParam(":id", $this->id);
		$stmt->execute();
	}
	public static function rawQuery($sqlQuery){
		$model = new static();
		$model->queryBuilder = $sqlQuery;
		return $model;
	} 
	public function orderBy($col, $asc = true){
		$this->queryBuilder .= " order by $col";
		$this->queryBuilder .= $asc == true ? " asc " : " desc ";
		return $this;
	} 
	public static function sttOrderBy($col, $asc = true){
		$model =  new static();
		$model->queryBuilder = "select * from $model->tableName order by $col";
		$model->queryBuilder .= $asc == true ? " asc " : " desc ";
		
		return $model;
	} 
	public function limit($take, $skip = false){
		$this->queryBuilder .= " limit $take";
		if($skip != false){
			$this->queryBuilder .= ", $skip";
		}

		return $this;
	} 
	public function execute(){
		$stmt = $this->getConnect()->prepare($this->queryBuilder);
		return $stmt->execute();
	}
	public static function all(){
		$model = new static();
        $query = "select * from $model->tableName";
        $stmt = $model->getConnect()->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
 	} 
	 // select 1 bảng 
 	public static function where($arr){
 		$model = new static();
 		$model->queryBuilder = "SELECT * from $model->tableName where $arr[0] $arr[1] '$arr[2]' ";
 		return $model;
 	}  
	 public static function daoTron($arr){
		$model = new static();
		$model->queryBuilder = "SELECT * from $model->tableName where $arr[0] $arr[1] '$arr[2]' ORDER BY RAND() LIMIT 5";
		return $model; 
	}
	// delete 
 	public static function destroy($id){
 		$model = new static();
 		$model->queryBuilder = "delete from $model->tableName
 								where id = $id"; 
		return $model->execute();
	} 
 	public function andWhere($arr){
 		$this->queryBuilder .= " and $arr[0] $arr[1] '$arr[2]'";
 		return $this;
 	}
 	public function orWhere($arr){
 		$this->queryBuilder .= " or $arr[0] $arr[1] '$arr[2]'";
 		return $this;
 	}
	
	// hàm trả về 1 obj
 	public function first(){

 		$stmt = $this->getConnect()->prepare($this->queryBuilder);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this));

		if(count($result) > 0){
			return $result[0];
		}else{
			return null;
		}
 	}

	// hàm trả về all obj 
 	public function get(){
 		$stmt = $this->getConnect()->prepare($this->queryBuilder);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this)); 
		return $result;
 	}   

	// thêm ảnh 
	
    // function save_file($fieldname, $target_dir){
	// 	$img_url = $_SERVER["DOCUMENT_ROOT"] . IMG_URL;
    //     $file_uploaded = $_FILES[$fieldname];
    //     $file_name = basename($file_uploaded["name"]);
    //     $target_path = $target_dir.$file_name;
    //     move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    //     return $file_name;
    // } 
	// đảo trộn câu hỏi
	public static function dao(){ 
		$model = new static();
		$query = "SELECT * FROM $model->tableName ORDER BY RAND() LIMIT 10";
		$stmt = $model->getConnect()->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model)); 
    }
	
	// function show_chiTiet(){
    //     $sql = "SELECT name, name, name 
    //     FROM ((student_quiz_detail
    //     INNER JOIN users ON student_quiz_detail.student_quiz_id = users.id)
    //     INNER JOIN questions ON student_quiz_detail.queston_id = questions.id)";
    //     return pdo_query($sql);
    // }
} 
?>