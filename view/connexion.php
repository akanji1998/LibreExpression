<?php
 $title = "Connexion";
?>
<?php ob_start() ?>

<div class="headernav">
    <div class="container">
    	
        <div class="row">
            <div class="col-lg-2 col-xs-1 col-sm-2 col-md-2 logo ">
                <a href="index.php"><img src="images/logo.jpg" alt=""  /></a>
            </div>
            <form action="?action=login" method="post" class="form">
            	
                
	            <div class="col-lg-4 search col-xs-4 col-sm-4 col-md-4">
	               
	                <div class="wrap">
	                    
                        <div class="pull-left txt">
                        	<input type="text" name="pseudo" class="form-control" placeholder="Entrez votre pseudo" required>
                        </div>                       
                       
                        <div class="clearfix"></div>	                   
	                </div>
	            </div>
	            <div class="col-lg-4 search col-xs-4 col-sm-4 col-md-4">
	               
	                <div class="wrap">
	                    
                        <div class="pull-left txt">
                        	<input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required>
                        </div>                       
                       
                        <div class="clearfix"></div>
	                </div>
	            </div>
	            <div class="col-lg-2 col-xs-2 col-sm-2 col-md-2 avt">
	                <div class="stnt pull-left">                         
	                    
	                    <button class="btn btn-primary" type="submit">Login</button>	                   
	                </div>                            
	                
	                <div class="clearfix"></div>
	            </div>
        	</form>
           
        </div>
        <p class="text-center" style="color: green;"><?php echo (isset($success)? $success : ""); ?></p>
    	<p class="text-center" style="color: red;"><?php echo (isset($error)? $error : ""); ?></p>
    </div>
</div>

            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 breadcrumbf">
                            <a href="#">Create New account</a> 
                        </div>

                    </div>

                </div>


                <div class="container">
                    <div class="row">
                    	<div class="col-lg-2 col-md-2"></div>
                        <div class="col-lg-8 col-md-8">
                            <!-- POST -->
                            <div class="post">
                                <form action="?action=signUp" class="form newtopic" method="post" enctype="multipart/form-data">
                                    <div class="postinfotop">
                                        <h2>Création de compte</h2>
                                    </div>
                                     <span style="color: green;"><?= (isset($msg))? $msg : "";?></span>
                                    <!-- acc section -->
                                    <div class="accsection">
                                        <div class="acccap">
                                            <div class="userinfo pull-left">&nbsp;</div>
                                            <div class="posttext pull-left">
                                            	<h3>Required Fields</h3>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                       
                                        <div class="topwrap">
                                           
                                            <div class="userinfo pull-left">
                                                <div class="avatar">
                                                    <img src="images/avatar-blank.jpg" alt="" />
                                                    <div class="status green">&nbsp;</div>
                                                </div>
                                                <div class="imgsize">60 x 60</div>
                                               
                                            </div>
                                            <div class="posttext pull-left">
                                                <div>
                                                    Avatar
                                                    <input type="file" name="image" class="form-control"/>
                                                    <span style="color: red;"><?= (isset($msg_avatar)? $msg_avatar : "");?></span>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="text" name="nom" placeholder="First Name" class="form-control" required />
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="text" name="prenom" placeholder="Last Name" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="text" name="pseudo" placeholder="User Name(pseudo)" class="form-control" required />
                                                    <span style="color: red;"><?= (isset($msg_pseudo)? $msg_pseudo : "");?></span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="password" placeholder="Password" class="form-control" id="pass" name="pass"  required />
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="password" placeholder="Retype Password" class="form-control" id="pass2" name="pass2" required />
                                                        <span style="color: red;"><?= (isset($msg_veri)? $msg_veri : "");?></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>  
                                    </div><!-- acc section END -->



                                    <div class="postinfobot">

                                        <div class="pull-right postreply">
                                            <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                            <div class="pull-left"><button type="submit" class="btn btn-primary">Sign Up</button></div>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div><!-- POST -->
                        </div>
                        <div class="col-lg-2 col-md-2"></div>
                    </div>
                </div>
            </section>

<?php $content = ob_get_clean();  ?>
<?php 
    
    require('template.php');
?>