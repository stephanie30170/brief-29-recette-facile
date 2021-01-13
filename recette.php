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

    // Requête de sélection 01
    /*$requete = "SELECT * FROM `recettes`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute();
    $resultat = $prepare->fetchAll();
    print_r([$requete, $resultat]);*/ // debug & vérification
    $requete = 'SELECT * FROM `assoc_hashtags_recettes` WHERE `assoc_hr_hashtag_id` = "1"';
    $prepare = $connexion->prepare($requete);
    $prepare->execute();
    $resultat = $prepare->fetchAll();
    print_r([$requete, $resultat]);
    $requete = 'SELECT recette_titre FROM assoc_hashtags_recettes JOIN hashtags ON hashtag_id = assoc_hr_hashtag_id JOIN recettes ON recette_id = assoc_hr_recette_id WHERE hashtag_id = "1"';
    $prepare = $connexion->prepare($requete);
    $prepare->execute();
    $resultat = $prepare->fetchAll();
    print_r([$requete, $resultat]);

    // Requête d'insertion
    /*$requete = "INSERT INTO `recettes` (`recette_titre`, `recette_contenu`,`recette_datetime`)
                VALUES (:recette_name, :recette_contenu, :recette_datetime);";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":recette_name" => "Tagliatelles Maison sans machine",
      ":recette_contenu" => "## Ingrédinets :
      - 400gr de Farine
      - 1/2 c-à-c de fleur de sel
      - 4 oeufs
      - 30 ml d'huile d'olive
      - un peu d'eau 
      
      ##INSTRUCTIONS
      1 - La règle de base c’est : 1 oeuf pour 100g de farine.
      2 - Mélanger la farine et le sel dans un grand saladier.
      3 - Former un trou au milieu de la farine et y casser les oeufs, 
      puis verser l’huile d’olive. Avec une fourchette, remuez un peu 
      les oeufs pour casser les jaunes et les mélanger à l’huile. 
      Ensuite, toujours en vous servant de la fourchette, 
      ramener un peu de farine qui est sur les bords dans les oeufs et mélanger. 
      Incorporez comme ça doucement la farine jusqu’à ce que le mélange commence 
      à devenir de la pâte, puis finir d’incorporer avec les mains.
      Si vous avez du mal à incorporer toute la farine, ajoutez un 
      tout petit peu d’eau et continuez.
      4 - Une fois que la pâte forme une belle boule, pétrissez la avec vos mains 
      pendant 10min non-stop.
      5 - La pâte va commencer à devenir élastique sous vos doigts, c’est parfait ! 
      Ensuite, mettez la dans un bol propre, recouverte d’un linge propre et humide, 
      et laissez la reposer 1h au frigo.
      6 - Disposer un torchon propre et sec sur une surface plane. 
      Cela servira pour faire sécher les tagliatelles. Ensuite, couper la boule de pâte en 2.
      Farinez légèrement votre plan de travail et étalez la pâte très finement à l’aide 
      d’un rouleau à pâtisserie. Normalement la pâte doit être bien élastique. Si possible, 
      essayer de former un ovale bien allongé. Ce sera plus simple pour la prochaine étape.
      7 - Une fois que la pâte est bien fine (ce sera l’épaisseur de vos tagliatelles), 
      pliez la en “éventail” en commençant par un des petits côté du oval.
      8 - Puis, à l’aide d’un couteau couper des lamelles (de la largeur souhaitée pour vos tagliatelles).
      Défaites les rubans de tagliatelles, et mettez les à sécher sur le torchon. 
      Attention, elle sèchent relativement vite, donc elle garderont la forme que vous 
      leur donnez à ce moment (pensez à quand vous les mettrez à cuire !).
      9 - Réitérez toutes ces étapes avec le 2e paton.
      10 - Laissez les tagliatelles sécher une bonne demi-heure.
      11 - Finalement, pour les faire cuire, faites bouillir un grand volume d’eau avec un peu 
      de sel et mettez-y les tagliatelles. La cuisson est rapide. Une fois que les tagliatelles 
      remontent à la surface, sortez en une pour tester la cuisson. Quand vous êtes satisfaits, 
      égouttez les ! Et voilà !
      ",
      ":recette_datetime" => date('Y-m-d H:i:s'),
    ));
    $requete = "INSERT INTO `hashtags` (`hashtag_nom`)
                VALUES (:hashtag_nom);";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":hashtag_nom" => "levain"
    ));*/
    /*$requete = "INSERT INTO `assoc_hashtags_recettes` (`assoc_hr_hashtag_id`, `assoc_hr_recette_id`)
                VALUES (:assoc_hr_hashtag_id, :assoc_hr_recette_id);";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":assoc_hr_hashtag_id" => "1",
      ":assoc_hr_recette_id" => "1"

    )); 
    $resultat = $prepare->rowCount(); // rowCount() voir le nbre d'entrée (rangé)dans ta requete nécessite PDO::MYSQL_ATTR_FOUND_ROWS => true
    $lastInsertedEpisodeId = $connexion->lastInsertId(); // on récupère l'id automatiquement créé par SQL
    print_r([$requete, $resultat, $lastInsertedEpisodeId]); // debug & vérification*/
    
} catch (PDOException $e) {

    // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
    exit("❌🙀💀 OOPS :\n" . $e->getMessage());

  }

?></pre></body>
</html>