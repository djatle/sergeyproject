<?php

Class Database {
	
private $host = DB_HOST;
private $user = DB_USER;
private $pass = DB_PASS;
private $dbname = DB_NAME;
private $port = DB_PORT;
private $stmt;	
private $dbh;
private $error;	

	
	public function __construct(){
		
		$dsn = 'mysql:host=' . $this->host . ';port= '. $this->port.';dbname=' . $this->dbname ;        //установка типа подключаемой базы данных
                 		
		$options = array(
          PDO::ATTR_PERSISTENT => false, 
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );                          //фиг знает, что здесь присходит
				
		
	
	    try {
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		    }
		
        catch (PDOException $e) {
               $this->error = $e->getMessage();                                  //вроде как проиписаны методы обработки исключений
            }	
			
	}
	
	public function query($query){
          $this->stmt = $this->dbh->prepare($query);                          //метод для обработки ключевого слова query
	        }
    		
    public function bind($param, $value, $type = null){
    if (is_null($type)) {
        switch (true) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
    }
    $this->stmt->bindValue($param, $value, $type);
}

    public function execute(){
        return $this->stmt->execute();                                               // Всё это счастье
                             }   
							 
	public function resultset(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);            
                               }	

    public function single(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);                                  // подготавливает
                            }	

    public function rowCount(){
    return $this->stmt->rowCount();
                              }	

    public function lastInsertId(){
    return $this->dbh->lastInsertId();
                                  }
								                                                 // набор основных методов
	public function beginTransaction(){
    return $this->dbh->beginTransaction();
                                      }		

    public function endTransaction(){
    return $this->dbh->commit();
                                    }		

    public function cancelTransaction(){
    return $this->dbh->rollBack();
                                       }	

    public function debugDumpParams(){
    return $this->stmt->debugDumpParams();                                       // для работы с базой данных
                                     }									   
							  
							 
 
 
}
 
            
			
			
	
	