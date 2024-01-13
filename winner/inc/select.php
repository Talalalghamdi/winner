<?php
$sql = 'SELECT * FROM users';
$result = mysqli_query($conn,$sql);
$users = mysqli_fetch_all($result,MYSQLI_ASSOC);
$sql2 = 'SELECT * FROM users ORDER BY RAND() LIMIT 1';
$result2 = mysqli_query($conn,$sql2);
$users_win = mysqli_fetch_all($result2,MYSQLI_ASSOC);
?>