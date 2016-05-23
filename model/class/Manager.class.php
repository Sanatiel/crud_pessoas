<?php




class Manager extends Connection{


	public function select($table,$fields,$filters,$extra=""){

		$pdo = parent::getCon();

		try{

			$sql = "SELECT ";

			if($fields != null){
				$sql .= implode(",", $fields);

			} else{
				$sql .= "* ";
			}

			$sql .= "FROM $table ";


			if($filters != null){
				$sql .= "WHERE ";

				foreach ($filters as $key => $value) {
					$sql .= "$key=:$key AND ";
				}

				$sql = substr($sql, 0, -4);

			}


			$sql .= $extra;

			$stmt = $pdo->prepare($sql);

			if($filters != null){
				
				foreach ($filters as $key => $value) {
					$filters[$key] = filter_var($value);
				}


				foreach ($filters as $key => $value) {
					$stmt->bindValue(":$key",$value,PDO::PARAM_STR);
				}
			}

			$stmt->execute();

			$data;

			if($stmt->rowCount()){
				while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
					$data[] = $result;
				}

				return $data;
			} else{

				return false;
			}	


		} catch(Exception $e){
			$e->getMessage();
		}

		parent::closeCon();

	} //fim select



	////////////////////
	//é igual o anterior, a unica diferenca é q eh usado o LIKE 
	public function select_like($table,$fields,$filters,$extra=""){

		$pdo = parent::getCon();

		try{

			$sql = "SELECT ";

			if($fields != null){
				$sql .= implode(",", $fields);

			} else{
				$sql .= "* ";
			}

			$sql .= "FROM $table ";


			if($filters != null){
				$sql .= "WHERE ";
				
				//UNICA DIFERENCA AQUI
				foreach ($filters as $key => $value) {
					$sql .= "$key LIKE :$key AND ";
				}

				$sql = substr($sql, 0, -4);

			}


			$sql .= $extra;

			$stmt = $pdo->prepare($sql);

			if($filters != null){
				
				foreach ($filters as $key => $value) {
					$filters[$key] = filter_var($value);
				}


				foreach ($filters as $key => $value) {
					$stmt->bindValue(":$key",$value,PDO::PARAM_STR);
				}
			}

			$stmt->execute();

			$data;

			if($stmt->rowCount()){
				while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
					$data[] = $result;
				}

				return $data;
			} else{

				return false;
			}	


		} catch(Exception $e){
			$e->getMessage();
		}

		parent::closeCon();

	} //fim select


///////////////////////



	public function insert($table,$data){

		$pdo = parent::getCon();

		try{

			$fields = implode(",", array_keys($data));

			$values = ":".implode(",:", array_keys($data));

			$sql = "INSERT INTO $table ($fields) VALUES($values)";

			$stmt = $pdo->prepare($sql);

			foreach ($data as $key => $value) {
				$value = filter_var($value);
				$stmt->bindValue(":$key", $value, PDO::PARAM_STR);
			}


			if($stmt->execute()){

				return $pdo->lastInsertId();

			} else{

				return false;
			}


		} catch(Exception $e){
			$e->getMessage();

		}

		parent::closeCon();

	} //fim insert



	public function delete($table,$filters,$extra=""){

		$pdo = parent::getCon();

		try{

			foreach ($filters as $key => $value) {
				$filters_del = "$key=:$key AND ";
			}

			$filters_del = substr($filters_del, 0, -4);

			$sql = "DELETE FROM $table WHERE $filters_del";

			$sql .= $extra;

			$stmt = $pdo->prepare($sql);

			foreach ($filters as $key => $value) {
			 	$stmt->bindValue(":$key",$value,PDO::PARAM_STR);
			 } 

			 if($stmt->execute()){
			 	return true;

			 } else{
				return false;
			 
			 }

		} catch(Exception $e){
			$e->getMessage();
		}

		parent::closeCon();

	} //fim delete



	public function update($table,$data,$filters,$extra=""){

		$pdo = parent::getCon();

		try{

			$new_values = "";
			$filters_up = "";


			foreach ($data as $key => $value) {
				$new_values .= "$key=:$key, ";
			}

			$new_values = substr($new_values, 0, -2);

			foreach ($filters as $key => $value) {
				$filters_up .= "$key=:$key AND ";
			}

			$filters_up = substr($filters_up, 0, -4);

			$sql = "UPDATE $table SET $new_values WHERE $filters_up";

			$sql .= $extra;

			$stmt = $pdo->prepare($sql);

			foreach ($data as $key => $value) {
				$data[$key] = filter_var($value);

				$stmt->bindValue(":$key",$value, PDO::PARAM_STR);
			}


			foreach ($filters as $key => $value) {
				$stmt->bindValue(":$key",$value, PDO::PARAM_STR);

			}


			if($stmt->execute()){
				return true;
				
			} else{
				return false;
			}


		} catch(Exception $e){
			$e->getMessage();
		}

		parent::closeCon();

	} //fim update



} //fim class








?>