<?php 
    class DBSQLiteUser{
        private $databaseObj;
        
        public function __construct(string $dbName)
        {
            $this->databaseObj = new PDO("sqlite:" . $dbName);
            $this->databaseObj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function dbRawInsertQuery(string $sql){
            $returnStr = "FAIL";
            try{
                $this->databaseObj->exec($sql);
                $returnStr = "SUCCESS";
            }
            catch(PDOException $sqlE){
                consoleLog($sqlE->getMessage());
            }
            catch(Exception $e){
                consoleLog($e->getMessage());
            }
            return $returnStr;
        }

        public function dbRawFetchQuery(string $sql){
            $returnData = "FAIL";
            try{
                $query = $this->databaseObj->query($sql);
                $returnData = $query->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(PDOException $sqlE){
                consoleLog($sqlE->getMessage());
            }
            catch(Exception $e){
                consoleLog($e->getMessage());
            }
            return $returnData;
        }
    }

    //$db = new DBSQLiteUser("Data/Database.db");

    // ----- GET ----- //

    function rawQuery(&$database ,string $sql){
        consoleLog($database->dbRawFetchQuery($sql));
    }

    function getUserData(&$database, string $username, string $password){
        $sql = " SELECT * FROM Users WHERE Username = '$username' AND Password = '$password';";
        $retrievedData = $database->dbRawFetchQuery($sql);
        return $retrievedData;
    }

    function getBlogPosts(&$database){
        $sql = "SELECT * FROM Blogposts;";
        $retrievedData = $database->dbRawFetchQuery($sql);
        return $retrievedData;
    }

    // ----- Data Processing ----- //

    // Returns a result flag | 1 / 2 = success | -1 = invalid username | -2 = Invalid password | 0 = query failure
    function validateUser(&$database, string $username, string $password){
        $returnVal = 0;
        $dataArr = array(0,"","","","");
        $data = getUserData($database, $username, $password);
        if($data != null){
            $dataArr = $data[0];
            $user = $dataArr['Username'];
            $userRole = $dataArr['UserRole'];
            $pass = $dataArr['Password'];
            if($username == $user){
                if($password == $pass){
                    if($userRole == "ADMIN"){
                        $returnVal = 2;
                    }
                    else{
                        $returnVal = 1;
                    }
                }
                else{ // Wrong Password
                    $returnVal = -2;
                }
            }
            else{ // Wrong Username
                $returnVal = -1;
            }
        }
        return $returnVal;
    }

    function newUser(&$database, string $username, string $email, string $password, string $userRole){
        $returnVal = FALSE;
        $sql = "INSERT INTO Users VALUES (NULL,'$userRole', '$username', '$email', '$password');";
        $msg = $database->dbRawInsertQuery($sql); 
        if($msg == "SUCCESS"){
            $returnVal = TRUE;
        }
        return $returnVal;
    }

    function getBlogPostsArr(&$database){
        $dataArr = [];
        $data = getBlogPosts($database);
        consoleLog(count($data));
        for($i = 0; $i < count($data); $i++){
            $taken = $data[$i];
            $blogID = $taken['BlogID'];
            $poster = $taken['PosterName'];
            $title = $taken['BlogTitle'];
            $content = $taken['BlogContent'];
            array_push($dataArr, [$blogID, $poster, $title, $content]);
        }
        return $dataArr;
    }
?>