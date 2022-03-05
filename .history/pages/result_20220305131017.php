 <?php 
    $examId = $_GET['id'];
    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<div class="app-main__outer">
<div class="app-main__inner">
    <div id="refreshData">
            
    <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <?php echo $selExam['ex_title']; ?>
                          <div class="page-title-subheading">
                            <?php echo $selExam['ex_description']; ?>
                          </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 float-left">
        	<div class="col-md-6 float-left">
        	<div class="card mb-3 widget-content bg-night-fade">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"><h5>Score</h5></div>
                        <div class="widget-subheading" style="color: transparent;">/</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <?php 
                                $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                            ?>
                            <span>
                                <?php echo $selScore->rowCount(); ?>
                                <?php 
                                    $over  = $selExam['ex_questlimit_display'];
                                 ?>
                            </span> / <?php echo $over; ?>
                        </div>
                    </div>
                </div>
            </div>
        	</div>

            <div class="col-md-6 float-left">
            <div class="card mb-3 widget-content bg-happy-green">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"><h5>Percentage</h5></div>
                        <div class="widget-subheading" style="color: transparent;">/</div>
                        </div>
                        <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <?php 
                                $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                            ?>
                            <span>
                                <?php 
                                    $score = $selScore->rowCount();
                                    $ans = $score / $over * 100;
                                    echo number_format($ans,2);
                                    echo "%";
                                    
                                 ?>
                            </span> 
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
        <div class="row col-md-12">
        	<h1 class="text-primary" style="text-align: center;">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RESULT'S</h1>
        </div>

        <div class="row col-md-6 float-left">
        	<div class="main-card mb-3 card">
                <div class="card-body">
                	<h5 class="card-title" style="text-align: center;">คำตอบของคุณ : คำตอบที่ถูกต้อง</h5>
        			<table class="align-middle mb-0 table table-borderless table-striped table-hover"  id="tableList">
                   &nbsp; <?php 
                    	$selQuest = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id WHERE eqt.exam_id='$examId' AND ea.axmne_id='$exmneId' AND ea.exans_status='new' ");
                    	$i = 1;
                    	while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                    		<tr>
                    			<td>
                    				<b><p><?php echo $i++; ?> .) <?php echo $selQuestRow['exam_question']; ?></p></b>
                    				<label class="pl-4 text-black">
                    					คำตอบของคุณ : 
                    					<?php 
                    						if($selQuestRow['exam_answer'] != $selQuestRow['exans_answer'])
                    						{ ?>
                    							<span style="color:red"><?php echo $selQuestRow['exans_answer']; ?></span>
                    						<?PHP }
                    						else
                    						{ ?>
                    							<span class="text-success"><?php echo $selQuestRow['exans_answer']; ?></span>
                    						<?php }
                    					 ?>
                                         
                    				</label>
                    			</td>
                                <td></br>
                    				<b><p></p></b>
                    				<label class="pl-4 text-success">
                    					คำตอบที่ถูกต้อง : 
                    					<span class="text-success"><?php echo $selQuestRow['exam_answer']; ?></span>
                    				</label>
                    			</td>
                    		</tr>
                    	<?php }
                     ?>
	                 </table>
                </div>
            </div>
        </div>

       


    </div>
</div>
