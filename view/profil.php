<?php
 $title = "Connexion";
?>
<?php ob_start() ?>
<?php  
    if(!isset($_SESSION['pseudo']) || !isset($_SESSION['active'])){
    header('location:index.php?action=connexion');
} 
?>
            <div class="headernav">
                <?php
                    $lire_profil = $profil->fetch();
                    $lire_post = $totalpost->fetch();
                    $lire_comments = $totalcomment->fetch();
                ?>
                <div class="container">
                     <div class="row">
                        <div class="col-lg-2 col-xs-2 col-sm-2 col-md-2 logo ">
                            <a href="?action=accueil"><img src="images/logo.jpg" alt=""  /></a>
                        </div>
                        
                        <div class="col-lg-5 col-xs-5 search col-sm-5 col-md-5">
                            <div class="wrap">
                                <form action="#" method="post" class="form">
                                    <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search topic or author"></div>
                                    <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-5 col-sm-5 col-md-5 avt">
                            <div class="stnt pull-left">                            
                                
                                <a href="?action=accueil"><button class="btn btn-primary">Accueil</button></a>
                               
                            </div>
                            <div class="env pull-left"><i class="fa fa-envelope"></i></div>

                            <div class="avatar pull-left dropdown open">
                                <a data-toggle="dropdown" href="#"><img src="public/images/<?= $lire_profil['avatar']; ?>" alt="" style="max-width: 50px;max-height: 50px;" /></a> 
                                <b class="caret"></b>
                                <div class="status green">&nbsp;</div>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="?action=profil">Mon Profile</a></li>                                     
                                    <li role="presentation"><a role="menuitem" tabindex="-2" href="?action=deconnexion">Deconnexion</a></li>
                                   
                                </ul>
                            </div>
                            
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

           <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 breadcrumbf">
                            <a href="#">Mon profil</a> 
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <!-- POST -->
                            <div class="post">
                                <form action="#" class="form newtopic" method="post">
                                    <div class="postinfotop">
                                        <h2>Mes informtions</h2>
                                    </div>
                                    
                                    <!-- acc section -->
                                    <div class="accsection">
                                        <div class="acccap">
                                            <div class="userinfo pull-left">&nbsp;</div>
                                           
                                            <div class="clearfix"></div>
                                        </div>
                                       
                                        <div class="topwrap">
                                           
                                            <div class="userinfo pull-left">
                                                <div class="avatar">
                                                    <img src="public/images/<?= $lire_profil['avatar']; ?>" alt="" style="max-width: 60px;max-height: 60px;" />
                                                    <div class="status green">&nbsp;</div>
                                                </div>
                                                <div class="imgsize">60 x 60</div>
                                               
                                            </div>
                                            <div class="posttext pull-left">
                                                <div>
                                                    Avatar
                                                    <input type="file" name="img" class="form-control" disabled />
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="text" placeholder="First Name" class="form-control" value="<?= html_entity_decode($lire_profil['nom']); ?>" disabled/>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="text" placeholder="Last Name" class="form-control" value="<?= html_entity_decode($lire_profil['prenom']); ?>" disabled />
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="text" placeholder="User Name" class="form-control" value="<?= html_entity_decode($lire_profil['pseudo']); ?>" disabled/>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="password" placeholder="Password" class="form-control" value="<?= $lire_profil['mdp']; ?>" disabled id="pass" name="pass" />
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="password" placeholder="Retype Password" value="<?= $lire_profil['mdp']; ?>" disabled  class="form-control" id="pass2" name="pass2" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>  
                                    </div><!-- acc section END -->



                                    <div class="postinfobot">

                                        <div class="pull-right postreply">
                                            <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                            <div class="pull-left"><button type="submit" class="btn btn-primary" disabled>Edit</button></div>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div><!-- POST -->
                        </div>
                        <div class="col-lg-4 col-md-4">

                            <!-- -->
                            <div class="sidebarblock">
                                <h3>Statistique</h3>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <ul class="cats">
                                        <li><a href="#">Total post<span class="badge pull-right"><?= $lire_post['totalpost']; ?></span></a></li>
                                       
                                        <li><a href="#">Total commentaires <span class="badge pull-right"><?= $lire_comments['totalcomment']; ?></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php $content = ob_get_clean();  ?>
<?php 
    
    require('template.php');
?>