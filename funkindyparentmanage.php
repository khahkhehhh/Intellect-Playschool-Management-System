<?php 
include ('dbconnect.php');
include 'smartsession.php';
include 'headerguardian.php';
if(!session_id())
{
    session_start();
}

//Retrieve individual bookings
$sql = "SELECT * FROM tb_subject
        LEFT JOIN tb_kidprogram ON tb_subject.fun_mykid = tb_kidprogram.k_mykid
        LEFT JOIN tb_program ON tb_kidprogram.k_programme=tb_program.prog_id
        LEFT JOIN tb_session ON tb_kidprogram.k_session=tb_session.session_id
        WHERE k_programme = '2'
        ";
$result = mysqli_query ($con,$sql);


?>



<div class="container">
     <br><h3 style="font-family:Times New Roman;">FunKindyLand Assessment</h3>
    <table class="table table-hover">
  <thead>
    <tr>

      <th scope="col">Assessment ID</th>  
      <th scope="col">Kid Name</th>
      <th scope="col">MyKid ID</th>
      <th scope="col">Kid DOB</th>
      <th scope="col">Program</th>
      <th scope="col">Session</th>
      <th scope="col">Assessment Date</th>

    </tr>
  </thead>
  <tbody>

     <?php
     while($row=mysqli_fetch_array($result))
     {
         echo '<tr>';
         echo "<td>".$row['fun_id']."</td>";
         echo "<td>".$row['k_name']."</td>";
         echo "<td>".$row['fun_mykid']."</td>";
         echo "<td>".$row['k_dob']."</td>";
         echo "<td>".$row['prog_type']."</td>";
         echo "<td>".$row['session_desc']."</td>";
         echo "<td>".$row['fun_date']."</td>";


         echo "<td>";
               echo "<a href= 'funkindyparentview.php?id=".$row['k_mykid']."'class ='btn btn-warning'>View  </a> &nbsp";
               echo "</td>";
  
         echo '</tr>';
     }

     ?>

    
  </tbody>
</table>
</div><br><br><br>


<?php include 'footermain.php';?>