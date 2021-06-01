<?php 
global $link;
include 'db_connect.php';
$sql="SELECT username,upassword,fname,lname FROM individual";
$results=mysqli_query($link,$sql);




if(mysqli_num_rows($results)>0){
  echo '<table>
  <tr>  
      <th>User ID</th> <th>User Name</th> <th>Email</th> <th>Password</th>
    
  </tr>';
  while($row=mysqli_fetch_assoc($results)){
    echo"<tr>  
    <td>".$row["userID"]."</td><td>".$row['userName']."</td><td>".$row['userEmail']
    ."</td><td>".$row["upassword"]."</td>";}
    echo"</table>";
  

  }
else{
  echo '0results';
}


    ?>