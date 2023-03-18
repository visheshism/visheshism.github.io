<?php

$conn = mysqli_connect("localhost", "visheshs_frmsbmsn", "OFAtm{J[NcYk", "visheshs_frmsbmsn");

if(!$conn){
    echo "unable to connect";
}
$requtime=Date('h:i:s A', strtotime(' + 5 hours 30 minutes')).'<br>'.Date('j M, Y', strtotime(' + 5 hours 30 minutes'));
$servtype=$_POST[servtype];


// others form
if($servtype=='others'){
    $email2=$_POST[email2];
    $reqs2=$_POST[reqs2];
    $otherserv=$_POST[otherserv];
    $sql2 = mysqli_query($conn, "INSERT INTO form (email, reqs, otherserv, datetime, type ) VALUES ('{$email2}','{$reqs2}','{$otherserv}','{$requtime}','{$servtype}') ");
    
    
    
$tomail = "luckyvishesh675@gmail.com";
$subject = "New Submission on form ~ Get in Touch";
$message = '
<!DOCTYPE html>
<html lang="en">
<body>
<br> Email: '.$email2.'<br> Requirements: '.$reqs2.'<br>Type of Service: '.$otherserv.'<br>'.'<br>Date / Time: '.$requtime.'
</body>
</html>';
$headers = "Content-type: text/html;"."From: admin@visheshsingh.com" . "\r\n" .
   "Reply-To: admin@visheshsingh.com" . "\r\n";
   if(mail($tomail, $subject, $message, $headers)){
       $action="done";
       $sql3 = mysqli_query($conn, "UPDATE form SET action='{$action}' WHERE datetime='{$requtime}'  ");
   }else{
   $action="nope";
       $sql4 = mysqli_query($conn, "UPDATE form SET action='{$action}' WHERE datetime='{$requtime}'  ");   }
}



