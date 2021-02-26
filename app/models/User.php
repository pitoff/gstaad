<?php
	class User{
		private $db;

		public function __construct(){
			$this->db = new Database;
		}

		public function register($data){
			$this->db->query("INSERT INTO user (role, firstname, surname, email, password, country, state, image, gender, dob, occupation, status, mname, acc_num, pin, nok) VALUES (2, :firstname, :surname, :email, :password, :country, :state, :photo, :gender, :dob, :occupation, :status, :mname, :acc_num, :pin, :nok)");
			$this->db->bind(':firstname', $data['firstname']);
			$this->db->bind(':surname', $data['surname']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':password', $data['password']);
			$this->db->bind(':country', $data['country']);
			$this->db->bind(':state', $data['state']);
			$this->db->bind(':photo', $data['photo']);
			$this->db->bind(':gender', $data['gender']);
			$this->db->bind(':dob', $data['dob']);
			$this->db->bind(':occupation', $data['occupation']);
			$this->db->bind(':status', $data['status']);
			$this->db->bind(':mname', $data['mname']);
			$this->db->bind(':acc_num', $data['acc_num']);
			$this->db->bind(':pin', $data['pin']);
			$this->db->bind(':nok', $data['nok']);
			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		public function signup($data){
			$this->db->query("INSERT INTO user (role, firstname, surname, email, password) VALUES (2, :firstname, :surname, :email, :password)");
			$this->db->bind(':firstname', $data['firstname']);
			$this->db->bind(':surname', $data['surname']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':password', $data['password']);
			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		public function updateprofile($data){
			$this->db->query("UPDATE user SET firstname = :firstname, surname = :surname, email = :email, country = :country, state = :state, image = :photo, gender = :gender, dob = :dob, occupation = :occupation, status = :status, mname = :mname, acc_num = :acc_num, pin = :pin, nok = :nok WHERE id = :id");

			$this->db->bind(':id', $data['id']);
			$this->db->bind(':firstname', $data['firstname']);
			$this->db->bind(':surname', $data['surname']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':country', $data['country']);
			$this->db->bind(':state', $data['state']);
			$this->db->bind(':photo', $data['photo']);
			$this->db->bind(':gender', $data['gender']);
			$this->db->bind(':dob', $data['dob']);
			$this->db->bind(':occupation', $data['occupation']);
			$this->db->bind(':status', $data['status']);
			$this->db->bind(':mname', $data['mname']);
			$this->db->bind(':acc_num', $data['acc_num']);
			$this->db->bind(':pin', $data['pin']);
			$this->db->bind(':nok', $data['nok']);

			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		public function updateuser($data){
			$this->db->query("UPDATE user SET firstname = :firstname, surname = :surname, email = :email, country = :country, state = :state, image = :photo, gender = :gender, dob = :dob, occupation = :occupation, status = :status, mname = :mname, acc_num = :acc_num, pin = :pin, nok = :nok WHERE id = :id");

			$this->db->bind(':id', $data['id']);
			$this->db->bind(':firstname', $data['firstname']);
			$this->db->bind(':surname', $data['surname']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':country', $data['country']);
			$this->db->bind(':state', $data['state']);
			$this->db->bind(':photo', $data['photo']);
			$this->db->bind(':gender', $data['gender']);
			$this->db->bind(':dob', $data['dob']);
			$this->db->bind(':occupation', $data['occupation']);
			$this->db->bind(':status', $data['status']);
			$this->db->bind(':mname', $data['mname']);
			$this->db->bind(':acc_num', $data['acc_num']);
			$this->db->bind(':pin', $data['pin']);
			$this->db->bind(':nok', $data['nok']);

			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		public function deposit($data){
			$this->db->query("INSERT INTO deposit (user_id, transaction_id, sender, amount, current_bal, available_bal, dod) VALUES (:id, :transaction_id, :sender, :amount, :current_bal, :available_bal, :dod)");

			$this->db->bind(':id', $data['id']);
			$this->db->bind(':transaction_id', $data['tid']);
			$this->db->bind(':sender', $data['sender']);
			$this->db->bind(':amount', $data['amount']);
			$this->db->bind(':current_bal', $data['current_bal']);
			$this->db->bind(':available_bal', $data['avail_bal']);
			$this->db->bind(':dod', $data['dod']);

			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		public function alldeposit(){
			$this->db->query("SELECT *, deposit.id as depositId, user.id as userId FROM deposit INNER JOIN user ON deposit.user_id = user.id ORDER BY deposit.dod DESC");
			$result = $this->db->resultSet();
			return $result;
		}

		public function depositexist($id){
			$this->db->query("SELECT * FROM deposit WHERE user_id = :id");
			$this->db->bind(':id', $id);
			$row = $this->db->single();
			if ($this->db->rowCount() > 0) {
				return true;
			}else{
				return false;
			}
		}

		public function login($email, $password){
			$this->db->query("SELECT * FROM user WHERE email = :email");
			$this->db->bind(':email', $email);
			$row = $this->db->single();

			$hashed_password = $row->password;
			if (password_verify($password, $hashed_password)) {
				return $row;
			}else{
				return false;
			}
		}

		public function pin($email, $pin){
			$this->db->query("SELECT * FROM user WHERE email = :email");
			$this->db->bind(':email', $email);
			$row = $this->db->single();

			$hashed_pin = $row->pin;
			if (password_verify($pin, $hashed_pin)) {
				return $row;
			}else{
				return false;
			}	
		}

		public function findUserByEmail($email){
			$this->db->query("SELECT * FROM user WHERE email = :email");
			$this->db->bind(':email', $email);
			$row = $this->db->single();
			if ($this->db->rowCount() > 0) {
				return true;
			}else{
				return false;
			}

		}

		public function getUserById($id){
			$this->db->query("SELECT * FROM user WHERE id = :id");
			$this->db->bind(':id', $id);
			 $row = $this->db->single();
			 return $row;
		}

		public function transfer($data){
			$this->db->query("INSERT INTO transfer (user_id, transaction_id, acc_name, acc_num, bank, amount) VALUES (:user_id, :tid, :acc_name, :acc_num, :bank, :amount)");

			$this->db->bind(':user_id', $_SESSION['user_id']);
			$this->db->bind(':tid', $data['tid']);
			$this->db->bind(':acc_name', $data['acc_name']);
			$this->db->bind(':acc_num', $data['acc_num']);
			$this->db->bind(':bank', $data['bank']);
			$this->db->bind(':amount', $data['amount']);

			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		public function updateaccstatus($data){
			$this->db->query('UPDATE user SET acc_status = :status WHERE id = :id');

			$this->db->bind(':id', $data['id']);
			$this->db->bind(':status', $data['status']);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function viewdebit($id){
			$this->db->query("SELECT * FROM transfer WHERE user_id = :id ORDER BY id DESC LIMIT 1");
			$this->db->bind(':id', $id);
			$result = $this->db->resultSet();
			return $result;
		}

		public function updatedeposit($data){
			$this->db->query("UPDATE deposit SET current_bal = current_bal - :amount, available_bal = available_bal - :amount WHERE user_id = :id");
			$this->db->bind(':id', $data['id']);
			$this->db->bind(':amount', $data['amount']);

			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		public function getavailablebal($id){
			$this->db->query("SELECT * FROM deposit WHERE user_id = :id");
			$this->db->bind(':id', $id);
			 $row = $this->db->single();
			 return $row;
		}

		public function gettoken($id){
			$this->db->query("SELECT * FROM token WHERE user_id = :id ORDER BY id DESC LIMIT 1");
			$this->db->bind(':id', $id);
			 $row = $this->db->single();
			 return $row;
		}


		// public function status(){
		// 	$this->db->query("SELECT *, user.id as userId, token.id as tokenId FROM user INNER JOIN token ON user.id = token.user_id");
		// 	$result = $this->db->resultSet();
		// 	return $result;
		// }

		public function token($data){
			$this->db->query("INSERT INTO token (user_id, token, expiry) VALUES (:user_id, :token, :expiry)");
			$this->db->bind(':user_id', $data['user_id']);
			$this->db->bind(':token', $data['token']);
			$this->db->bind(':expiry', $data['expiry']);
			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		// public function gettoken($token){
		// 	$this->db->query("SELECT * FROM token WHERE token = :token");
		// 	$this->db->bind(':token', $token);
		// 	 $row = $this->db->single();
		// 	 return $row;
		// }

		public function allUsers(){
			$this->db->query("SELECT * FROM user");
			$result = $this->db->resultSet();
			return $result;
		}

		public function deleteuser($id){
			$this->db->query('DELETE FROM user WHERE id = :id');
			$this->db->bind(':id', $id);
			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function clearaccount($id){
			$this->db->query('DELETE FROM deposit WHERE user_id = :id');
			$this->db->bind(':id', $id);
			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function updatepass($data){
			$this->db->query("UPDATE user SET password = :new_password WHERE id = :id");

			$this->db->bind(':id', $data['id']);
			$this->db->bind(':new_password', $data['new_password']);

			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}		
	}