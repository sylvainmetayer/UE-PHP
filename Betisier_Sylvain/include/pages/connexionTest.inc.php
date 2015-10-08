<?php
$pdo = new Mypdo ();
$personneManager = new PersonneManager ( $pdo );

var_dump($_POST);
if (empty ( $_POST ['per_login'] ) || empty ( $_POST ['per_pwd'] ) || empty ( $_POST ['reponse'] )) {
  // choix aléatoires des deux nombres pour le captcha
  $nb1 = rand ( 1, 9 );
  $nb2 = rand ( 1, 9 );
  $_SESSION['reponseCaptcha'] = $nb1 + $nb2;
	?>
    <h1>Pour vous connecter</h1>

    <form action="#" name="form" method="post">
    	<label for='per_login'>Login : </label>
      <input type="text" name="per_login" id="per_login">

      <br />
      <label for='per_pwd'> Mot de passe : </label>
      <input type="password" name="per_pwd" id="per_pwd">
      <br />

    	<p class="captcha">
    	   <img	src="image/nb/<?php echo $nb1 ?>.jpg" alt='numero' />
         +
         <img src="image/nb/<?php echo $nb2 ?>.jpg" alt='numero' />
         =
         <input type="text" name="reponse" />
      </p>

       <input type="submit" value="Connexion" />
    </form>
    <?php
} else {

    if (isset($_SESSION['reponseCaptcha'])) {
      $resultat = $_SESSION['reponseCaptcha']; // resultat attendu.
    } else {
      $resultat = '';
    }

  	$reponseUser = $_POST ['reponse']; // réponse utilisateur

    echo "<br/>DEBUG reponseCaptcha : ".$resultat." // Reponse user : ".$reponseUser."<br/>";

    // détails de la connexion + verification connexion autorisée
  	$login = $_POST ['per_login'];
  	$pwd = $_POST ['per_pwd'];
  	$connexionOK = $personneManager->isConnexionAutorisee ( $login, (sha1 ( sha1 ( $pwd ) . GRAIN_SEL )) );
    echo " USER AUTORISE ?".$connexionOK."<br/>";


  	if ($reponseUser != $resultat) {
      // captcha incorrect
  		?>
      <img src="image/erreur.png" alt='erreur' />
      <strong>Le captcha est incorrect</strong>
      <br />
      <a href="index.php?page=<?php echo CONNEXION; ?>">Reessayer ? <br />
      </a>
      <?php
  		$captcha = false;

      if (isset ($_SESSION['reponseCaptcha'])) {
        //pour éviter des erreurs.
        unset($_SESSION['reponseCaptcha']);
      }
  	} else {
  		$captcha = true;
  		// le captcha est correct

      if ($connexionOK == false) {
        // mauvais mot de passe/identifiant
    		?>
        <p>
          <img src="image/erreur.png" alt='erreur' />
          Erreur d'identifiant / mot de passe <br />
          <strong><a href="index.php?page=<?php echo CONNEXION; ?>">Reessayer ?</a>
        </p>
        <?php
    	 }

       if (($connexionOK == true) && $captcha == true) {
          // le captcha est bon et les id/mdp aussi
          $personneConnecte = $personneManager->getPersonneByLogin($_POST ['per_login']);
      		$_SESSION['personneConnectee'] = $personneConnecte;
          unset($_SESSION['reponseCaptcha']); //on a plus besoin du captcha
      		echo "DEBUG ";
          var_dump($_SESSION['personneConnectee']);
      		?>
      		<p> Vous avez bien &eacute;t&eacute; connect&eacute; ! Redirection dans 2 secondes.. </p>
          <!-- TODO compteur js ?
      		<META HTTP-EQUIV="Refresh" CONTENT="2;URL=index.php"> -->
      		<?php
      }
  	}


}
?>
