<?php
    class Login{

        private $db;
        private $query;
        private $sql;
        private $result;

        function __construct($db){
            $this->db = $db;
        }

       public function getUser($name, $password){
			$this->query = "SELECT * FROM user WHERE name = ? AND password = ?";
			$this->sql = $this->db->prepare($this->query);
			$this->sql->execute([$name, $password]);
			while ($this->result = $this->sql->fetch()) {
                return new User($this->result['fullname'], 
                $this->result['name'], 
                $this->result['email'], 
                $this->result['password'],
                $this->result['id']);
				
			}
			return null;
		}

        /*

			---------------------------------------------------------------------------------------
			Cette méthode permet d'enregistrer un nouveau utilisateur dans la DB
			---------------------------------------------------------------------------------------

	 	*/

		public function createUser($fullName, $name, $email, $password){
			$this->query = "INSERT INTO user(fullname, name, email, password) VALUES(?, ?, ?, ?)";
			$this->sql = $this->db->prepare($this->query);
			$this->sql->execute(array($fullName, $name, $email, $password));
		}

    }