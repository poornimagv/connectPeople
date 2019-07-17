
   <style type="text/css">
     table th{
      background-color: #64a50dc2;
      color: #ffffff;
      font-weight: bold;
     }

    #urlinput{
      height: 37px;
     }
   </style>
</head>
  <body id="top">
  
<?php include 'userheader.php';?>
        

<body>
<div class="container">

<div class="row col-md-offset-2" style="margin-top: 150px;">

<div class="row">
<div class="col-md-8 col-xs-12 col-sm-12">
<?php
  foreach ($result as $value)
    $table='tbl_register';
    $userName = $value ['uname'];
    $count = $cppl->countReferer($table,$userName);
    if($count < 2){
?>
<div class="form-group">
<input type="text" class="form-control" id="urlinput"  value="http://localhost/<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'/'.$susername; ?>">
</div>
</div> 

<div class="col-md-4 col-xs-12 col-sm-12">
<div class="form-group">


<a href="register.php"><button type="button"  class="btn btn-primary" onclick="myFunction()">Copy And Send </button></a>
<?php } ?>
</div>
</div>
</div>
</div>

   


<script>
//copy text
function myFunction() {
  var copyText = document.getElementById("urlinput");
  copyText.select();
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}



</script>
<div class="row col-md-offset-2" style="margin-top: 56px; margin-left: 30%;">


<div class="col-xs-12">
  <!-- <center><h3><b>Your Details</b></h3></center> -->
<form method="post">
 <table id="example" class="table table-striped table-bordered" style="width:50%">


<thead>

<tr>

  <td>Username</td>
  <?php //echo '<pre>'; print_r($result); ?>
  <td><?php echo $userName = $value ['uname']; ?></td>
</tr>

<tr>
  <td>Referred By</td>
<td><?php echo $paytwo=$value ['reference']; ?> </td>
</tr>


  <?php


  $reference=$paytwo;
  $result=$cppl->refererUsers($table,$userName); 
    foreach ($result as $key => $value) {
      $firstLevel = $result[0]['uname'];
      if(isset($result[1]['uname'])){
        $secLevel = $result[1]['uname'];
      }
    }
  ?>

<tr>
  <td>1st Level</td>
  <td><?php if (isset($firstLevel)) { echo $firstLevel; } ?></td>
</tr>


<tr>
  <td>2nd Level</td>
  <td><?php if (isset($secLevel)) { echo $secLevel; } ?></td>
</tr>


</thead>
</table>
</div>
</div>
</form>
</div>


