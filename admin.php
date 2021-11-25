<!DOCTYPE html>
<html>
 <head>
 <title>Mystery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
 </head>

 <body>

 <?php 
// DISPLAY IF ADMIN
   session_start();
   if($_SESSION["connected"]=="admin"){
 ?>

 <header>
   <a href="index.php"> Home </a>
   <?php include "header.php";?> 
</header>
<main>
<h1 class="tsignin">Users details</h1>

<?php 

//_________________connect to SQL_________________//

$servername = "localhost:3306";
$username = "root_";
$password = "root_";

// Create connection

$conn = new mysqli($servername, $username, $password, 'antoine-maherault_moduleconnexion');

//_________________select DATA_________________//

// get DATA from utilisateurs

$sql = "SELECT ID, login, prenom, nom FROM utilisateurs" ;
$query = $conn->query($sql);
$users = $query->fetch_all();

else{
   echo "<p id = 'update'>Access denied</p>";
}
?>

<div class="admin">

<table style="text-align:center"> 

   <theader>
      <th>ID</th>
      <th>login</th>
      <th>prenom</th>
      <th>nom</th>
   </theader>
   <tbody>
      <?php 
         if($_SESSION["connected"]=="admin"){
            for($i = 0;isset($users[$i]);$i++){
               echo "<tr>";
            foreach($users[$i] as $value){
               echo "<td>".$value."&nbsp"."</td>";
            }
            echo "</tr>";
            }
         }
        
      ?>
   </tbody>

   </table>
   </div>
   </main>

<?php 
}
else{
  echo "<h1 class='title'>Acces denied</h1>";
}
?>

</body>

<footer>
</footer>

</html>