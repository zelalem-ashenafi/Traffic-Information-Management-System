<?php if($sessionRole=='admin'){?>
   <button class="btn btn-primary" style="display:inline-block;float:right;margin-bottom:60px;margin-top:40px;" onClick="window.print()"><i class="fas fa-print">Print this Report </i></button>
<table id = "table" class = "table table-bordered">
                                <thead>
                                    <tr>
                                    
                                        
                                        <th scope="col">Description</th>
                                        <th scope="col">Amount</th>
                                        
                                        
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query2 = "SELECT COUNT(*) totalEmployee FROM employees";
                                        $result2 = mysqli_query( $connection, $query2 );                                        
                                        $totalEmployee = $result2?mysqli_fetch_assoc( $result2 ):0;
                                        $totalEmployee=$totalEmployee['totalEmployee'];

                                        
                                        $query2 = "SELECT COUNT(*) totalTPA FROM tpas";
                                        $result2 = mysqli_query( $connection, $query2 );                                        
                                        $totalTPA = $result2?mysqli_fetch_assoc( $result2 ):0;
                                        $totalTPA=$totalTPA['totalTPA'];

                                        $query2 = "SELECT COUNT(*) totalTraffic FROM traffic_polices";
                                        $result2 = mysqli_query( $connection, $query2 );                                        
                                        $totalTraffic = $result2?mysqli_fetch_assoc( $result2 ):0;
                                        $totalTraffic=$totalTraffic['totalTraffic'];

                                        $query2 = "SELECT COUNT(*) totalDriver FROM drivers";
                                        $result2 = mysqli_query( $connection, $query2 );                                        
                                        $totalDriver = $result2?mysqli_fetch_assoc( $result2 ):0;
                                        $totalDriver=$totalDriver['totalDriver'];
                                        
                                        $tot=$totalDriver+$totalEmployee+$totalTPA+$totalTraffic;

                                    ?>
                                    <tr><td>Total registered user of the system</td><td><?php echo $tot; ?></td></tr>
                                    <tr><td>Registered employees</td><td><?php echo $totalEmployee; ?></td></tr>
                                     <tr><td>Registered TPAs</td><td><?php echo $totalTPA; ?></td></tr>
                                     <tr><td>Registered Traffic polices</td><td><?php echo $totalTraffic; ?></td></tr>
                                    <tr><td>Registered Drivers</td><td><?php echo $totalDriver; ?></td></tr>

                                </tbody>
                            </table>
<?php } 
else if($sessionRole=='tpa'){

    $st_date =  date("Y-m-d H:i:00");
    $minus =  date("Y-m-d H:i:00", strtotime($st_date."-1 week"));
    $query2 = "SELECT COUNT(*) totalPunishment FROM punishment where DATE(punish_date)>='$minus' and DATE(punish_date)<='$st_date'";
    
    $result2 = mysqli_query( $connection, $query2 );                                        
    $weekPunishment = $result2?mysqli_fetch_assoc( $result2 ):0;
    $weekPunishment=$weekPunishment['totalPunishment']??0;
     
    $st_date =  date("Y-m-d H:i:00");
    $minus =  date("Y-m-d H:i:00", strtotime($st_date."-1 week"));
    $query2 = "SELECT COUNT(*) totalAccident FROM accident where DATE(acc_date)>='$minus' and DATE(acc_date)<='$st_date'";

    $result2 = mysqli_query( $connection, $query2 );                                        
    $weekAccident = $result2?mysqli_fetch_assoc( $result2 ):0;
    $weekAccident=$weekAccident['totalAccident']??0;
     
    $st_date =  date("Y-m-d H:i:00");
    $minus =  date("Y-m-d H:i:00", strtotime($st_date."-1 month"));
    $query2 = "SELECT COUNT(*) totalPunishment FROM punishment where DATE(punish_date)>='$minus' and DATE(punish_date)<='$st_date'";
    $result2 = mysqli_query( $connection, $query2 );                                        
    $monthPunishment = $result2?mysqli_fetch_assoc( $result2 ):0;
    $monthPunishment=$monthPunishment['totalPunishment']??0;
     
    $st_date =  date("Y-m-d H:i:00");
    $minus =  date("Y-m-d H:i:00", strtotime($st_date."-1 month"));
    $query2 = "SELECT COUNT(*) totalPunishment FROM accident where DATE(acc_date)>='$minus' and DATE(acc_date)<='$st_date'";
    $result2 = mysqli_query( $connection, $query2 );                                        
    $monthAccident = $result2?mysqli_fetch_assoc( $result2 ):0;
    $monthAccident=$monthAccident['totalPunishment']??0;
     
    $st_date =  date("Y-m-d H:i:00");
    $minus =  date("Y-m-d H:i:00", strtotime($st_date."-1 year"));
    $query2 = "SELECT COUNT(*) totalPunishment FROM punishment where DATE(punish_date)>='$minus' and DATE(punish_date)<='$st_date'";
    $result2 = mysqli_query( $connection, $query2 );                                        
    $yearPunishment = $result2?mysqli_fetch_assoc( $result2 ):0;
    $yearPunishment=$yearPunishment['totalPunishment']??0;
     
    $st_date =  date("Y-m-d H:i:00");
    $minus =  date("Y-m-d H:i:00", strtotime($st_date."-1 year"));
    
    $query2 = "SELECT COUNT(*) totalPunishment FROM accident where DATE(acc_date)>='$minus' and DATE(acc_date)<='$st_date'";

    $result2 = mysqli_query( $connection, $query2 );                                        
    $yearAccident = $result2?mysqli_fetch_assoc( $result2 ):0;
    $yearAccident=$yearAccident['totalPunishment']??0;
     
?>
<table id = "table" class = "table table-bordered">
                                <thead>
                                    <tr>
                                    
                                        
                                        <th scope="col">Description</th>
                                        <th scope="col">Amount</th>
                                        
                                        
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    

                                    
                                    <tr><td>Total accident happened in this week</td><td><?php echo $weekAccident; ?></td></tr>
                                    <tr><td>Total accident happened in this month</td><td><?php echo $monthAccident; ?></td></tr>
                                    <tr><td>Total accident happened in this year</td><td><?php echo $yearAccident; ?></td></tr>
                                    <tr><td>Total punishments taken in this week</td><td><?php echo $weekPunishment; ?></td></tr>
                                    
                                    <tr><td>Total punishments taken in this month</td><td><?php echo $monthPunishment; ?></td></tr>
                                    <tr><td>Total punishments taken in this year</td><td><?php echo $yearPunishment; ?></td></tr>
                                    
                                    

                                </tbody>
                            </table><?php }?>