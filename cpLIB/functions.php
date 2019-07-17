<?php

class rstClass {
	private $db;

  function __construct($db_con){
    $this->db = $db_con;
  }
// user regisatration
  public function insert_register($fname,$lname,$email,$phone,$bank,$aname,$anumber,$uname,$upassword,$plan,$refer_id,$reference) {
    try {
      $stmt = $this->db->prepare("INSERT INTO  tbl_register (fname,lname,email,phone,bank,aname,anumber,uname,upassword,plan,refer_id,reference) VALUES (:fname,:lname,:email,:phone,:bank,:aname,:anumber,:uname,:upassword,:plan,:refer_id,:reference)");
       $stmt->bindParam(':fname',$fname);
       $stmt->bindParam(':lname',$lname);
       $stmt->bindParam(':email',$email);
       $stmt->bindParam(':phone',$phone);
       $stmt->bindParam(':bank',$bank);
       $stmt->bindParam(':aname',$aname);
       $stmt->bindParam(':anumber',$anumber);
       $stmt->bindParam(':uname',$uname);
       $stmt->bindParam(':upassword',$upassword);
       $stmt->bindParam(':plan',$plan);
       $stmt->bindParam(':refer_id',$refer_id);
	     $stmt->bindParam(':reference',$reference);
       $stmt->execute();
      return $stmt;
    } catch (PDOException $e){
      echo $e->getMessage();
    }
  }

public function insert_Set_id($Set_id) {
    try {
      $stmt = $this->db->prepare("INSERT INTO tbl_register(refer_id) VALUES (:refer_id)");
      $stmt->bindParam(':refer_id',$refer_id);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e){
      echo $e->getMessage();
    }
  }

  public function insert_login($table1,$uname,$upassword,$role) {
    try {
      $stmt = $this->db->prepare("INSERT INTO  $table1 (uname,upassword,role) VALUES (:uname,:upassword,:role)");

       $stmt->bindParam(':uname',$uname);
       $stmt->bindParam(':upassword',$upassword);
       $stmt->bindParam(':role',$role);
       $stmt->execute();
      return $stmt;
    } catch (PDOException $e){
      echo $e->getMessage();
    }
  }

public function insert_trx($table2,$fname,$refer_id,$reference) {
    try {
      $stmt = $this->db->prepare("INSERT INTO  $table2 (fname,refer_id,reference) VALUES (:fname,:refer_id,:reference)");
      $stmt->bindParam(':fname',$fname);
       $stmt->bindParam(':refer_id',$refer_id);
       $stmt->bindParam(':reference',$reference);
     
       $stmt->execute();
      return $stmt;
    } catch (PDOException $e){
      echo $e->getMessage();
    }
  }


  public function fetch_user($table) {
    try{
      $stmt = $this->db->prepare("SELECT * FROM $table");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
  }


public function fetch_regdetails2($table) {
    try{
$stmt = $this->db->prepare("SELECT refer_id,reference, COUNT(*) FROM $table GROUP BY reference HAVING COUNT(*)<>2
");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
  }


//my edit for referals
public function fetch_referencedetailsmydemo($table) {
    try{
      // $stmt = $this->db->prepare("SELECT refer_id,reference,fname FROM $table");
      // $stmt = $this->db->prepare("SELECT refer_id,fname, COUNT(refer_id) FROM $table group by reference having count(reference)=1");
      $stmt = $this->db->prepare("SELECT refer_id,fname, COUNT(refer_id) FROM $table group by reference having count(reference)=1");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

  function check_referenceandrefer_id($table){
    try{
      $stmt = $this->db->prepare("SELECT refer_id FROM $table where counts=2");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

  public function fetch_counts($table,$reference) {
    try{
      $stmt = $this->db->prepare("SELECT COUNT(*) FROM tbl_register WHERE reference = '111001'");
      $stmt->execute();
      $count1 = $stmt->fetchColumn();
      // $result = $stmt->fetchAll();
      return $count1;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

//row count

function rowcount($table){
try{
  $stmt = $this->db->prepare("SELECT count(*) FROM tbl_register WHERE refer_id = null");
  $stmt->bindParam(':refer_id',$refer_id);
  $count = $stmt->fetchColumn();
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
}

  public function fetch_refer_id($table) {
    try{
      $stmt = $this->db->prepare("SELECT refer_id FROM tbl_register");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
  }
  

  public function afterlogin($table,$uname) {
    try{
      $stmt = $this->db->prepare("SELECT * FROM tbl_register where uname='$uname'");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
    echo $e->getMessage();
    }
  }

  
  public function afterlogin2($table,$reference) {
    try{
      $stmt = $this->db->prepare("SELECT * FROM tbl_register where uname='$reference'");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
    echo $e->getMessage();
    }
  }


  // changes

  // referal table count
  public function insert_referal_detail($username,$referer,$referer_referer) {
    try {
      $stmt = $this->db->prepare("INSERT INTO  tbl_referer_count (username,referer,referer_referer) VALUES (:username,:referer,:referer_referer)");
       $stmt->bindParam(':username',$username);
       $stmt->bindParam(':referer',$referer);
       $stmt->bindParam(':referer_referer',$referer_referer); 
       $stmt->execute();
      return $stmt;
    } catch (PDOException $e){
      echo $e->getMessage();
    }
  }
    
  public function refererUsers($table,$reference) {
    try{
      $stmt = $this->db->prepare("SELECT * FROM tbl_register where reference = '$reference'");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
    echo $e->getMessage();
    }
  }

  public function countReferer($table,$reference) {
    try{
      $stmt = $this->db->prepare("SELECT COUNT(*) FROM tbl_register WHERE reference = '$reference'");
      $stmt->execute();
      $count = $stmt->fetchColumn();
      return $count;
    }
    catch (PDOException $e){
    echo $e->getMessage();
    }
  }

  public function refererName($user) {
    try{
      $stmt = $this->db->prepare("SELECT reference FROM tbl_register WHERE uname = '$user'");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }
    catch (PDOException $e){
    echo $e->getMessage();
    }
  }


  public function maxReferer($reference) {
    try{
      $stmt = $this->db->prepare("SELECT COUNT(*) FROM tbl_referer_count WHERE referer_referer = '$reference'");
      $stmt->execute();
      $count = $stmt->fetchColumn();
      return $count;
    }
    catch (PDOException $e){
    echo $e->getMessage();
    }
  }

  // block user if crossed maximum users
  public function blockUser($table, $user) {
    try{
      $stmt = $this->db->prepare("UPDATE $table SET status = -2 WHERE uname ='$user'");
      $stmt->execute();
      $count = $stmt->fetchColumn();
      return $count;
    }
    catch (PDOException $e){
    echo $e->getMessage();
    }
  }

  // Login message for user crossed maximium members
  public function fetch_blockedUsers($table,$uname,$upassword)
    {
    try {
     $stmt = $this->db->prepare("SELECT * FROM $table WHERE uname=:uname AND upassword=:upassword  AND status='-2'");
     $stmt->bindParam(':uname',$uname);
     $stmt->bindParam(':upassword',$upassword);
     $stmt->execute();
     $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    } catch (PDOException $e){
      echo $e->getMessage();
    }
  }

  public function fetch_reglogin($table,$uname,$upassword)
    {
    try {
     $stmt = $this->db->prepare("SELECT * FROM $table WHERE uname=:uname AND upassword=:upassword  AND status='1'");
     $stmt->bindParam(':uname',$uname);
     $stmt->bindParam(':upassword',$upassword);
     $stmt->execute();
     $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    } catch (PDOException $e){
      echo $e->getMessage();
    }
  }


  function checkuser($uname)
    {
$stmt = $this->db->prepare("SELECT uname FROM tbl_register WHERE uname='$uname'");
    $stmt->bindParam(':uname', $uname);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        return true;
    } else {
        return false;
    }
}

  function check_refer_id($table)
    {
$stmt = $this->db->prepare("SELECT * FROM $table WHERE refer_id IS NULL;");
    $stmt->bindParam(':refer_id',$refer_id);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        return true;
    } else {
        return false;
    }
}

function update_user($table,$id,$u_fname,$u_lname,$u_email,$u_phone,$u_bank,$u_aname,$u_anumber,$u_upassword)
{
  try{
$stmt = $this->db->prepare("UPDATE $table SET fname=:u_fname,lname=:u_lname,email=:u_email,phone=:u_phone,bank=:u_bank,aname=:u_aname,anumber=:u_anumber,upassword=:u_upassword WHERE id='$id'");
     
      $stmt->bindParam(':u_fname',$u_fname);
      $stmt->bindParam(':u_lname',$u_lname);
      $stmt->bindParam(':u_email',$u_email);
      $stmt->bindParam(':u_phone',$u_phone);
      $stmt->bindParam(':u_bank',$u_bank);
      $stmt->bindParam(':u_aname',$u_aname);
      $stmt->bindParam(':u_anumber',$u_anumber);
      $stmt->bindParam(':u_upassword',$u_upassword);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e){
      echo $e->getMessage();
       header("editprofile.php","0");
    }

}

function update_userlogin($table1,$id,$u_upassword)
{
  try{
$stmt = $this->db->prepare("UPDATE $table1 SET upassword=:u_upassword WHERE id='$id'");
      $stmt->bindParam(':u_upassword',$u_upassword);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e){
      echo $e->getMessage();
       header("editprofile.php");
    }

}

 public function insert_package($package,$amount,$management) {
    try {
      $stmt = $this->db->prepare("INSERT INTO tbl_package (package,amount,management)
       VALUES (:package,:amount,:management)");

       $stmt->bindParam(':package',$package);
       $stmt->bindParam(':amount',$amount);
        $stmt->bindParam(':management',$management);
       $stmt->execute();
      return $stmt;
    } catch (PDOException $e){
      echo $e->getMessage();
    }
  }

public function fetch_packagedata($table) {
    try{
      $stmt = $this->db->prepare("SELECT * FROM $table");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

public function deletepackage($table,$id) {
    try {
      $stmt = $this->db->prepare("DELETE FROM $table WHERE id=:id");
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function fetch_management($table,$management)
{
  try{
      $stmt = $this->db->prepare("SELECT * FROM $table where id=:id");
      $stmt->bindParam(':id',$management);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
}

public function fetch_regdetails3($table,$id) {
    try{
      $stmt = $this->db->prepare("SELECT * FROM $table where id=:id");
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

public function update_management($table,$management,$management2)
{
  try{
      $stmt = $this->db->prepare("UPDATE $table SET management=:management2 WHERE id=:management");
      $stmt->bindParam(':management2',$management2);
      $stmt->bindParam(':management',$management);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
}

public function fetch_status($table,$status)
{
  try{
      $stmt = $this->db->prepare("SELECT * FROM $table where id=:id");
      $stmt->bindParam(':id',$status);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
}


public function update_status($table,$table2,$id,$status2,$username)
{
  try{
      $stmt = $this->db->prepare("UPDATE $table,$table2 SET $table.status=:status2,$table2.status=:status2 WHERE $table.id=:id AND $table.uname=$table2.uname");
      $stmt->bindParam(':status2',$status2);
      $stmt->bindParam(':id',$id);
      $stmt->bindParam(':username',$username);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
}

public function fetch_transaction_status($table,$status)
{
  try{
      $stmt = $this->db->prepare("SELECT * FROM $table where id=:id");
      $stmt->bindParam(':id',$status);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
}

public function update_transaction_status($table,$id,$status2)
{
  try{
      $stmt = $this->db->prepare("UPDATE $table SET status=:status2 WHERE id=:id");
      $stmt->bindParam(':status2',$status2);
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
}

public function fetch_regdetails_blocked($table)
 {
    try{
      $stmt = $this->db->prepare("SELECT * FROM $table  WHERE status='-1' ");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

public function deleteuser($table,$id) {
    try {
      $stmt = $this->db->prepare("DELETE FROM $table WHERE id=:id");
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

function insert_news($title,$dos,$description) {
try {
      $stmt = $this->db->prepare("INSERT INTO tbl_news_events (title,dos,description)
       VALUES (:title,:dos,:description)");

      $stmt->bindParam(':title',$title);
      $stmt->bindParam(':dos',$dos);
      $stmt->bindParam(':description',$description);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e){
      echo $e->getMessage();
    }

}
 
 function fetch_news($table){
 try{
      $stmt = $this->db->prepare("SELECT * FROM $table");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }  
 }

function insert_query($s_name,$s_email,$s_mobile,$s_query){
  try {
      $stmt = $this->db->prepare("INSERT INTO tbl_query (s_name,s_email,s_mobile,s_query)
       VALUES (:s_name,:s_email,:s_mobile,:s_query)");

      $stmt->bindParam(':s_name',$s_name);
      $stmt->bindParam(':s_email',$s_email);
      $stmt->bindParam(':s_mobile',$s_mobile);
      $stmt->bindParam(':s_query',$s_query);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e){
      echo $e->getMessage();
    }
}


function fetch_query($table){
  try{
      $stmt = $this->db->prepare("SELECT * FROM $table");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
}

public function fetch_queryreplay($table,$id) {
    try{
      $stmt = $this->db->prepare("SELECT * FROM $table where id=:id");
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

function insert_replay($s_name,$r_query,$r_replay){
  try {
      $stmt = $this->db->prepare("INSERT INTO tbl_replay (s_name,r_query,r_replay)
       VALUES (:s_name,:r_query,:r_replay)");
       $stmt->bindParam(':s_name',$s_name);
      $stmt->bindParam(':r_query',$r_query);
      $stmt->bindParam(':r_replay',$r_replay);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e){
      echo $e->getMessage();
    }
}


function fetch_replay($table,$uname){
  try{
      $stmt = $this->db->prepare("SELECT * FROM $table where s_name='$uname'");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }

}


function insert_transaction($sendby,$uname,$t_id,$amount,$photo_path){
  try {
      $stmt = $this->db->prepare("INSERT INTO tbl_transaction (sendby,uname,t_id,amount,photo_path)
       VALUES (:sendby,:uname,:t_id,:amount,:photo_path)");
       $stmt->bindParam(':sendby',$sendby);
      $stmt->bindParam(':uname',$uname);
      $stmt->bindParam(':t_id',$t_id);
      $stmt->bindParam(':amount',$amount);
      $stmt->bindParam(':photo_path',$photo_path);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e){
      echo $e->getMessage();
    }
}


public function fetch_uname($table,$id) {
    try{
      $stmt = $this->db->prepare("SELECT * FROM $table where id=:id");
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

public function deletequery($table,$id) {
    try {
      $stmt = $this->db->prepare("DELETE FROM $table WHERE id=:id");
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }


  public function fetch_earning($table,$uname) {
    try{
      $stmt = $this->db->prepare("SELECT * FROM $table where uname='$uname'");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
    echo $e->getMessage();
    }
  }


public function fetch_donation($table) {
    try{
      $stmt = $this->db->prepare("SELECT * FROM $table");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 
    catch (PDOException $e){
    echo $e->getMessage();
    }
  }

}?>
