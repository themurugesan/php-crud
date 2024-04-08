<?php
include 'db.php';

function showAllData()
{ 
    global $connection;
    $query = "SELECT * FROM users";

   
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die ('Query failed');
    }
    while ($row = mysqli_fetch_assoc($result)) {


        $id = ($row['id']);

        echo "<option value='$id'>$id</option>";


    }
}

function update()
{
    global $connection;
    $username=mysqli_real_escape_string($connection, $_POST['username']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);
    $id=$_POST['id'];

    $query="UPDATE users SET username='$username', password='$password' WHERE id='$id' ";

    $result=mysqli_query($connection,$query);
}

function create(){
    global $connection;

    $username=mysqli_real_escape_string($connection, $_POST['username']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);
    $password=crypt($password,'$6$rounds=1000000$NJy4rIPjpOaU$0ACEYGg/aKCY3v8O8AfyiO7CTfZQ8/W231Qfh2tRLmfdvFD6XfHk12u6hMr9cYIA4hnpjLNSTRtUwYr9km9Ij/');
    // echo $username1 . '  '. $password1;

    
    $query="INSERT INTO users(username,password) values('$username','$password') ";
    
    
    $result= mysqli_query($connection,$query);

    if(!$result){
        die('Query failed');
    }
}
function read(){
    global $connection;
    $query="SELECT * FROM users";
    
    
    $result= mysqli_query($connection,$query);

    if(!$result){
        die('Query failed');
    }
    return $result;
}
?>