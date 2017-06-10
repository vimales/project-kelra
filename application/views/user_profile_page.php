<!DOCTYPE html>
    <html lang="en">
    <head>
         <meta charset="UTF-8">
        <title>
            User Profile Page
        </title>
         <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
          <link rel="stylesheet" href="<?php echo base_url(); ?>styles.css">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                    <a href=# class=" user-pic-id dropdown-toggle" data-toggle="dropdown" >   <img  id="user-pic-thumb"  src="<?php echo base_url(); ?>kelra.jpg"  alt="profile-pic" />  </a>
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
			<div class="col-sm-8 post-question-div user-details ">
				<div class="row">
					<div class="col-sm-3" style="margin:15px;">
					<img src="<?php echo base_url(); ?>kelra.jpg" class="img-circle">
						<label class="btn btn-primary btn-file" style="margin-left: 5px; margin-top: 5px;"> 
							Upload profile Pic<input type="file" style="display: none; "> 
						</label>
				
					</div>
					<div class="col-sm-8" style="margin:15px;">
						<h1>Name</h1><hr/><h3>status<hr/>Dept<hr/>Year<hr/>Area Of Interest<hr/>E-mail<hr/></h3>
						<button class="btn btn-primary" style="float: right;"  data-toggle="modal" data-target="#myModalHorizontalform"> Edit Content </button>
					</div>
				</div>
			</div>	
			<div class="col-sm-3 post-question-div log-details" style="">
				<div><h4>Quick Links:<hr/>
				<ul>
				<a href=#><li>Questions Posted</a>
				<a href=#><li>Answers</a>
				</ul></h4></div>
			</div>
		</div>
		<div class="modal fade" id="myModalHorizontalform" tabindex="-1" role="dialog" 
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
                    Update Details
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form">
						 <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="form-status" >Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                            id="form-status" placeholder="Update Status"/>
                    </div>
                  </div>

					 <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="form-dept" >Department</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                            id="form-dept" placeholder="Update Department"/>
                    </div>
                  </div>
					 <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="form-year" >Year</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                            id="form-year" placeholder="Update year"/>
                    </div>
                  </div>
					  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="form-aoi" >Area-of-Interest</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                            id="form-aoi" placeholder="Update Area-of-Interest"/>
                    </div>
                  </div>
				 <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" 
                        id="inputEmail3" placeholder="Update Email"/>
                    </div>
                  </div>
				 
				   
				  
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Change Password?</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control"
                            id="inputPassword3" placeholder="If Not, leave it blank"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword4" >Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control"
                            id="inputPassword4" placeholder="Confirm Password"/>
                    </div>
                  </div>
                 
                </form>
                
                
                
                
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <button type="button" class="btn btn-primary">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>


	</div>
</body>
</html>