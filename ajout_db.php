<?php
/*
 Requête HTTP Post 
*/
// tableau de réponse JSON (array)
	$reponse = array();
// tester si les champs sont valides
	if (isset($_POST['col2'])) {
		$valeur_col2 = $_POST['col2'];;
// inclure la classe de connexion
		require_once __DIR__ . '/connexion.php';
// connxion à la base
		$db = new CONNEXION_DB ();
// requéte pour insérer les données
		$resultat = mysql_query("INSERT INTO synthese(note_synthese) VALUES('$valeur_col2'");
// tester si les données sont bien insérées
		if ($resultat) {
// Données bien insérées
			$reponse["success"] = 1;
			$reponse["message"] = "Données bien insérées";
// afficher la reponse JSON
			echo json_encode($reponse);
		} else {
// errur d'insertion
			$reponse["success"] = 0;
			$reponse["message"] = "Oops! Erreur d'insrtion.";
// afficher la réponse JSON
			echo json_encode($reponse);
		}
	} else {
// Champ(s) manquant(s)
		$reponse["success"] = 0;
		$reponse["message"] = "Champ(s) manquant(s)";
// afficher la réponse JSON
		echo json_encode($reponse);
	}
?>

