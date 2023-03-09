    <!-- Content Header (Page header) -->
    <section>
      <h1 style="text-align: center">Momentum Catering</h1>
      <h4 style="text-align: center">#10 Eisenhower Street, Greenhills, 1503 Metro Manila</h4>
      <h4 style="text-align: center">+639-1234-567-89</h4>
      <h4 style="text-align: center">momentumcatering@email.com</h4>

      <br>
      <div>
        <h4 style="text-align: center;">Payment Report</h4>
      </div>
     

    </section>

 
              <table width="100%">
                <thead>
                  <th style="text-align: left;">RCode</th>
                  <th style="text-align: left;">Last Name</th>
                  <th style="text-align: left;">First Name</th>
                  <th style="text-align: left;">Contact</th>
                  <th style="text-align: left;">Event</th>
                  <th style="text-align: left;">Date</th>
                  <th style="text-align: left;">Venue</th>
                  <th style="text-align: left;">Team</th>
                  <th style="text-align: left;">Balance</th>
                  <th style="text-align: left;">Amount</th>
                  <th style="text-align: left;">Mode of Payment</th>
                </thead>
                <tbody>


        <?php
include('../includes/dbcon.php');

    $query=mysqli_query($con,"SELECT *,payment.amount AS payment_amount from reservation left join team on reservation.team_id=team.team_id inner join payment on reservation.rid=payment.rid where r_status='Completed'")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['rid'];
        $rcode=$row['r_code'];
        $first=$row['r_first'];
        $last=$row['r_last'];
        $contact=$row['r_contact'];
        $address=$row['r_address'];
        $email=$row['r_email'];
        $date=$row['r_date'];
        $venue=$row['r_venue'];
        $balance=$row['balance'];
        $payment_amount=$row['payment_amount'];
        $type=$row['r_ocassion'];
        $team=$row['team_name'];

        $balanceamount = explode('.', $balance);
?>         
                          <tr>
                            <td><?php echo $rcode;?></td>
                            <td><?php echo $last;?></td>
                            <td><?php echo $first;?></td>
                            <td><?php echo $contact;?></td>
                            <td><?php echo $type;?></td>
                            <td><?php echo $date;?></td>
                            <td><?php echo $venue;?></td>
                            <td><?php echo $team;?></td>
                            <td><?php echo $balance;?></td>
                            <td><?php echo $payment_amount;?></td>
                            <td><?php echo $row['modeofpayment'];?></td>
                            
                          </tr>
    
                      <?php 

                          }
                          ?>



                </tbody>
              </table>

<script>



     window.print();
    
  window.onafterprint = window.close; 

</script>


