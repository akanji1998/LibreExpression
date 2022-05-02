<?php
session_start();

 
require('controler/controler.php');

if(isset($_GET['action']) && $_GET['action'] == "profil"){
	$pseudo = (isset($_SESSION['pseudo'])? $_SESSION['pseudo'] : "" );
	$profil = profil($pseudo);
	$totalpost = total_post($pseudo);
	$totalcomment = totalcomment($pseudo);
	require('view/profil.php');
}else if(isset($_GET['action']) && $_GET['action'] == "accueil"){

	accueil();

}else if(isset($_GET['action']) && $_GET['action'] == "commenter"){
	$id_post = htmlspecialchars((isset($_POST['id_post'])? $_POST['id_post'] : ""));
	$msg_comment =	htmlspecialchars(htmlentities((isset($_POST['msg_comment'])? $_POST['msg_comment'] : ""),ENT_QUOTES));
	$author = htmlspecialchars((isset($_POST['author'])? $_POST['author'] : ""));
	
	if(isset($msg_comment)){
		add_commentaire($id_post,$author,$msg_comment);
	}

}else if(isset($_GET['action']) && $_GET['action'] == "commentaire"){
	if(isset($_GET['id_post'])){
		$id_post = htmlspecialchars($_GET['id_post']);

		if(post_disp($id_post) === true){
			
			$post = post($id_post);
			
			

			//on determine sur quelle page on se trouve
		    if(isset($_GET['page']) && !empty($_GET['page'])){
		        $currentPage = $_GET['page'];
		    }else {
		        $currentPage = 1;
		    }

		    //nombre de commentaire par page
		    $parPage = 2;

		    //nombre total de commentaire
		    $nbr_comments = nbr_comments($id_post);
		    $tot = $nbr_comments->fetch();

		    //page total
		    $pagesTot = ceil($tot['nbr']/$parPage);

		    //calcul du 1er post de la page
		    $premier = ($currentPage * $parPage) - $parPage;

			$all_comments = all_comments($id_post,$premier,$parPage);

			//Profil
			$pseudo = (isset($_SESSION['pseudo'])? $_SESSION['pseudo'] : "" );
			$profil = profil($pseudo);


			require('view/commentaire.php');

		}else{
			accueil();
		}

	}else{
		accueil();
	}

}else if(isset($_GET['action']) && $_GET['action'] == "poster"){

	$titre = htmlspecialchars(htmlentities((isset($_POST['titre'])? $_POST['titre'] : "")),ENT_QUOTES);
	$category =	htmlspecialchars(htmlentities((isset($_POST['category'])? $_POST['category'] : "")),ENT_QUOTES);
	$msg_post = htmlspecialchars(htmlentities((isset($_POST['msg_post'])? $_POST['msg_post'] : "")),ENT_QUOTES);
	$auteur = htmlspecialchars((isset($_POST['auteur'])? $_POST['auteur'] : ""));

	
    if(isset($_FILES['image'])){

	    //INSERTION DE img_post
	    $img_post = $_FILES['image']['name'];
		$take_extension = explode('.',$img_post);
	    $image_ext = strtolower(end($take_extension));
	    $extension = ['jpg','gif','png','jpeg'];
	    $chemin_image = $_FILES['image']['tmp_name'];
	    $image_size = $_FILES['image']['size'];  
	    $destination = "public/images/".$img_post;
	    $size = 2000000;

    	if((in_array($image_ext,$extension)) || ($image_size <= $size)){

    		move_uploaded_file($_FILES['image']['tmp_name'],$destination);
    		poster($titre,$category,$msg_post,$auteur,$img_post);			
		}
		else {

			$msg_img = "le fichier est volumineux ou n'est pas de type image ou gif";

			require('view/accueil.php');
		}

    } else {

    	poster($titre,$category,$msg_post,$auteur,"");
    }

}else if(isset($_GET['action']) && $_GET['action'] == "login"){

	
	$pseudo = htmlspecialchars_decode((isset($_POST['pseudo'])? $_POST['pseudo'] : ""));
	$mdp = htmlspecialchars((isset($_POST['mdp'])? $_POST['mdp'] : ""));

	if(!empty($pseudo) && !empty($mdp)){
		
		if(login($pseudo,$mdp) === true){
			$_SESSION['pseudo'] = $pseudo;
			$_SESSION['active'] = "true";
			
			header('location:?action=accueil');
		}else{

			$error = "votre pseudo ou password est incorrect";
			require('view/connexion.php');
			
		}

	} else {
		$error = "veuillez remplie les champs";
		require('view/connexion.php');
	}

}else if(isset($_GET['action']) && $_GET['action'] == "signUp"){

	
	$nom = htmlspecialchars((isset($_POST['nom'])? $_POST['nom'] : ""));
	$prenom =	htmlspecialchars((isset($_POST['prenom'])? $_POST['prenom'] : ""));
	$pseudo = htmlspecialchars((isset($_POST['pseudo'])? $_POST['pseudo'] : ""));
	$pass = htmlspecialchars((isset($_POST['pass'])? $_POST['pass'] : ""));
	$pass2 = htmlspecialchars((isset($_POST['pass2'])? $_POST['pass2'] : ""));
	
	
	//INSERTION DE image
    $avatar = $_FILES['image']['name'];
	$take_extension = explode('.',$avatar);
    $image_ext = strtolower(end($take_extension));
    $extension = ['jpg','gif','png','jpeg'];
    $chemin_image = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];  
    $destination = "public/images/".$avatar;
    $size = 2000000;	


	if(!empty($pass) && !empty($pass2) && !empty($nom) && !empty($prenom) && !empty($pseudo)){
		
		if($pass != $pass2){

			$msg_veri = "Mot de passe non Identique"; //0565279294
			
			require('view/connexion.php');

		}else if(unique_pseudo($pseudo) === true){

			$msg_pseudo = "le pseudo choisi existe, veuillez le changer";
 			require('view/connexion.php');
 			

		}else if(!empty($_FILES['image']) && (!(in_array($image_ext,$extension)) || !($image_size <= $size))){

			$msg_avatar = "le fichier est volumineux ou n'est pas de type image ou gif";
			require('view/connexion.php');
			

		}else{

			move_uploaded_file($_FILES['image']['tmp_name'],$destination);

			$signUp = signUp($nom,$prenom,$pseudo,sha1($pass),$avatar);
			if($signUp === true){
				$msg = "vous êtes inscrire avec succès. Vous pouvez vous connecter à présent";
				//header('location:?action=signUp&msg='.$msg.'');
				require('view/connexion.php');
			}
		}
	}

}else 
	if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
	
	deconnexion();

}else {

	connexion();
}

?>