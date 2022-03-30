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
//delete cart items
    public function deleteCart($item_id=null,$table='cart'){
        if ($item_id!=null){
            $result = $this->db->con->query(query: "DELETE FROM {$table} WHERE item_id={$item_id}");
            if ($result){
                header("Location:".$_SERVER['PHP_SELF']);
                return$result;
            }
        }
    }

//get item_id of all cart items
public function getCartId($cartArr=null,$key='item_id'){
    if ($cartArr!=null){
        $cart_id = array_map(function ($value) use ($key){
            return $value[$key];
        },$cartArr);
        return $cart_id;
    }
}

//save for later
public function saveForLater($item_id = null,$saveTable = 'cart1',$fromTable='cart'){
    if ($item_id!=null){
        $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
        $query.= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

//execute multiquery
        $result = $this->db->con->multi_query($query);
        if ($result){
            header("Location:".$_SERVER['PHP_SELF']);
        }
        return $result;
    }
}
}