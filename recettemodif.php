<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>recette facile</title>
  <meta name="description" content="facile ou pas ?">
</head>
<body><pre><?php

  // séparer ses identifiants et les protéger, une bonne habitude à prendre
  include "recette.dbconf.php";
  
  
  try {

    // instancie un objet $connexion à partir de la classe PDO
$connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
// Requête de modification
$requete = "UPDATE `recettes`
            SET `recette_titre` = :recette_titre
            WHERE `recette_id` = :recette_id";
$prepare = $connexion->prepare($requete);
$prepare->execute(array(
    ":recette_id"   => 4,
    ":recette_titre" => "🤠 Tagliatelles Maison sans machine 🤠"
));
$requete ="UPDATE `assoc_hashtags_recettes`
            SET `assoc_hr_hashtag_id`= :assoc_hr_hashtag_id
            WHERE `assoc_hr_id` = :assoc_hr_id";
            $prepare = $connexion->prepare($requete);
            $prepare->execute(array(
                ":assoc_hr_id"   => 1,
                ":assoc_hr_hashtag_id" => 5
));
$resultat = $prepare->rowCount();
print_r([$requete, $resultat]); // debug & vérification



//Requête de suppression
$requete = "DELETE FROM `recettes`
            WHERE ((`recette_id` = :recette_id));";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
        ":recette_id"   => 5
)); 
$resultat = $prepare->rowCount();
print_r([$requete, $resultat]); // debug & vérification


} catch (PDOException $e) {

    // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
    exit("❌🙀💀 OOPS :\n" . $e->getMessage());

  }

?></pre></body>
</html>