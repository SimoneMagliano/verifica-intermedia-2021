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

?>