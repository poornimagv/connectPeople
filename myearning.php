 <?php  include 'userheader.php'; ?>

<?php
  require_once 'cpLIB/config.php';
  $table='tbl_transaction';
  $uname=$susername;
  $result=$cppl->fetch_earning($table,$uname);
?>
<body >
    <div class="container">
<div class="row" style="margin-top: 150px;">

<div class="col-xs-12">
<form method="post">

<br>

   <table id="table" class="table table-striped table-bordered" style="width:100%">
   
<thead>
<tr>
<th>Sl no</th>
<th>Send By</th>
<th>Name</th>
<th>Transaction ID</th>
<th>Transaction Image</th>
<th>Amount</th>
<th>Status</th>
</tr>
</thead>
<?php
$slnoo=1;
foreach ($result as $value) {
?>
<tr>            
<td><?php echo $slnoo; ?> </td>
<td><?php echo $value['sendby']; ?> </td>
<td><?php echo $value['uname']; ?> </td>
<td><?php echo $value['t_id']; ?> </td>
<td><?php echo "<img  width='40px' height='40px' src='".$value['photo_path']."'>"."<a download href=".$value['photo_path'].">Download</a>";?> </td>
<td><?php echo $value['amount']; ?></td>
<?php $status=$value['status']; ?>
<td>

  

     <?php if(($status)=='1'){ ?>
            <a href="transactionstatus.php?u_id=<?php echo $value['id'];?>?username=<?php echo $value['uname']?>" class="btn btn-primary btn-sm disabled" onclick="return confirm('Really You Need to accept <?php echo $value['t_id']?> Transaction id Payment');">Accepted</a>
    
         <?php }if(($status)=='0'){ ?>
             <a href="transactionstatus.php?u_id=<?php echo $value['id'];?>?username=<?php echo $value['uname']?>" class="btn btn-info btn-sm " onclick="return confirm('Really You Need to Accept <?php echo $value['t_id']?> Transaction id Payment');">Approve</a>
         <?php } ?>



  </td>

</tr>

<?php $slnoo++; } ?>
</tfoot>
</table>
<span id="val" style="float: right;"></span>
</form>
</div>

</div></div>
    <!--  <script>
            var table = document.getElementById("table"), sumVal = 0;  
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseInt(table.rows[i].cells[5].innerHTML);
            }
            document.getElementById("val").innerHTML = "<b>Congratulations Dear <?php echo $value['uname']; ?> Your Total Earning is  " + sumVal +"   " ;
            console.log(sumVal);
            
        </script> -->

</div>
</body>
