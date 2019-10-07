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
        static function getObject($id)
        {
            $row = Customer::getRow($id);
            if($row)
            {
                $object =  new Test($row[1], $row[3], $row[2],$row[4], $row[5]);
                //$object->$id = $id;
                $object->id = $id;
                //echo("ID IS $object->id");
                return $object;
            }
            else
            {
                return null;
            }
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
        function __construct($testName, $testCategory, $testDescription, $textMaxMins, $testMaxQuestions)
        {
            $this->testName = $testName;
            $this->testCategory = $testCategory;
            $this->testDescription = $testDescription;
            $this->testMaxMins  = $textMaxMins;
            $this->testMaxQuestions = $testMaxQuestions;
        }
        function save()
        {
            global $conn;
            
            try
            {
                $query = "INSERT INTO tests (test_name, test_description, test_category, test_max_mins, test_max_questions) VALUES ( :testName, :testDescription, :testCategory, :testMaxMins, :testMaxQuestions)";
                $statement = $conn->prepare($query);
                $statement->bindValue("testName",$this->testName);
                $statement->bindValue("testDescription",$this->testDescription);
                $statement->bindValue("testCategory",$this->testCategory->id);
                $statement->bindValue("testMaxMins",$this->testMaxMins);
                $statement->bindValue("testMaxQuestions",$this->testMaxQuestions);

                //echo("ADDED");
                $statement->execute();
                $this->id = $conn->lastInsertId();
                echo($this->id);
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
        static function getObject($id)
        {
            $row = Test::getRow($id);
            if($row)
            {
                $object =  new Test($row[1], $row[3], $row[2],$row[4], $row[5]);
                //$object->$id = $id;
                $object->id = $id;
                //echo("ID IS $object->id");
                return $object;
            }
            else
            {
                return null;
            }
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
            global $conn;
            try
            {
            $query = "DELETE FROM tests WHERE test_id = :id";
            $statement = $conn->prepare($query);
            $statement->bindValue("id",$this->id);
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

    class Question
    {
        function __construct($testID, $question)
        {
            $this->testID = $testID;
            $this->question = $question;

        }
        static function getObject($id)
        {
            $row = Question::getRow($id);
            if($row)
            {
                $object =  new Question($row[2], $row[1]);
                //$object->$id = $id;
                $object->id = $id;
                //echo("ID IS $object->id");
                return $object;
            }
            else
            {
                return null;
            }
        }
        static function allRows()
        {

            global $conn;
            $query = "SELECT * FROM questions";
            $statement = $conn->prepare($query);
            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $result = $statement->fetchAll();
            $statement->closeCursor();
            return $result;
        }
        static function getRow($id)
        {
            global $conn;
            $query = "SELECT * FROM questions WHERE question_id = :id";
            $statement = $conn->prepare($query);
            $statement->bindValue("id",$id);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
           
            return $result;    
        }
        function save()
        {
            global $conn;
            
            try
            {
                $query = "INSERT INTO questions (test_id, question) VALUES ( :testID, :question)";
                $statement = $conn->prepare($query);
                $statement->bindValue(":testID",$this->testID);
                $statement->bindValue("question",$this->question);


                
                $statement->execute();
                $this->id = $conn->lastInsertId();
                echo("ADDED");
                echo($this->id);
                $statement->closeCursor();
                return true;

            }
            catch(Exception $e){
                echo($e->getMessage());
                return false;
            }
        }
        function delete()
        {
            global $conn;
            try
            {
                echo("DELETING");

                $query = "DELETE FROM questions WHERE question_id = :question_id";
            
            $statement = $conn->prepare($query);
            $statement->bindValue("question_id",$this->id);
            var_dump($statement->execute());
            $statement->closeCursor();
            return true;
        }
        catch(Exception $e)
        {
          return false;
        }
        }
        static function questionsForTest($test_id)
        {

            global $conn;
            $query = "SELECT * FROM questions WHERE test_id = :test_id";
            $statement = $conn->prepare($query);
            $statement->bindValue("test_id",$test_id);
            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $result = $statement->fetchAll();
            $statement->closeCursor();
            return $result;
        
        }
    }

    class Answer
    {
        function __construct($answer, $question, $isTrue)
        {
            $this->answer = $answer;
            $this->question = $question;
            $this->isTrue = $isTrue;

        }
        static function getObject($id)
        {
            $row = Answer::getRow($id);
            if($row)
            {
                $object =  new Answer($row[2], $row[1]);
                //$object->$id = $id;
                $object->id = $id;
                //echo("ID IS $object->id");
                return $object;
            }
            else
            {
                return null;
            }
        }
        static function allRows()
        {

            global $conn;
            $query = "SELECT * FROM questions";
            $statement = $conn->prepare($query);
            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $result = $statement->fetchAll();
            $statement->closeCursor();
            return $result;
        }
        

        static function answersForQuestion($question_id)
        {

            global $conn;
            $query = "SELECT * FROM answers WHERE question_id = :id";
            $statement = $conn->prepare($query);
     
            $statement->bindValue("id",$question_id);
            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $result = $statement->fetchAll();
            $statement->closeCursor();
            return $result;
        }
        static function getRow($id)
        {
            global $conn;
            $query = "SELECT * FROM questions WHERE question_id = :id";
            $statement = $conn->prepare($query);
            $statement->bindValue("id",$id);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
           
            return $result;    
        }
        function save()
        {
            global $conn;
            
            try
            {
                $query = "INSERT INTO answers (answer, question_id, answer_true) VALUES ( :answer, :questionID, :isTrue)";
                $statement = $conn->prepare($query);
                $statement->bindValue("answer",$this->answer);
                $statement->bindValue("questionID",$this->question->id);
                $statement->bindValue("isTrue",$this->isTrue);


                //echo("ADDED");
                $statement->execute();
                $this->id = $conn->lastInsertId();
                echo($this->id);
                $statement->closeCursor();
                return true;

            }
            catch(Exception $e){
                echo($e->getMessage());
                return false;
            }
        }
        function delete()
        {
            try
            {
            $query = "DELETE FROM answers WHERE answer_id = :id";
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