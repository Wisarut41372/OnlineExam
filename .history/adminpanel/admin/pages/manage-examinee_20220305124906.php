<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>จัดการผู้สอบ</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">ชื่อผู้สอบ
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>ชื่อ</th>
                                <th>เพศ</th>
                                
                                <th>รายวิชา</th>
                                <th>อีเมล</th>
                                <th>รหัสผ่าน</th>
                                <th>แก้ไขล่าสุด</th>
                                <th>สถานะ</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExmne = $conn->query("SELECT * FROM examinee_tbl ORDER BY exmne_id DESC ");
                                if($selExmne->rowCount() > 0)
                                {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selExmneRow['exmne_fullname']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_gender']; ?></td>
                                           
                                           <td>
                                            <?php 
                                                 $exmneCourse = $selExmneRow['exmne_course'];
                                                 $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
                                                 echo $selCourse['cou_name'];
                                             ?>
                                            </td>
                                          
                                           <td><?php echo $selExmneRow['exmne_email']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_password']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_birthdate']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_status']; ?></td>
                                           <td>
                                               <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?php echo $selExmneRow['exmne_id']; ?>" class="btn btn-sm btn-primary">แก้ไข</a>
                                               <button type="button" id="deleteExaminee" data-id='<?php echo $selExamRow['exmne_id']; ?>'  class="btn btn-danger btn-sm">ลบ</button>
                                           </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">ไม่พบผู้สอบ</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
