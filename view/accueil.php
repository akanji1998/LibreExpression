<?php

 $title = "Accueil";
?>
<?php ob_start() ?>
<?php  if(!isset($_SESSION['pseudo']) || !isset($_SESSION['active'])){
    header('location:index.php?action=connexion');
} ?>
            <div class="headernav">
                 <?php
                    $lire_profil = $profil->fetch();
                   
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
                                
                                <button class="btn btn-primary">Exprimez vous</button>
                               
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
                <br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <!-- POST -->
                            <?php
                                while($lire_post = $post->fetch()){
                                    
                                    $auteur_post = profil($lire_post['auteur']);
                                    $lire_auteur_post = $auteur_post->fetch();
                            ?>
                            <div class="post">
                                <div class="wrap-ut pull-left">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img src="public/images/<?= $lire_auteur_post['avatar']; ?>" alt="" style="max-width: 50px;max-height: 50px;" />
                                            <div class="status green">&nbsp;</div>
                                            <?= $lire_post['auteur']; ?>
                                        </div>                                       
                                    </div>
                                    <div class="posttext pull-left">
                                        <h2><a href="?action=commentaire&id_post=<?= $lire_post['id_post']; ?>"><?= html_entity_decode($lire_post['titre_post']); ?></a></h2>
                                        <p><?= html_entity_decode($lire_post['msg_post']); ?></p>
                                        <?php if(!empty($lire_post['img_post'])){ ?>
                                        <img src="public/images/<?= $lire_post['img_post']; ?>" style="max-width: 100%;" >
                                        <?php }?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="postinfo pull-left">
                                    <?php 
                                        $nbr_comments = nbr_comments($lire_post['id_post']); 
                                        $nbre = $nbr_comments->fetch();
                                    ?>
                                    <div class="comments">
                                        <div class="commentbg">
                                            <?= $nbre['nbr']; ?>
                                            <div class="mark"></div>
                                        </div>

                                    </div>
                                    <!-- <div class="views"><i class="fa fa-eye"></i> 1,568</div> -->
                                    <div class="time"><i class="fa fa-clock-o"></i><?= html_entity_decode($lire_post['date_post']); ?></div>                                    
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- POST -->
                            <?php }?>
                            <div class="pull-left"><a style="display:<?= ($currentPage == 1) ? "none" : "" ?>"  href="?action=accueil&page=<?= $currentPage - 1; ?>" class="prevnext"><i class="fa fa-angle-left"></i></a></div>

                            <div class="pull-left">
                                <ul class="paginationforum">
                                    
                                    
                                    
                                    <li><a href="?action=accueil&page=<?= $currentPage ?>" class="actve"><?= $currentPage; ?></a></li>
                                   
                                    
                                    
                                </ul>
                            </div>
                            <div class="pull-left"><a style="display:<?= ($currentPage == $pagesTot) ? "none" : "" ?>"  href="?action=accueil&page=<?= $currentPage + 1; ?>" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-lg-5 col-md-5">

                           
                            <!-- POST -->
                            <div class="post">
                                <form action="?action=poster" class="form newtopic" method="post" enctype="multipart/form-data">
                                    <div class="topwrap">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">
                                                <img src="public/images/<?= $lire_profil['avatar']; ?>" alt="" style="max-width: 50px;max-height: 50px;" />
                                                <div class="status green">&nbsp;</div>
                                            </div>

                                        </div>
                                        <div class="posttext pull-left">

                                            <div>
                                                <input type="text" name="titre" placeholder="Entrer un titre" class="form-control" required />
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="text" name="category" id="category" placeholder="Categorie"  class="form-control" >
                                                   
                                                </div>
                                               
                                            </div>

                                            <div>
                                                <textarea name="msg_post" id="desc" placeholder="message du post"  class="form-control" ></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div><p>Ajouter une image (facultatif)</p></div>
                                                    <input type="file" name="image"/>
                                                    <span style="color:red"><?= (isset($msg_img)? $msg_img : ""); ?></span>
                                                   <input type="hidden" name="auteur" value="<?= $_SESSION['pseudo']; ?>" />
                                                </div>
                                               
                                            </div>


                                        </div>
                                        <div class="clearfix"></div>
                                    </div>                              
                                    <div class="postinfobot">

                                        <div class="pull-right postreply">
                                            <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                            <div class="pull-left"><button type="submit" class="btn btn-primary">Post</button></div>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div><!-- POST -->
                        </div>
                    </div>
                </div>
            </section>

<?php $content = ob_get_clean();  ?>
<?php 
    
    require('template.php');
?>