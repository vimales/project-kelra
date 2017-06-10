<!DOCTYPE html>
    <html lang="en">


    <head>
         <meta charset="UTF-8">
        <title>
            Dashboard
        </title>
           <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="<?php echo base_url(); ?>styles.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			
			<script src="https://cdnjs.cloudflare.com/ajax/libs/prettydate/0.1.0/prettydate.js"></script>
			<link href="<?php echo base_url();?>dist/css/select2.min.css" rel="stylesheet" />
			<script src="<?php echo base_url();?>dist/js/select2.min.js"></script>	
	
			
    </head> 

	
    <body id="main-wrapper">
            <div class="top-div container-fluid">
                 <div class="row">
				 <div class="col-sm-5">
				 <img class="logo" src="<?php echo base_url(); ?>logo.png" alt="logo" />
                </div>
			
                 <div class="col-sm-5">
                 <input id="search-bar" class="pull-right" type="text" placeholder="Search for a Question" />
                 <button  type="button" class="btn btn-default pull-right search-button">
                 <span class="glyphicon glyphicon-search"></span> Search
                 </button>
			
                 </div>
                 <div class="dropdown col-sm-1" >
                        <a href="#" data-toggle="modal" data-target="#myModalHorizontal"><span class="glyphicon glyphicon-bullhorn pull-right"></span></a>
                        
                 </div>
                 	<div class=" dropdown col-sm-1">
                    <a href=# class=" user-pic-id dropdown-toggle" data-toggle="dropdown" >   <img  id="user-pic-thumb"  src="<?php echo base_url(); ?>kelra.jpg" alt="profile-pic" />  </a>
                     <ul class=" dropdown-menu pull-right" role="menu">
						<li><a href="<?php echo base_url('index.php/Dashboard_controller')?>"> Dashboard </a></li>
                       <li> <a href="<?php echo base_url('index.php/User_page_controller')?>">Profile Page</a></li>
                       <li><a href="<?php echo base_url('index.php/Dashboard_controller/logout')?>"> Logout </a></li>
                   </ul>
                 </div>
                </div>
				<div class="container">
						<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<!-- Modal Header -->
								<div class="modal-header">
									<button type="button" class="close" 
									   data-dismiss="modal">
										   <span aria-hidden="true">&times;</span>
										   <span class="sr-only">Close</span>
									</button>
									<h4 class="modal-title" id="myModalLabel">
										Notifications
									</h4>
								</div>
								
								<!-- Modal Body -->
								<div class="modal-body">
									<div>
									Dhilip upvoted your question
									</div><hr/>
									<div>
									Iniyavan Answered your question
									</div>
									
								</div>
								
								<!-- Modal Footer -->
								<div class="modal-footer">
									<button type="button" class="btn btn-default"
											data-dismiss="modal">
												Close
									</button>
								 
								</div>
							</div>
						</div>
					</div>

				</div>
            </div>
       
			<div class="newsfeed clear-fix">
				 <div class="left-div post-question-div float-left " style=" overflow-x: auto;">
				 <h3><center><span> Topics </span></center></h3>
				 <hr />
					<nav>
					<?php if($category->num_rows() > 0){
								foreach($category->result() as $categorys){
						
					?>
					<ul>
					<h4> <a href="#collapse<?php echo $categorys->category_name;  ?>" data-toggle="collapse"><li> <?php echo $categorys->category_name; ?></li></a> </h4>
							<div id="collapse<?php echo $categorys->category_name;  ?>" class="panel-collapse collapse">
								<ul class="list-group">
									 <?php if($topics->num_rows() > 0) { 
											foreach($topics->result() as $topic){
													if($topic->category_id == $categorys->category_id) { 
									 ?>
									<li class="list-group-item"><input type="checkbox" > <?php echo $topic->tag_name; ?> </li>
									 <?php } }  } ?> 
								</ul>
							</div>
					</ul>
					<?php } }?>
					
					</nav>
					
					
					<button class="btn btn-primary" style="float:right;">Filter</button>
				</div>			
				<div class="questions float-left">
				<div style= "margin-bottom: 15px;" class="content post-question-div post-color ">
				
				<form action="<?php echo base_url("index.php/Dashboard_controller");?>" method="post">
				
				<input id="questionBox" name="questionBox" type="text" placeholder="Post a Question..."/> 
				<br>
																	<script type="text/javascript">
																	$(document).ready(function(){
																	
																		 $("#tagsAdd").select2({
																			placeholder: "Add Tags(Required)",
																			 maximumSelectionLength: 5
																		 });
																		
																		$("#tagsAddDiv").hide();
																		$("#tagsAddBtn").click(function(){
																			$("#tagsAddDiv").toggle();
																		});
																		
																		$("#questionBox").focus( function(){
																			$("#tagsAddBtn").click();
																		})
																		
																		;
																		
																	});
																	</script>
				
			 	
			
				
				<div id="tagsAddDiv" style= "margin-top: 10px; margin-bottom:10px;">
				
				<select id="tagsAdd" multiple style= "width:100%;" name="tagsAdd[]" required>
					 <option></option>
					 <option disabled>What is the Question About?  Example:cse related, culturals related,etc.,</option>
					 <?php foreach($get_tag as $tag){ ?>
						<option><?php echo $tag->tag_name; ?></option>
					 <?php } ?>
					
					
				</select>
				</div>
				<div style="margin-top: 10px;">
				<label class="btn btn-primary btn-file" >  Add Image/Video <input type="file" style="display: none;"></label>
				<input type="button" class="btn btn-primary" id="tagsAddBtn" value="Add tags*" />
				<input type="submit" class="btn btn-primary pull-right" name="postQuestion" value="Post Question"> 
				</div>
				</div>
				</form>
				<!--div class="content post-question-div" >
					<button id="postSettings" class="pull-right" style="background: #bdc3c7; top: -20px;">
					<span class="glyphicon glyphicon-wrench"></span>

					<span class="caret"></span>
					</button>

					<h2><a href="<?php echo base_url("index.php/Question_page_controller")?>"><p>This is a Question</p></a></h2>
					<hr/>
					<div class="answer-content">
					Answer section
					<div>
					<hr/>
					<button class="btn btn-primary toggle"   data-toggle="modal" data-target="#myModalHorizontalAnswertext"> Answer this Question </button>

					<button class="btn btn-sm toggle"> Upvote </button>

					</div>
					</div>
				</div-->
				
					<?php 
						if(count($get_all_ques) > 0){
							foreach($get_all_ques as $res){
					?>		
					<div class="container">
						<div class="modal fade" id="myModalHorizontalAnswertext<?php echo $res->question_id; ?>" tabindex="-1" role="dialog" 
						aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<!-- Modal Header -->
								<div class="modal-header">
								<button type="button" class="close" 
								data-dismiss="modal">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">
								Answer Section
								</h4>
								</div>

								<!-- Modal Body -->
								<form action="<?php echo base_url("index.php/Dashboard_controller")?>" method="post">
								<div class="modal-body">
								<input type="hidden" value="<?php echo $res->question_id; ?>"  name="hiddenBox"/>
								<div>
								<label for="answerarea">Answer Box</label>
								<textarea rows=5 cols=50 name="answerarea"> </textarea>
								
								</div>

								</div>

								<!-- Modal Footer -->
								<div class="modal-footer">
								<label class="btn btn-primary btn-file pull-left" >  Add Image/Video <input type="file" style="display: none;"></label>
								<button type="button" class="btn btn-primary"
								data-dismiss="modal">
								Cancel
								</button>
								<input  class="btn btn-warning" type="submit" value="Post" name="answerPostBtn" />
								
								</div>
								</form>
								</div>
							</div>
						</div>

					</div>
					
						<div class="content post-question-div">
						<button id="postSettings" class="pull-right" style="background: #bdc3c7; top: -20px;">
						<span class="glyphicon glyphicon-wrench"></span>
						<span class="caret"></span>
						</button>
						<span style="color: grey;">posted by
							<strong> 
								<?php echo $res->question_user_name[0]->user_profile_name;  ?>
							</strong>
						</span>
						<span class="prettydate" style="color: grey;">
							<?php echo $res->question_created_on; ?>
						</span>
						<a href="<?php echo base_url("index.php/Question_page_controller")?>/<?php echo $res->question_id ?>">
							<p style="font-size: 2em; font-weight: bolder;">
								<?php echo $res->question_title; ?>
							</p>
						</a>
						
																<script type="text/javascript">
																	$(function(){
																		$(".prettydate").prettydate();
																	});
																</script>
						
						<hr/>
						<div class="answer-content">
							<?php 
							$flag=0;
							foreach($res->answers as $answers):
							if($res->question_id == $answers->question_id){ 	?>
							
							<span style="color: grey;">
							<?php	
								echo $answers->answer_user_name[0]->user_profile_name; 
								print " ";?>
							<span class="prettydate" > <?php	print_r($answers->answer_created_on); ?> </span>
							
							</span>
							<span style="font-size: 1.2em; font-size: bolder;"><?php	
								print "<br>";
								print_r($answers->answer_text);
								$flag=1;
							?></span>
							
							<?php break;
							}
								endforeach;
								if($flag === 0){
									echo "No Answer Yet!!";
								}
							?>
							
							<div>
								<hr/>
								<button class="btn btn-primary toggle"   data-toggle="modal" data-target="#myModalHorizontalAnswertext<?php echo $res->question_id; ?>">
									Answer this Question 
								</button>
								<button class="btn btn-sm toggle"> Upvote </button>
							</div>
						</div>
					</div>
								
					<?php } } ?>
				
				</div>
				<div class="right-div float-left">
					<h3><span>Related Questions</span></h3>
					<hr/>
					<ul>
						<li> <a href=#>Question 1</a>
						<li> <a href=#>Question 2</a>
						<li> <a href=#>Question 3</a>
					</ul>
				</div>
				
				

			</div>
		
			
			
		
           
    </body>
    </html>