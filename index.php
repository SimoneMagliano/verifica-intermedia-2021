<?php

require "./lib/JSONReader.php";
require "./lib/UsersSearchFunctions.php";
require "./class/User.php";
require "./class/UserList.php";

$userList = JSONReader('./dataset/users-management-system.json');
$userListObject = new UserList();

for ($i=0; $i < count($userList); $i++) { 
   $userList[$i]["lastName"]=sanitizeName(ucfirst($userList[$i]["lastName"]));
    //ucfirst(trim(filter_var($userList[$i]["lastName"], FILTER_SANITIZE_STRING)));
    $userListObject->add(new User($userList[$i]["id"], $userList[$i]["firstName"], $userList[$i]["lastName"], $userList[$i]["email"],$userList[$i]["birthday"] ));
    
}

function findByFirstName($firstName) {
    array_search ( $firstName, $userListObject, false );
}


function findByLastName($lastName) {
    array_search ( $lastName, $userListObject, false );

}
function findByAge($age) {
    array_search ( $age, $userListObject, false );

}



if ((isset($_GET['status']))) {
    $status = $_GET['status'];
    $userList = array_filter($userList, searchStatus($status));
}

if(isset($_GET['status'])==''){
    $_GET['status']='all';
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        input.form-control {
            padding: 2px;
            line-height: 100%;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <header class="container-fluid bg-secondary text-light p-2">
        <div class="container">
            <h1 class="display-3 mb-0">
                User management system
            </h1>
            <h2 class="display-6">user list</h2>
        </div>
    </header>
    <div class="container">
        <form action="/action_page.php" method="get">
        <table class="table">
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>cognome</th>
                <th>email</th>
                <th cellspan="2">età</th>
            </tr>
            <tr>
                <th>
                    <input class="form-control" type="text">
                </th>

                <th>
                    <input class="form-control" type="text">
                </th>

                <th>
                    <input class="form-control" type="text">
                </th>

                <th>
                    <input class="form-control" type="text">
                </th>

                <th>
                    <input class="form-control" type="text">
                </th>
                <th>
                    <button class="btn btn-primary">cerca</button>
                </th>
            </tr>
            
                <?php
                
foreach ($userListObject->all() as $user) {
?>
<tr>
                <td><?=$user->id?></td>
                <td><?=$user->firstName?></td>
                <td><?=$user->lastName?></td>
                <td><?=$user->email?></td>
                <td><?=$user->age?> </td>
            </tr>

            <?php } ?>
            
        </table>
        </form>
    </div>
</body>

</html>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>