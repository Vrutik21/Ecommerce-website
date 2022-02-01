<?php

//using dependency injection
class Cart
{
public $db = null;

public function __construct(DBController $db){
    if (!isset($db->con))return null;
    $this->db=$db;
}
//insert into cart table
public function insertIntoCart($param = null,$table='cart'){
        if ($this->db->con!=null){
            if ($param!=null){
//                get table columns
                $columns = implode(',',array_keys($param));

                $values = implode(',',array_values($param));


//                create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)",$table,$columns,$values);

//                execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }

}
//Get user_id and item_id & insert into cart table
public function addToCart($userid,$itemid){
    if (isset($userid)&&isset($itemid)){
        $arr = array("user_id"=>$userid,
            "item_id"=>$itemid);

//        insert data into cart
        $result = $this->insertIntoCart($arr);
        if ($result){
//            reload page and get errors if any on the same page
            header("Location:".$_SERVER['PHP_SELF']);
        }
    }
}

//calculate subtotal
public function getSum($add){
    if (is_array($add)){
        $sum=0;
        foreach ($add as $item){
            $sum += floatval($item[0]);
        }
        return sprintf('%.2f',$sum);
    }
}
}