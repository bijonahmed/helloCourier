     <style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>


<div class="container">

    <div style="min-height: 550px;">
        <center>
            <font color="green">
            <?php
            $message = $this->session->userdata('bookEntry');
            if (isset($message)) {
                echo $message;
                $this->session->unset_userdata('bookEntry');
            }
            ?>

            </font>
        </center>
        <center>Name: <?php echo $this->session->userdata('full_name'); ?></center>
        <h3>Tracking Report</h3>

          <table width="100%" id="customers" border="1" class="table table-condensed">
            <tr>
                <td>SL #</td>
                <td>Date </td>
                <td>Booking Number </td>
                <td>Book To </td>
                <td>Address</td>
                <td>Contact Number</td>
                <td>COD Amount</td>
                <td>Rec. Amt After Delivery</td>
                 <td>Pay Type</td>
                <td>Status</td>
            </tr>
            <?php
            $x = 1;
            $cod = 0;
            $res=0;
            $out=0;
            foreach ($trkRpt as $value) {
                ?>
                <tr>
                    <td><?php echo $x;$x++; ?></td>
                    <td style="width: 10px;"><?php echo $value->date; ?></td>
                    <td><?php echo $value->booking_id; ?></td>
                    <td><?php echo $value->reciver_name; ?></td>
                    <td><?php echo $value->reciver_address; ?></td>
                    <td><?php echo $value->reciver_phone; ?></td>
                    <td><?php echo $value->collection_amount; ?></td>
                    <td><?php 
                 
                    if($value->delivery_type!=NULL)
                        {
                           if($value->status=="Returend"){
                               $result= $value->collection_amount - $value->delivery_type;
                               $res+= $value->collection_amount - $value->delivery_type;
                               
                              echo $result ; 
                          }else{
                                $output= ($value->collection_amount - $value->delivery_type);
                                $out+= ($value->collection_amount - $value->delivery_type);
                                
                                echo $output;
                         }
                    } 
                    
                     ?></td>
                     <td><?php if($value->paid_type){
                     echo $value->paid_type;
                     }else{
                     echo "---";
                     }; ?></td>
                     <?php
                     if($value->status=="Deliveried"){
                     ?>
                    <td style="color: green;"><?php echo $value->status; ?></td>
					<?php
                    } elseif($value->status=="Returend"){
                    ?>
                    <td style="color: green;"><?php echo $value->status; ?></td>
                    
                    <?php
                     }else{
                    ?>
                     <td><?php echo $value->status; ?></td>
                    <?php
                     }
                    ?>
                    
                </tr>
                <?php
               
            }
            ?>


        </table>
        </div>
          
        
    </div>    
    <div class="container">
    <div align="right" style="font-size: 18px;"><?php
      $result = (int)$res + (int)$out;
$sum=0;  
foreach($recamount as $value)
    {
   $sum+= ($value->amount);
}
 $output= ($result-$sum);
 if(!empty($output))
 {
     
     echo "Receivable Amount is $output BDT.";
 }
    
    ?>
    </div>
    </div>
</div>