<?php

require "./lib/JSONReader.php";
require "./lib/UsersSearchFunctions.php";
require "./class/User.php";
require "./class/UserList.php";

$userList = JSONReader('./dataset/users-management-system.json');

$UserListDisplay = [];

foreach ($userList as $user) {
    $user["lastName"]=sanitizeName(ucfirst($user["lastName"]));
    $UserObj=new User($user["id"], $user["firstName"], $user["lastName"], $user["email"],$user["birthday"]);
    $UserListDisplay[]=$UserObj;
}

if(isset($_GET['nome'])){
    $searchTextName=trim($_GET['nome']);
    $UserListDisplay = array_filter($UserListDisplay, findByFirstName($searchTextName));
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
                    <input class="form-control" name="id" id="id" type="text"><br />
                </th>

                <th>
                    <input class="form-control" name="nome" id="nome" type="text"><br />  
                </th>

                <th>
                    <input class="form-control" name="cognome" id="cognome" type="text"><br />
                </th>

                <th>
                    <input class="form-control" name="email" id="email" type="text"><br />
                </th>

                <th>
                    <input class="form-control" name="eta" id="eta" type="text"><br />
                </th>
                <th>
                    <button class="btn btn-primary" type="submit">cerca</button>
                </th>
            </tr>
            
                <?php
                    foreach ($UserListDisplay as $user) {
        ?>
            <tr>
                <td><?=$user->id?></td>
                <td><?=$user->firstName?></td>
                <td><?=$user->lastName?></td>
                <td><?=$user->email?></td>
                <td><?=$user->age ?> 
                <?=($user->age>18)?" Maggiorenne":" Minorenne"?></td>
            </tr>

            <?php }
        ?>
            
        </table>
        </form>
    </div>
</body>

</html>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>