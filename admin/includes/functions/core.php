<?php
function remove_email_injection($field = FALSE) {
  return (str_ireplace(array("\r", "\n", "%0a", "%0d", "Content-Type:", "bcc:","to:","cc:"), '', $field));
}


function array_sanitize(&$item){
    $item = mysql_real_escape_string($item);   
}

function enter_products($product_data){
        array_walk($product_data,'array_sanitize');
        $fields = '`'.implode('`, `', array_keys($product_data)).'`';
        $data = '\''.implode('\', \'', $product_data).'\'';
        $sql = "INSERT INTO `products` ($fields) VALUES($data)";
        echo $sql;
        die();
        $result = mysql_query($sql);
        return (int)$result;
}


