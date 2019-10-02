<?php
    $servername = "localhost";
    $username = "root";
    
    $password = "";
    $conn = null;
    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=certme", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e)
    {
        header("Location: .?action=404&message=nodb");
    }
    
    class Customer
    {
       
        public function __construct($firstname , $lastname, $email, $password)
        {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->password = $password;

        }
        static function getRow($id)
        {
            global $conn;
            $query = "SELECT * FROM customer WHERE customer_id = :id";
            $statement = $conn->prepare($query);
            $statement->bindValue("id",$id);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;    
        }
        function delete()
        {
            try
            {
            $query = "DELETE FROM customer_test WHERE id = :id";
            $statement = $conn->prepare($query);
            $statement->bindValues("id",$this->id);
            $statement->execute();

            $statement->closeCursor();
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
        }
        static function allRows()
        {

            global $conn;
            $query = "SELECT * FROM customers";
            $statement = $conn->prepare($query);
            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $result = $statement->fetchAll();
            $statement->closeCursor();
            return $result;
        }
        static function login($email, $password)
        {
            global $conn;
            $query = "SELECT * FROM customer WHERE email = :email AND password = :password";
            $statement = $conn->prepare($query);
            $statement->bindValue("email",$email);
            $statement->bindValue("password",$password);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            if(!$result)
            {
                return false;
            }
            else
            {
                return true;
            }
            //return $result;    
        }
        public function save()
        {
            global $conn;
            
            try
            {
                $query = "INSERT INTO CUSTOMER (first_name, last_name, email, password ) VALUES (:firstName, :lastName, :email, :password)";
                $statement = $conn->prepare($query);
                $statement->bindValue("firstName",$this->firstname);
                $statement->bindValue("lastName",$this->lastname);
                $statement->bindValue("email",$this->email);
                $statement->bindValue("password",$this->password);
                $statement->execute();
                $this->id = $conn->lastInsertId();

                $statement->closeCursor();
                return true;

            }
            catch(Exception $e){
                return false;
            }
            
        }
    }
    class TestCategory
    {
       
        function __construct($categoryName)
        {
            $this->categoryName = $categoryName;
            $this->id = 0;
        }
        function save()
        {
            global $conn;
            
            try
            {
                $query = "INSERT INTO test_category (category_name) VALUES ( :categoryName)";
                $statement = $conn->prepare($query);
                $statement->bindValue("categoryName",$this->categoryName);
                //echo("ADDED");
                $statement->execute();
                $this->id = $conn->lastInsertId();
                
                $statement->closeCursor();
                return true;

            }
            catch(Exception $e){
                //echo($e->getMessage());
                return false;
            }
        }
        static function getRow($id)
        {
            global $conn;
            $query = "SELECT * FROM test_category WHERE category_id = :id";
            $statement = $conn->prepare($query);
            $statement->bindValue("id",$id);
            $statement->execute();
            $result = $statement->fetch();
           
            $statement->closeCursor();
            return $result;    
        }

        static function allRows()
        {

            global $conn;
            $query = "SELECT * FROM test_category;";
            $statement = $conn->prepare($query);
            $statement->execute();
            //$statement->setFetchMode(PDO::FETCH_ASSOC);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            //print_r($result);
            $statement->closeCursor();
            return $result;
        }
        static function getObject($id)
        {
            $row = TestCategory::getRow($id);
            if($row)
            {
                $object =  new TestCategory($row[1]);
                //$object->$id = $id;
                $object->id = $id;
                echo("ID IS $object->id");
                return $object;
            }
            else
            {
                return null;
            }
        }
        function delete()
        {
            global $conn;
            try
            {
            $query = "DELETE  FROM test_category WHERE category_id = $this->id";
            echo($query);
            /*$statement = $conn->prepare($query);
            $statement->bindValue("id",$this->id);
            echo($statement->execute());
            var_dump($statement);
            
            $statement->execute();
            $statement->closeCursor();*/
            var_dump($conn->exec($query));
            
            return true;
        }
        catch(Exception $e)
        {
            echo($e->getMessage());
            return false;
        }
        }


    }
    class Test
    {
        function __construct($testName, $testCategory, $testDescription, $textMaxMins)
        {
            $this->testName = $testName;
            $this->testCategory = $testCategory;
            $this->testDescription = $testDescription;
            $this->testMaxMins  = $textMaxMins;
        }
        function save()
        {
            global $conn;
            
            try
            {
                $query = "INSERT INTO tests (test_name, test_description, test_category, test_max_mins) VALUES ( :testName, :testDescription, :testCategory, :testMaxMins)";
                $statement = $conn->prepare($query);
                $statement->bindValue("testName",$this->testName);
                $statement->bindValue("testDescription",$this->testDescription);
                $statement->bindValue("testCategory",$this->textCategory->id);
                $statement->bindValue("testMaxMins",$this->testMaxMins);
                //echo("ADDED");
                $statement->execute();
                $this->id = $conn->lastInsertId();
                $statement->closeCursor();
                return true;

            }
            catch(Exception $e){
                //echo($e->getMessage());
                return false;
            }
        }
        static function getRow($id)
        {
            global $conn;
            $query = "SELECT * FROM tests WHERE test_id = :id";
            $statement = $conn->prepare($query);
            $statement->bindValue("id",$id);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
           
            return $result;    
        }
        static function allRows()
        {

            global $conn;
            $query = "SELECT * FROM tests";
            $statement = $conn->prepare($query);
            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $result = $statement->fetchAll();
            $statement->closeCursor();
            return $result;
        }

        function delete()
        {
            try
            {
            $query = "DELETE FROM tests WHERE id = :id";
            $statement = $conn->prepare($query);
            $statement->bindValues("id",$this->id);
            $statement->execute();

            $statement->closeCursor();
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
        }
        
    }





   
?>