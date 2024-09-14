<?php 
    include './Library/ConsoleWriter.php';
    class DBSQLiteUser{
        private $databaseObj;
        
        public function __construct(string $dbName)
        {
            $this->databaseObj = new PDO("sqlite:" . $dbName);
            $this->databaseObj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function dbRawInsertQuery(string $sql){
            $returnStr = "";
            try{
                $this->databaseObj->exec($sql);
                $returnStr = "Successfully executed sql";
            }
            catch(PDOException $sqlE){
                $returnStr = $sqlE->getMessage();
            }
            catch(Exception $e){
                $returnStr = $e->getMessage();
            }
            return $returnStr;
        }

        public function dbRawFetchQuery(string $sql){
            $query = $this->databaseObj->query($sql);
            $returnData = "";
            try{
                $returnData = $query->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(PDOException $sqlE){
                $returnData = $sqlE->getMessage();
            }
            catch(Exception $e){
                $returnData = $e->getMessage();
            }
            return $returnData;
        }
    }

    $db = new DBSQLiteUser("DB/Database.db");
?>