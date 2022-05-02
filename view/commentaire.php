<?php
 $title = "Commentaires";
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
                <?php
                 $lire_post = $post->fetch();
                 $id_post = $lire_post['id_post'];

                 //poster info
                 $auteur_poster = profil($lire_post['auteur']);
                 $lire_auteur_poster = $auteur_poster->fetch();

                 $nbr_comments = $nbr_comments->fetch();
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 breadcrumbf">
                            
                             <a href="#"><?= html_entity_decode($lire_post['cat_post']); ?></a> <span class="diviver">&gt;</span> 
                             <a href="#"><?= html_entity_decode($lire_post['auteur']); ?></a>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">

                            <!-- POST -->
                            
                            <div class="post beforepagination">
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img src="public/images/<?= $lire_auteur_poster['avatar']; ?>" alt="" style="max-width: 50px;max-height: 50px;" />
                                            <div class="status green">&nbsp;</div>
                                        </div>

                                        <?= $lire_post['auteur']; ?>
                                    </div>
                                    <div class="posttext pull-left">
                                        <h2><?= html_entity_decode($lire_post['titre_post']); ?></h2>
                                        <p><?= html_entity_decode($lire_post['msg_post']); ?></p>
                                        <?php if(!empty($lire_post['img_post'])){ ?>
                                         <img src="public/images/<?= $lire_post['img_post']; ?>" style="max-width: 100%;" >
                                        <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>                              
                                <div class="postinfobot">

                                    <div class="likeblock pull-left">
                                        Commentaires :
                                        <a href="#" class="up"><?= $tot['nbr']; ?></a>
                                        
                                    </div>

                                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Date : <?= html_entity_decode($lire_post['date_post']); ?></div>

                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- POST -->

                            <div class="paginationf">
                                <br>
                                <div class="pull-left">
                                   <p>Liste des commentaires</p>
                                </div>
                                <br>
                                <div class="clearfix"></div>
                            </div>

                            <!-- POST -->
                            <?php  
                                while($lire_comments = $all_comments->fetch()){

                                    //info du commentateur
                                    $auteur_post = profil($lire_comments['author_comment']);
                                    $lire_auteur_post = $auteur_post->fetch();
                            ?>
                            <div class="post">

                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img src="public/images/<?= $lire_auteur_post['avatar']; ?>" alt="" style="max-width: 50px;max-height: 50px;" />
                                            
                                        </div>

                                       <?= $lire_comments['author_comment']; ?> 
                                    </div>
                                    <div class="posttext pull-left">
                                        <p><?= html_entity_decode($lire_comments['msg_comment']); ?></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>                              
                                <div class="postinfobot">

                                   

                                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Date du : <?= $lire_comments['date_comment']; ?></div>

                                   

                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- POST -->
                            <?php } ?>



                            <div class="pull-left"><a style="display:<?= ($currentPage == 1) ? "none" : "" ?>"  href="?action=commentaire&id_post=<?= $id_post; ?>&page=<?= $currentPage - 1; ?>" class="prevnext"><i class="fa fa-angle-left"></i></a></div>

                            <div class="pull-left">
                                <ul class="paginationforum">
                                
                                    <li><a href="?action=commentaire&id_post=<?= $id_post; ?>&page=<?= $currentPage ?>" class="actve"><?= $currentPage; ?></a></li>
                                </ul>
                            </div>
                            <div class="pull-left"><a style="display:<?= ($currentPage == $pagesTot || empty($pagesTot))? "none" : "" ?>"  href="?action=commentaire&id_post=<?= $id_post; ?>&page=<?= $currentPage + 1; ?>" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>
                            <div class="clearfix"></div>    
                        </div>

                        <div class="col-lg-5 col-md-5">

                            <!-- POST -->
                             <div class="post">
                                <form action="?action=commenter" class="form" method="post">
                                    <div class="topwrap">
                                        <div class="userinfo pull-left" >
                                            <div class="avatar">
                                                <img src="public/images/<?= $lire_profil['avatar']; ?>" alt="" style="max-width: 50px;max-height: 50px;" />
                                               
                                            </div>

                                           
                                        </div>
                                        <div class="posttext pull-left">
                                           
                                            <?= (isset($_SESSION['pseudo']))? $_SESSION['pseudo'] : "";  ?>
                                            
                                            <div class="textwraper">
                                                <div class="postreply">Commenté le post</div>
                                                <textarea name="msg_comment" id="reply" placeholder="Entrez votre commentaire ici" required></textarea>
                                                <input type="hidden" name="author" value="<?= $_SESSION['pseudo']; ?>">
                                                <input type="hidden" name="id_post" value="<?= htmlspecialchars($_GET['id_post']); ?>">
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>                              
                                    <div class="postinfobot">

                                                                               
                                        <div class="pull-right postreply">
                                            <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                            <div class="pull-left"><button type="submit" class="btn btn-primary">Poster</button></div>
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