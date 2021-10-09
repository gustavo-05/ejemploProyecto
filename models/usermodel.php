<?php
    class UserModel extends Model implements IModel
    {
        //variables 
        private $id;
        private $username;
        private $password;
        private $role;
        private $budget;
        private $photo;
        private $name;

        public function __construct()
        {
            parent::__construct();
            $this->username = '';
            $this->password = '';
            $this->role = '';
            $this->budget = 0.0;
            $this->photo = '';
            $this->name = '';
        }

        //llamando al crud
        //funcion de guardar datos en la base de datos
        public function save()
        {
            try
            {
                $query = $this->prepare('INSERT INTO users(username, password, role, budget, photo, name) VALUES(:username, :password, :role, :budget, :photo, :name)');
                $query->execute
                ([
                    'username'      => $this->username,
                    'password'      => $this->password,
                    'role'          => $this->role,
                    'budget'        => $this->budget,
                    'photo'         => $this->photo,
                    'name'          => $this->name
                ]);
                return true;
            }
            catch(PDOException $e) //para capturar si existe algun error y luego poder mostrarlo
            {
                error_log('USERMODEL::save->PDOException ' . $e);
                return false;
            }
        }
        //para obtener los elementos de la consulta, es un arreglo para objetos
        public function getAll()
        {
            try
            {
                $query = $this->query('SELECT * FROM users');

                while($p )
            }
            catch(PDOException $e)
            {
                error_log('USERMODEL::getAll->PDOException ' . $e);
            }
        }
        public function get($id)
        {

        }
        public function delete($id)
        {

        }
        public function update()
        {

        }
        public function from($array)
        {

        }

        //accediendo a las variables privadas mediante una función
        public function setId($id)
        {
            $this->id = $id;
        }
        public function setRole($role)
        {
            $this->role = $role;
        }
        public function setBudget($budget)
        {
            $this->budget = $budget;
        }
        public function setPhoto($photo)
        {
            $this->photo = $photo;
        }
        public function setName($name)
        {
            $this->name = $name;
        }

        //para obtener el valor
        public function getId()
        {
            return $this->id;
        }
        public function getUsername()
        {
            return $this->username;
        }
        public function getPasswotd()
        {
            return $this->password;
        }
        public function getRole()
        {
            return $this->role;
        }
        public function getBudget()
        {
            return $this->budget;
        }
        public function getPhoto()
        {
            return $this->photo;
        }
        public function getName()
        {
            return $this->name;
        }

    }
?>