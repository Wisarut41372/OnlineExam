<!-- Modal For Add Course -->
<div class="modal fade" id="modalForAddCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addCourseFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายวิชา</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>รายวิชา</label>
            <input type="" name="course_name" id="course_name" class="form-control" placeholder="เพิ่มวิชา" required="" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">เพิ่ม</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Update Course -->
<div class="modal fade myModal" id="updateCourse-<?php echo $selCourseRow['cou_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
     <form class="refreshFrm" id="addCourseFrm" method="post" >
       <div class="modal-content myModal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">แก้ไข ( <?php echo $selCourseRow['cou_name']; ?> )</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="ปิด">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>วิชา</label>
              <input type="" name="course_name" id="course_name" class="form-control" value="<?php echo $selCourseRow['cou_name']; ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">เพิ่ม</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" >ปิด</button>
        
        </div>
      </div>
     </form>
    </div>
  </div>


<!-- Modal For Add Exam -->
<div class="modal fade" id="modalForExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อสอบ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>วิชา</label>
            <select class="form-control" name="courseSelected">
              <option value="0">-</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                if($selCourse->rowCount() > 0)
                {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="0">ไม่พบวิชา</option>
                <?php }
               ?>
            </select>
          </div>

          <div class="form-group">
            <label>กำหนดเวลา</label>
            <select class="form-control" name="timeLimit" required="">
              <option value="0">-</option>
              <option value="10">10 นาที</option> 
              <option value="20">20 นาที</option> 
              <option value="30">30 นาที</option> 
              <option value="40">40 นาที</option> 
              <option value="50">50 นาที</option> 
              <option value="60">60 นาที</option> 
            </select>
          </div>

          <div class="form-group">
            <label>จำนวนข้อ</label>
            <input type="number" name="examQuestDipLimit" id="" class="form-control" placeholder="กรอกจำนวนข้อ">
          </div>

          <div class="form-group">
            <label>ข้อสอบ</label>
            <input type="" name="examTitle" class="form-control" placeholder="กรอกชื่อข้อสอบ" required="">
          </div>

          <div class="form-group">
            <label>รายละเอียด</label>
            <textarea name="examDesc" class="form-control" rows="4" placeholder="กรอกรายละเอียด" required=""></textarea>
          </div>


        </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">เพิ่ม</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Add Examinee -->
<div class="modal fade" id="modalForAddExaminee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamineeFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้สอบ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>ชื่อ</label>
            <input type="" name="fullname" id="fullname" class="form-control" placeholder="กรอกชื่อ" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>วัน/เดือน/ปี ที่เพิ่ม</label>
            <input type="date" name="bdate" id="bdate" class="form-control" placeholder="วัน/เดือน/ปี ที่เพิ่ม" autocomplete="off" >
          </div>
          <div class="form-group">
            <label>เพศ</label>
            <select class="form-control" name="gender" id="gender">
              <option value="0">เลือกเพศ</option>
              <option value="male">ชาย</option>
              <option value="female">หญิง</option>
            </select>
          </div>
          <div class="form-group">
            <label>รายวิชา</label>
            <select class="form-control" name="course" id="course">
              <option value="0">เลือกรายวิชา</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id asc");
                while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                <?php }
               ?>
            </select>
          </div>
         
          <div class="form-group">
            <label>อีเมล</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="กรอกอีเมล" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>รหัสผ่าน</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="กรอกรหัสผ่าน" autocomplete="off" required="">
          </div>
           <div class="form-group">
            <label>เพิ่มข้อมูล</label>
            <select class="form-control" name="year_level" id="year_level">
              <option value="ยืนยัน">ยืนยัน</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">เพิ่ม</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
      
      </div>
    </div>
   </form>
  </div>
</div>



<!-- Modal For Add Question -->
<div class="modal fade" id="modalForAddQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addQuestionFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Question for <br><?php echo $selExamRow['ex_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm" method="post" id="addQuestionFrm">
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>คำถาม</label>
            <input type="hidden" name="examId" value="<?php echo $exId; ?>">
            <input type="" name="question" id="course_name" class="form-control" placeholder="เพิ่มคำถาม" autocomplete="off">
          </div>

          <fieldset>
            <legend>เพิ่มคำตอบ</legend>
            <div class="form-group">
                <label>ข้อ ก</label>
                <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="เพิ่มข้อ ก" autocomplete="off">
            </div>

            <div class="form-group">
                <label>ข้อ ข</label>
                <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="เพิ่มข้อ ข" autocomplete="off">
            </div>

            <div class="form-group">
                <label>ข้อ ค</label>
                <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="เพิ่มข้อ ค" autocomplete="off">
            </div>

            <div class="form-group">
                <label>ข้อ ง</label>
                <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="เพิ่มข้อ ง" autocomplete="off">
            </div>

            <div class="form-group">
                <label>คำตอบที่ถูกต้อง</label>
                <input type="" name="correctAnswer" id="" class="form-control" placeholder="ใส่คำตอบที่ถูกต้อง" autocomplete="off">
            </div>
          </fieldset>
        </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">เพิ่ม</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
       
      </div>
      </form>
    </div>
   </form>
  </div>
</div>