<?php
ob_start();
session_start();
$msg = "";
$color = "red";
$error = 0;
if(isset($_POST['book']))
{
    $pid = $_POST['pid'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $booking_reason = $_POST['booking_reason'];
    if($pid == "" || $date == "" || $time == "" || $booking_reason == "") // Check any field is empty
    {
        $error = 1;
        $msg = "Please provide all required fields";
    }

    if($error == 0)
    {
        if($date < date("Y-m-d")) /// check if date is a past date
        {
            $error = 1;
            $msg = "Date cannot be of past";
        }
    }

    if($error == 0)
    {
        if(isValidID($pid))
        {
            $data = array(
                "pid" => $pid,
                "date" => $date,
                "time" => implode(" ; ",$time),
                "booking_reason" => $booking_reason,
                "date_time" => date("Y-m-d H:i:s"));

            $file = fopen("data/appointments.txt","a");
            
            fputcsv($file, $data);
            
            fclose($file);

            $msg = "Booking Confirm! We will get back to you soon with a set time";
            $color = "green";
        }
        else
        {
            $error = 1;
            $msg = "Please enter a valid patient ID";
        }
    }
    
}

if(isset($_POST['login']))
{
    $login_success = 0;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $file = fopen("data/users.txt","r");
    while(!feof($file))
    {
        $row = fgetcsv($file,0,":");
        if(isset($row[0]))
        {
            if((trim($row[0]) == $username) and (trim($row[1]) == $password))
            {
                $_SESSION['username'] = $username;
                $login_success = 1;
                break;
            }
            else
            {
                $msg = "Username or Password is wrong! Please try again";
            }
        }
        else
        {
            $msg = "Username or Password is wrong! Please try again";
        }
    }
    
    fclose($file);
    if($login_success == 0)
    {
        $data = array(
            "username" => $username,
            "date_time" => date("Y-m-d H:i:s"));
        
        $file = fopen("data/accessattempts.txt","a");
            fputcsv($file, $data, ":");
        fclose($file);
    }
}

function isValidID($pid)
{
    if(is_numeric($pid[0]) || is_numeric($pid[1])) // Checking whether first two letters of the id are valid letters or NOT
    {
        return false;
    }

    $number = substr($pid,2,-1);
    if(!is_numeric($number))  // check if number?
    {
        return false;
    }

    //Calculating the sum of the number 
    $sum = 0;
    $number = str_split($number); // convert in array
    foreach($number as $num) 
    {
        $sum += $num;
    }

    //Finding the required last letter according to our algorithm
    $chk = round($sum%26,0);

    $requiredLastLetter = "";

    if($chk == 0) 
    {
        $requiredLastLetter = 'Z';
    }
    else 
    {
        $requiredLastLetter = strtoupper(chr(97 + $chk - 1));
    }

    if ($requiredLastLetter == substr($pid, -1)) 
    {
        return true;
    }

}
