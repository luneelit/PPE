<?php 
	session_start();
	include('./Connection_BDD.php');
	$conn = getBdd('localhost', 'root', '');
	
		if(isset($_POST['formconnexion'])) {
   $userconnect= htmlspecialchars($_POST['userconnect']);
   $mdpconnect = $_POST['mdpconnect'];
   if(!empty($userconnect) AND !empty($mdpconnect)) {
	  $requser = $conn->prepare("select * from gsb_frais.utilisateur where login = ? and mdp = ?");
	  $requser->execute(array($userconnect, $mdpconnect));
	  $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         header("Location: profil.php");
      } else {
         $erreur = "Mauvais nom d'utilisateur ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
   
   $reponse = $conn->query( 'SELECT idr from utilisateur WHERE login="'.$_POST['userconnect'].'" AND mdp="'.$_POST['mdpconnect'].'"');
   $data = $reponse->fetch();
   $_SESSION['idr'] = $data['idr'];
   
   
}

?>

<html>
   <head>
      <title>Page de connexion</title>
      <meta charset="utf-8">
       <link rel="stylesheet" href="style.css" />
   </head>
   <body>
      <div id="container" align="center">
         <br /><br />
         <form method="POST" action="">
             <img src="images/bonsoir.png" />
             <br /><br />
             <h1>Connexion</h1>
             <input type="text" name="userconnect" placeholder="Nom d'utilisateur" />
             <input type="password" name="mdpconnect" placeholder="Mot de passe" />
             <br /><br />
             <input type="submit" name="formconnexion" value="Se connecter !" />
             <?php
             if(isset($erreur)) {
                 echo '<br /><br />'.'<font color="black">'.$erreur."</font>";
             }
             ?>
         </form>

      </div>
   </body>
</html>