<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->get("users");
$code = $response->getStatusCode();
$body = $response->getBody();
$x = json_decode($body);

$users = $x->users;


?>

<!DOCTYPE html>
    <head>
        <title>Users</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
        <div class= "container">
            <table class = "table table-stripped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Complete Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Blood Type</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $info){ ?>
                    <tr>
                        <td><?=$info->id;?></td>
                        <td><?=$info->firstName . ' '.  $info->lastName;?></td>
                        <td><?=$info->age;?></td>
                        <td><?=$info->gender;?></td>
                        <td><?=$info->email;?></td>
                        <td><?=$info->phone;?></td>
                        <td><?=$info->bloodGroup;?></td>
                        <td><?="<img width=150x; height=150x; src=" . $info->image .">";?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>