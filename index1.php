<?php

//ne touchez pas ce script c est le fichier carrefour
   session_start();
   try {
       $PDO = new PDO('mysql:host=localhost;dbname=BDlocation;charset=utf8', 'root', '774262278');
       $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
       $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

       require_once 'namespaces/dao/connexion.php';

       $auth = new connexion();

       ob_start();
       include(isset($_GET['p']) ? $_GET['p'] : 'authentification').'.php';
   } catch (Exception $e) {
       die('Erreur : '.$e->getMessage());
   }
