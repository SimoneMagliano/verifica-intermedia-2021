<?php

function searchText($lastNameSanitized) {
    return function ($task) use ($lastNameSanitized){
        
        $lastNameSanitized = ucfirst($lastNameSanitized);
        if($searchText === ''){
            return true;
        } else {
            return strpos($task['taskName'],$searchText)!==FALSE;
        }
    };  
}

function searchStatus(string $status) : callable {
    return function ($task) use ($status) {
        if(($status === '') || ($status === 'all')){
            return true;
        } else {
            if($task['status'] === $status){
                return true;
            } else {
                return false;
            }
        }
    };
} 
function sanitizeName($name) {

    
    $endSpace = preg_replace('/[^a-zA-Z]+$/','',$name);
    $tinyName = preg_replace('/[^a-zA-Z ]+/','',$endSpace);
    $onespaceName = preg_replace('/[ ]+/',' ',$tinyName);
    $notags = trim($onespaceName, "<h1>");


    $explodeName = explode(" ",$notags);
    $correctNames = array_map('correctCase', $explodeName);
    
    
    

    return implode(" ", $correctNames);
    

   
}


function correctCase($name){
    $nameLowercase = strtolower($name);
    $uppercaseName = ucfirst($nameLowercase);


    return $uppercaseName;

}

function searchByInput($term, $List, $field) {
    $term = mysql_real_escape_string($_REQUEST['term']);    

    $sql = "SELECT * FROM $List WHERE $field LIKE '%".$term."%'";
    $r_query = mysql_query($sql);

    $result = mysql_fetch_object($r_query, "User", null);
    return $result;
    
} 

function findByFirstName($search){

    return function($taskItem) use ($search){
        $sanitizedSearchName = strtolower($search);
        $sanitizedItemName = strtolower($taskItem['firstName']);

        if ($sanitizedItemName === $sanitizedSearchName) {
            return true;
        }else{
            return false;
        }
    };
}


function findByLastName($search){

    return function($taskItem) use ($search){
        $sanitizedSearchLastn = strtolower($search);
        $sanitizedItemLastn = strtolower($taskItem['lastName']);

        if ($sanitizedItemLastn === $sanitizedSearchLastn) {
            return true;
        }else{
            return false;
        }
    };
}

?>