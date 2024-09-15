<?php 
    include './Lib/LibraryFunctions.php';
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
                $returnStr = "Successfully executed sql";
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

    $db = new DBSQLiteUser("Data/Database.db");

    function getUserData(&$database, string $username, string $password){
        $sql = " SELECT * FROM Users WHERE Username = '$username' AND Password = '$password';";
        $retrievedData = $database->dbRawFetchQuery($sql);
        return $retrievedData;
    }

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

    function rawQuery(&$database ,string $sql){
        consoleLog($database->dbRawFetchQuery($sql));
    }
?>