<?php

function db_connect() {
	try{
     $bdd = new PDO('mysql:host=localhost;dbname=forum_db;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Erreur:'.$e->getMessage());
    }
   return $bdd;
}

function pseudo_exist($pseudo){
	$bd = db_connect();

	$all_pseudo = $bd->query("SELECT pseudo FROM user");

	while($rd_pseudo = $all_pseudo->fetch()){

		if($pseudo == $rd_pseudo['pseudo']){
			return true;
		}
	}
}

function post_exist($id_post){
	$bd = db_connect();

	$all_post = $bd->query("SELECT id_post FROM postes");

	while($rd_post = $all_post->fetch()){

		if($id_post == $rd_post['id_post']){
			return true;
		}
	}
}

function insert_users($nom,$prenom,$pseudo,$pass,$avatar){
	$bd = db_connect();

	$insertion = $bd->query("INSERT INTO user(pseudo,nom,prenom,mdp,avatar) VALUES('$pseudo','$nom','$prenom','$pass','$avatar')");

	if($insertion){
		return true;
	}

}

function insert_post($titre,$category,$msg_post,$auteur,$image){
	$bd = db_connect();

	$insertion = $bd->query("INSERT INTO postes(titre_post,cat_post,msg_post,auteur,img_post) VALUES('$titre','$category','$msg_post','$auteur','$image')");
}

function insert_comment($id_post,$author,$msg_comment){
	$bd = db_connect();
	$insertion = $bd->query("INSERT INTO commentaire(id_post,author_comment,msg_comment) VALUES('$id_post','$author','$msg_comment')");
}


function all_post($premier,$parPage){
	$bd = db_connect();

	$all_post = $bd->query("SELECT * FROM postes ORDER BY date_post DESC LIMIT $premier,$parPage");

	return $all_post;
}

function totalpost(){
	$bd = db_connect();
	$totalpost = $bd->query("SELECT count(*) as post_tot FROM postes");

	$lire_post_tot = $totalpost->fetch();

	return $lire_post_tot['post_tot'];
}

function post($id_post){
	$bd = db_connect();

	$post = $bd->query("SELECT * FROM postes WHERE id_post='$id_post'");
	return $post;
}

function all_comments($id_post,$premier,$parPage){

	$bd = db_connect();
	$all_comments = $bd->query("SELECT * FROM commentaire WHERE id_post='$id_post' ORDER BY date_comment DESC LIMIT $premier,$parPage");

	return $all_comments;
}




function nbr_comments($id_post){

	$bd = db_connect();
	$nbr_comments = $bd->query("SELECT COUNT(*) as nbr FROM commentaire WHERE id_post='$id_post'");

	return $nbr_comments;
}

function profil($pseudo){
	$bd = db_connect();

	$profil = $bd->query("SELECT * FROM user WHERE pseudo='$pseudo'");
	return $profil;
}

function totalcomment($pseudo){
	$bd = db_connect();
	$totalcomment = $bd->query("SELECT COUNT(*) as totalcomment FROM commentaire WHERE author_comment='$pseudo' ");
	return $totalcomment;
}

function total_post($pseudo){
	$bd = db_connect();
	$totalpost = $bd->query("SELECT COUNT(*) as totalpost FROM postes WHERE auteur='$pseudo' ");
	return $totalpost;
}

function login_user($pseudo,$pass){

	$bd = db_connect();

	$pass = sha1($pass);

	$all_user = $bd->query("SELECT pseudo,mdp FROM user");

	while($rd_user = $all_user->fetch()){

		if($pseudo == $rd_user['pseudo'] && $pass == $rd_user['mdp']){
			return true;
		}
	}

}

function user_info($pseudo){
	$bd = db_connect();

	$user = $bd->query("SELECT * FROM user WHERE pseudo='$pseudo'");

	return $user;
}