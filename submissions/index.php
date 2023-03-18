<?php
$conn = mysqli_connect("localhost", "visheshs_frmsbmsn", "OFAtm{J[NcYk", "visheshs_frmsbmsn");

if(!$conn){
    echo "unable to connect";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Submissions</title>
    <link rel="icon" type="image/png" href="/assets/ico-dd3ad0b8.png" />
  <script src="https://kit.fontawesome.com/6bb6b675dd.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="bg-black text-white/70" style="display:none;">
    <div class="flex items-start justify-center my-4">
        <select name="datatype" id="datatype" class="bg-slate-400 text-black px-4 py-1.5 rounded font-rSlab focus:outline-none text-lg">
            <option value="both">All</option>
            <option value="web">Web Dev</option>
            <option value="others">Others</option>
        </select>
    </div>
<?php
function reti($input){
    if($input=="nope"){
echo "<i class='fas far fa-times-circle'>";
    }else if($input=="done"){
echo "<i class='fas far fa-circle-check'>";
    }
}
?>

<span id="both">
<?php
$sql = mysqli_query($conn, "SELECT * FROM form ORDER BY id DESC");


if (mysqli_num_rows($sql) > 0) {
?>
   <div class="flex items-start justify-center mt-4 font-jost tracking-wide">
    <table class="table-auto border-separate  border-spacing-2 ">
        <thead class="text-xl">
          <tr>
            <th class="border border-slate-600 px-2 py-1">Email</th>
            <th class="border border-slate-600 px-2 py-1">Date / Time</th>
            <th class="border border-slate-600 px-2 py-1">Type of Service</th>
            <th class="border border-slate-600 px-2 py-1">Requirements</th>
            <th class="border border-slate-600 px-2 py-1">Action</th>
          </tr>
        </thead>
        <tbody class="text-lg" id="tbody">
          
<?php
while($row = mysqli_fetch_assoc($sql)){
  
?>
<tr>
            <td class="border border-slate-700 px-2 py-1"><?php echo $row[email];?></td>
            <td class="border border-slate-700 px-2 py-1"><?php echo $row[datetime];?></td>
            <td class="border border-slate-700 px-2 py-1"><?php if($row[type]=="others"){
                echo ucwords(strtolower($row[otherserv]));
                
            }else if($row[type]=="web"){
                echo ucwords(strtolower($row[typeofsite])).' Site';
            
            }?></td>
            <td class="border border-slate-700 px-2 py-1"><?php echo $row[reqs];?></td> 
            <td class="px-2 py-1"><span class="flex flex-col items-center justify-center"><?php $int=$row[action];
            reti($int);?></i></span></td> 
</tr>

        <?php
}
?>

</tbody>
      </table>
    
</div> 
<?php    
}else{
   echo "<div class='font-poppins tracking-wide my-8 flex justify-center text-2xl'>
   No submissions found!
 </div>";
 } ?>
</span>

<span id="web">
<?php
$sql = mysqli_query($conn, "SELECT * FROM form WHERE type='web' ORDER BY id DESC");


if (mysqli_num_rows($sql) > 0) {
?>
   <div class="flex items-start justify-center mt-4 font-jost tracking-wide">
    <table class="table-auto border-separate  border-spacing-2 ">
        <thead class="text-xl">
          <tr>
            <th class="border border-slate-600 px-2 py-1">Name</th>
            <th class="border border-slate-600 px-2 py-1">Email</th>
            <th class="border border-slate-600 px-2 py-1">Date / Time</th>
            <th class="border border-slate-600 px-2 py-1">Type of Site</th>
            <th class="border border-slate-600 px-2 py-1">Requirements</th>
            <th class="border border-slate-600 px-2 py-1">Action</th>
          </tr>
        </thead>
        <tbody class="text-lg" id="tbody">
          
<?php
while($row = mysqli_fetch_assoc($sql)){
  
?>
<tr>
    <td class="border border-slate-700 px-2 py-1"><?php echo $row[name];?></td>
            <td class="border border-slate-700 px-2 py-1"><?php echo $row[email];?></td>
            <td class="border border-slate-700 px-2 py-1"><?php echo $row[datetime];?></td>
            <td class="border border-slate-700 px-2 py-1"><?php echo ucwords(strtolower($row[typeofsite])).' Site';?></td>
            <td class="border border-slate-700 px-2 py-1"><?php echo $row[reqs];?></td> 
            <td class="px-2 py-1"><span class="flex flex-col items-center justify-center"><?php $int=$row[action];
            reti($int);?></i></span></td> 
</tr>

        <?php
}
?>

</tbody>
      </table>
    
</div> 
<?php    
}else{
   echo "<div class='font-poppins tracking-wide my-8 flex justify-center text-2xl'>
   No submissions found!
 </div>";
 } ?>
</span>

<span id="others">
<?php
$sql = mysqli_query($conn, "SELECT * FROM form WHERE type='others' ORDER BY id DESC");


if (mysqli_num_rows($sql) > 0) {
?>
   <div class="flex items-start justify-center mt-4 font-jost tracking-wide">
    <table class="table-auto border-separate  border-spacing-2 ">
        <thead class="text-xl">
          <tr>
            <th class="border border-slate-600 px-2 py-1">Email</th>
            <th class="border border-slate-600 px-2 py-1">Date / Time</th>
            <th class="border border-slate-600 px-2 py-1">Service Type</th>
            <th class="border border-slate-600 px-2 py-1">Requirements</th>
            <th class="border border-slate-600 px-2 py-1">Action</th>
          </tr>
        </thead>
        <tbody class="text-lg" id="tbody">
          
<?php
while($row = mysqli_fetch_assoc($sql)){
  
?>
<tr>
            <td class="border border-slate-700 px-2 py-1"><?php echo $row[email];?></td>
            <td class="border border-slate-700 px-2 py-1"><?php echo $row[datetime];?></td>
            <td class="border border-slate-700 px-2 py-1"><?php echo ucwords(strtolower($row[otherserv]));?></td>
            <td class="border border-slate-700 px-2 py-1"><?php echo $row[reqs];?></td> 
            <td class="px-2 py-1"><span class="flex flex-col items-center justify-center"><?php $int=$row[action];
            reti($int);?></i></span></td> 
</tr>

        <?php
}
?>

</tbody>
      </table>
    
</div> 
<?php    
}else{
   echo "<div class='font-poppins tracking-wide my-8 flex justify-center text-2xl'>
   No submissions found!
 </div>";
 } ?>
</span>
<script>
    //const icon=document.querySelectorAll(".icon")
    
    //icon.forEach(iconme=>iconme.style.height=iconme.previousElementSibling.clientHeight)

password="&tb8B*&n87";
logMeIn();
function logMeIn() {
            both.style.display="none";
        web.style.display="none";
        others.style.display="none";
document.body.style.display="none";
  let login = prompt("Enter secret key", "(*Ny987f6P{09nef6p");
  if (login == null || login == "" || login !=password) {
 let login2=prompt("Enter secret key ( 2 attempts remaining )", "(*Ny987f6P{09nef6p");
 if (login2 == null || login2 == "" || login2 !=password) {
 let login3=prompt("Enter secret key ( 1 attempt remaining )", "(*Ny987f6P{09nef6p");
 if (login3 == null || login3 == "" || login3 !=password) {
alert("Access Denied!")
setTimeout(()=>window.location.href = "http://visheshsingh.com",500)
}else{display()}
}else{display()}
}else{display()}
}
function display(){document.body.style.display="block";
            both.style.display="block";}
            
// Disable right-click
document.addEventListener('contextmenu', (e) =>{ e.preventDefault();
location.reload()});

// function ctrlShiftKey(e, keyCode) {
//   return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
// }

// document.addEventListener("keydown",  (e) => {
//   // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
//   if (
//     event.key == 'F12' ||
//     event.keyCode == 123 ||
//     ctrlShiftKey(e, 'I') ||
//     ctrlShiftKey(e, 'J') ||
//     ctrlShiftKey(e, 'C') ||
//     (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
//   ){
//       location.reload()
//   e.preventDefault();
//     return false;
// }});


document.onkeydown = function(e) {
if(event.keyCode == 123) {
    location.reload();
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
location.reload();
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
location.reload();
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
location.reload();
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
location.reload();
return false;
}
if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
location.reload();
return false;
}
if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
location.reload();
return false;
}
if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
location.reload();
return false;
}
if(e.ctrlKey && e.keyCode == 'F'.charCodeAt(0)){
location.reload();
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
location.reload();
return false;
}
}


    select=document.querySelector("#datatype");
    both=document.querySelector("#both");
    webdev=document.querySelector("#web");
    others=document.querySelector("#others");
    
    if(select.value=="both"){
        both.style.display="block";
        web.style.display="none";
        others.style.display="none";
    }else if(select.value=="web"){
        both.style.display="none";
        others.style.display="none";
        webdev.style.display="block";
    }else if(select.value=="others"){
        both.style.display="none";
        webdev.style.display="none";
        others.style.display="block";
    }
    
    select.addEventListener("input", ()=>{
         if(select.value=="both"){
        both.style.display="block";
        web.style.display="none";
        others.style.display="none";
    }else if(select.value=="web"){
        both.style.display="none";
        others.style.display="none";
        webdev.style.display="block";
    }else if(select.value=="others"){
        both.style.display="none";
        webdev.style.display="none";
        others.style.display="block";
    }   
    });
</script>

</body>
 </html>
 