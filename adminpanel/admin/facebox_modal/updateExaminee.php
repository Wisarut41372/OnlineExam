
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selExmne = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;แก้ไข <b>( <?php echo strtoupper($selExmne['exmne_fullname']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateExamineeFrm">
     <div class="form-group">
        <legend>ชื่อ</legend>
        <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">
        <input type="" name="exFullname" class="form-control" required="" value="<?php echo $selExmne['exmne_fullname']; ?>" >
     </div>

     <div class="form-group">
        <legend>เพศ</legend>
        <select class="form-control" name="exGender">
          <option value="<?php echo $selExmne['exmne_gender']; ?>"><?php echo $selExmne['exmne_gender']; ?></option>
          <option value="male">ชาย</option>
          <option value="female">หญิง</option>
        </select>
     </div>

     <div class="form-group">
        <legend>วัน/เดือน/ปี ทีแก้ไข</legend>
        <input type="date" name="exBdate" class="form-control" required="" value="<?php echo date('d-m-Y',strtotime($selExmne["exmne_birthdate"])) ?>"/>
     </div>

     <div class="form-group">
        <legend>วิชา</legend>
        <?php 
            $exmneCourse = $selExmne['exmne_course'];
            $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
         ?>
         <select class="form-control" name="exCourse">
           <option value="<?php echo $exmneCourse; ?>"><?php echo $selCourse['cou_name']; ?></option>
           <?php 
             $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id!='$exmneCourse' ");
             while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
            <?php  }
            ?>
         </select>
     </div>

    

     <div class="form-group">
        <legend>อีเมล</legend>
        <input type="" name="exEmail" class="form-control" required="" value="<?php echo $selExmne['exmne_email']; ?>" >
     </div>

     <div class="form-group">
        <legend>รหัสผ่าน</legend>
        <input type="" name="exPass" class="form-control" required="" value="<?php echo $selExmne['exmne_password']; ?>" >
     </div>
    
     <div class="form-group">
        <legend>สถานะ</legend>
        <input type="hidden" name="course_id" value="<?php echo $id; ?>">
        <input type="" name="newCourseName" class="form-control" required="" value="<?php echo $selExmne['exmne_status']; ?>" >
     </div>
     <div class="form-group">
        <legend>แก้ไขข้อมูล</legend>
        <select type="" name="exYrlvl" class="form-control" required="" value="<?php echo $selExmne['exmne_year_level']; ?>" >
        <option value="ยืนยัน">ยืนยัน</option>
        </select>
      </div>

  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">อัพเดท</button>
  </div>
</form>
  </div>
</fieldset>







