<?php
ob_start();
session_start();
$msg = "";
$color = "red";
$error = 0;

if(isset($_POST['create_user']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $file = fopen("data/users.txt","r");
    
    $found = 0;
    while(!feof($file))
    {
        $row = fgetcsv($file,0,":");
        if(isset($row[0]))
        {
            if((trim($row[0]) == $username))
            {
                $found = 1;
            }
        }
    }

    fclose($file);


    if($found == 1)
    {
        $msg = "Username already exists";
    }
    else
    {
        $file = fopen("data/users.txt","a");
        $data = array(
            "username" => $username,
            "password" => $password);
        
        $msg = "User Added";
        $color = "green";
        fputcsv($file, $data, ":");
        fclose($file);

    }
}
?>