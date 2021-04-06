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

?>