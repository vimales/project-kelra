<!DOCTYPE html>
    <html lang="en">
    <head>
         <meta charset="UTF-8">
        <title>
            Question Page
        </title>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url(); ?>styles.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/prettydate/0.1.0/prettydate.js"></script>

    </head>    
    <body id="main-wrapper">
            <div class="top-div container-fluid">
                 <div class="row">
				 <div class="col-sm-5">
				 <img class="logo" src="<?php echo base_url(); ?>logo.png"  alt="logo" />
                </div>
			
                 <div class="col-sm-5">
                 <input id="search-bar" class="pull-right" type="text" placeholder="Search for a Question" />
                 <button  type="button" class="btn btn-default pull-right search-button">
                 <span class="glyphicon glyphicon-search">
				 </span> 
				 Search
                 </button>
                 </div>
                 <div class="dropdown col-sm-1" >
                        <a href="#" data-toggle="modal" data-target="#myModalHorizontal">
							<span class="glyphicon glyphicon-bullhorn pull-right">
							</span>
						</a>
                 </div>
                 	<div class=" dropdown col-sm-1">
                    <a href=# class=" user-pic-id dropdown-toggle" data-toggle="dropdown" > 
						<img  id="user-pic-thumb"  src="<?php echo base_url(); ?>kelra.jpg" alt="profile-pic" />  
					</a>
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
			<div class="container">
				<div class="row">
					<div class="col-sm-7 user-details" style="background: transparent ">
						<div class="row">
							<div class="col-sm-11 post-question-div question-section" style="padding: 15px;">
								
								
								<span style="color: grey;">posted by
								<strong> 
									<?php echo $questions[0]->question_user_name[0]->user_profile_name;  ?>
								</strong>
								</span>
								<span class="prettydate" style="color: grey;">
									<?php echo $questions[0]->question_created_on; ?>
								</span>
								<br>
								<h3><?php echo $questions[0]->question_title;?></h3>
															<script type="text/javascript">
																	$(function(){
																		$(".prettydate").prettydate();
																	});
															</script>
						
								<hr/>
								<button class="btn btn-primary toggle"  data-toggle="modal" data-target="#myModalHorizontaltext"> Answer </button> 
								<button class="btn btn-sm toggle"> Upvote </button>
								<div class="container">
									<div class="modal fade" id="myModalHorizontaltext" tabindex="-1" role="dialog" 
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
												<div class="modal-body">
													<div>
													<label for="answerarea">Answer Box</label>
													<textarea rows=5 cols=50 name="answerarea"> </textarea>
													</div>
													
												</div>
												
												<!-- Modal Footer -->
												<div class="modal-footer">
													<button type="button" class="btn btn-primary"
															data-dismiss="modal">
																Post
													</button>
													
												</div>
											</div>
										</div>
									</div>

								</div>
												
							</div>
							<?php foreach($questions[0]->answers as $answer) { ?>
							<div class="col-sm-11 post-question-div answer-section" style="padding: 15px;">
								<span style="color: grey;">
								<?php	
									echo $answer->answer_user_name[0]->user_profile_name; 
									print " ";?>
								<span class="prettydate" > <?php	print_r($answer->answer_created_on); ?> </span>
								
								</span>
								<br>
								<span style="font-size: 1.2em;"><?php echo $answer->answer_text; ?></span><br>
								
								<button class="btn btn-sm toggle"> Upvote </button>
							</div>
							<?php } ?>
						</div>
					</div>
						
					<div class="col-sm-4 log-details " style="background: transparent; ">
						<div class="row">
							<div class="col-sm-11 post-question-div question-section">
								<h2> Related Question</h2>
									<ul>
										<li>This is a question 1<hr/>
										<li>This is a question 2
									</ul>
							</div>
							<div class="col-sm-11 post-question-div answer-section">
								<h4>
									Upvotes: <hr/>
									Posted on: <hr/>
									Posted By: 
								</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
</body>
</html>