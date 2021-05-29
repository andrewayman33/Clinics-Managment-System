<?php 

include_once '../../../Database/singletone.php';

  abstract class Analysis {
    public $price;
    public function get_pricemainpackage($ID){
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();
        $sql="SELECT * FROM `main_analysis_packages` WHERE ID=$ID";
        


      $result =  $conn->query($sql);
      if ($result->num_rows > 0) 
      {
           while($row = $result->fetch_assoc()) 
           {
              $this->price=$row["package_cost"];
              
           }
      }
      return $this->price;
    } 
     public function get_priceadditives($IDT){
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();
        $sql="SELECT * FROM `additional_analysis` WHERE ID=$IDT";

      $result =  $conn->query($sql);
      if ($result->num_rows > 0) 
      {
           while($row = $result->fetch_assoc()) 
           {
              $this->price=$row["cost"];
           }
      }
      return $this->price;
    } 

     public  $desc="";
        public function getDescription()
        {
            return $desc;
        }
        abstract public function cost();


}
abstract class Analysis_Decorator extends Analysis {

     //abstract public function getDescription();

}

class package1 extends Analysis{
    //public $price;

    public  $desc="";
        public function __construct()
        {
            $this->desc = "package1"; 
            $price =$this-> get_pricemainpackage(1);

        }
        
        public function cost()
        {
            return $this->price;
        }


}
class package2 extends Analysis{

    public  $desc="";
        public function __construct()
        {
            $this->desc = "package2"; 
            $price =$this-> get_pricemainpackage(2);
        }
        
        public function cost()
        {
            return $this->price;

        }


}
class type1 extends Analysis_Decorator{
    public $analysisobj;
   // public $price;
    public function __construct($aobj)
        {
            $this->analysisobj = $aobj; 
            $this->price =$this-> get_priceadditives(1);
        }
    public function cost()
        {
            return $this->price + $this->analysisobj->cost();
        }

}
class type2 extends Analysis_Decorator{
    public $analysisobj;
    //public $price;
    public function __construct($aobj)
        {
            $this->analysisobj = $aobj; 
            $this->price =$this-> get_priceadditives(2);

        }
    public function cost()
        {
            return $this->price + $this->analysisobj->cost();
        }

}

/*
class ayhaga extends Analysis{
     public function cost(){
        echo "string";
     }


}

//$obj = new package1();
//$obj = new type1($obj);
//$x=$obj->cost();
//echo $x;



/*
class Analysis1 {
	private $ID;
	private $package_name;
	private $package_cost;
	

function setpackageid($ID) {
    $this->ID = $ID;
}
function setpackagename($package_name) {
    $this->package_name = $package_name;
}
function setpackagecost($package_cost) {
    $this->package_cost = $package_cost;
}


//////////////////

function getpackageid($ID) {
   return $this->ID;
}
function getpackagename($package_name) {
    return $this->package_name;
}
function getpackagecost($package_cost) {
    return $this->package_cost;
}

function connectToDB() {
    global $link;
    $this->database = $link;
}
}
*/