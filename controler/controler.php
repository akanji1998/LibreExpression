<?php
 
require('model/model.php');

function login($pseudo,$pass){
	$user_exist = login_user($pseudo,$pass);

	return $user_exist;
}

function unique_pseudo($pseudo){

	$pseudo_exist = pseudo_exist($pseudo);

	return $pseudo_exist;

}

function post_disp($id_post){
	return post_exist($id_post);
}

function signUp($nom,$prenom,$pseudo,$pass,$avatar){

	$result = insert_users($nom,$prenom,$pseudo,$pass,$avatar);

	if($result === true){
		
		return true;
	}
}

function poster($titre,$category,$msg_post,$auteur,$image){
	insert_post($titre,$category,$msg_post,$auteur,$image);

	header('location:?action=accueil');
	//accueil();
}

function user($pseudo){
	$user = user($pseudo);
}

function add_commentaire($id_post,$msg_comment,$author){
	insert_comment($id_post,$msg_comment,$author);
	//commentaire($id_post);
	header('location:?action=commentaire&id_post='.$id_post.'');
}

function commentaire($id_post){
	header('location:?action=commentaire&id_post='.$id_post.'');
}
function totalposts(){
	$totalposts = totalpost();
	return $totalposts;
}
function accueil(){
	//on determine sur quelle page on se trouve
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $currentPage = $_GET['page'];
    }else {
        $currentPage = 1;
    }

    //nombre de post par page
    $parPage = 3;

    //nombre total de postes
    $post_total = totalposts();

    //page total
    $pagesTot = ceil($post_total/$parPage);

    //calcul du 1er post de la page
    $premier = ($currentPage * $parPage) - $parPage;
	$post = all_post($premier,$parPage);

	//Profil
	$pseudo = (isset($_SESSION['pseudo'])? $_SESSION['pseudo'] : "" );
	$profil = profil($pseudo);
	
	require('view/accueil.php');
}

function connexion(){
	require('view/connexion.php');
}


function deconnexion(){

	unset($_SESSION['pseudo']);
	unset($_SESSION['active']);
	session_destroy();
	require('view/connexion.php');
}


?>