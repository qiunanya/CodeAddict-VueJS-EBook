<?php
session_start();

class CustomerManager{
    
    private $customers = null;
    const SESSION_NAME = 'Customers';
    
    public function __construct(){    
        $this->init();
    }
    //----------------------------------------
    public function __destruct(){
        $_SESSION[CustomerManager::SESSION_NAME] = $this->customers;
    }
    //----------------------------------------
    
    private function init(){
        if(isset($_SESSION[CustomerManager::SESSION_NAME])){
            $this->customers = $_SESSION[CustomerManager::SESSION_NAME];
        }else{
            $this->customers = array();
            
            $this->addNewCustomer('เรืองศักดิ์', 'ลอยชูศักดิ์');
            $this->addNewCustomer('สมชาย', 'เข็มกลัด');
            $this->addNewCustomer('ศรราม', 'เทพพิทักษ์');
            $this->addNewCustomer('Loius', 'Scot');
        }        
    }
    //----------------------------------------
//    public function refreshCustomer(){
//        $this->customers = $_SESSION[CustomerManager::SESSION_NAME];
//    }
    //----------------------------------------
//    public function saveCustomer(){
//        $_SESSION[CustomerManager::SESSION_NAME] = $this->customers;
//    }
    //----------------------------------------
    public function getAll($forJSON=false){
        
//        $this->refreshCustomer();
        
        if($forJSON){
            return json_encode($this->customers, JSON_UNESCAPED_UNICODE);
        }else{
            return $this->customers;    
        }
    }
    //----------------------------------------
    //public function addNewCustomer($firstname, $lastname, $updateImmediately=false){
    public function addNewCustomer($firstname, $lastname){
        $newCustomer = array(
            'firstname'     => $firstname,
            'lastname'     => $lastname
        );
        
//        if(!is_array($this->customers)) $this->init();
        
        array_push($this->customers, $newCustomer);
        
//        $this->customers[] = $newCustomer;
        
//        if($updateImmediately){
//            $this->saveCustomer();            
//        }
        //var_dump($this->customers);
    }
    //----------------------------------------
    public function clearCustomer(){
        $this->customers = array();
        
        $this->addNewCustomer('เรืองศักดิ์', 'ลอยชูศักดิ์');
        $this->addNewCustomer('สมชาย', 'เข็มกลัด');
        $this->addNewCustomer('ศรราม', 'เทพพิทักษ์');
        $this->addNewCustomer('Loius', 'Scot');
    }
    //----------------------------------------
}

$Customer = new CustomerManager();

?>