<?php

$conn = mysqli_connect("localhost", "visheshs_frmsbmsn", "OFAtm{J[NcYk", "visheshs_frmsbmsn");

if(!$conn){
    echo "unable to connect";
}
$requtime=Date('h:i:s A', strtotime(' + 5 hours 30 minutes')).'<br>'.Date('j M, Y', strtotime(' + 5 hours 30 minutes'));
$servtype=$_POST[servtype];



// webdev form
if($servtype=='web'){
    $name1=$_POST[name1];
    $email1=$_POST[email1];
    $reqs1=$_POST[reqs1];
    $typeofsite=$_POST[typeofsite];
    $sql1 = mysqli_query($conn, "INSERT INTO form (name, email, reqs, typeofsite, datetime, type ) VALUES ('{$name1}','{$email1}','{$reqs1}','{$typeofsite}','{$requtime}','{$servtype}') ");
    
$tomail = "luckyvishesh675@gmail.com";
$subject = "New Submission on form ~ Get in Touch";
$message = '
<!DOCTYPE html>
<html lang="en">
<body>
Name: '.$name1.'<br> Email: '.$email1.'<br> Requirements: '.$reqs1.'<br>Type of Site: '.$typeofsite.'<br>'.'<br>Date / Time: '.$requtime.'
</body>
</html>';
$headers = "Content-type: text/html;"."From: admin@visheshsingh.com" . "\r\n" .
   "Reply-To: admin@visheshsingh.com" . "\r\n";
   if(mail($tomail, $subject, $message, $headers)){
       $action="done";
       $sql3 = mysqli_query($conn, "UPDATE form SET action='{$action}' WHERE datetime='{$requtime}'  ");
   }else{
   $action="nope";
       $sql4 = mysqli_query($conn, "INSERT INTO form (action) VALUES ('{$action}') WHERE datetime='{$requtime}'  ");   
    }
}

