<div class="col-md-6 col-sm-12">
<label>Select Plan</label>
 <select class="form-control" name="reference">Select a Plan:
<option value="Direct">Company</option>
<?php 
$reference=1;
 $table='tbl_register';
 $count1=$cppl->fetch_counts($table,$reference);
 if ($count1==2) {
 echo $table='tbl_register';
$result=$cppl->fetch_regdetails($table);
foreach ($result as $value) { ?>
<option value="<?php echo $value['refer_id']; ?>"><?php echo $value['fname']; echo "(Rid:-".$value ['reference'].")";?></option>
<?php }
}
?>
</select>
</div>