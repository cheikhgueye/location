<?php

         extract($_POST);

         include 'namespace/dao/utilisateur.php';
         use namespaces\dao\utilisateur;

         $u = new utilisateur();
       //  var_dump($u);
         $u->nom_comlet = $nomc;
         $u->login = $login;
         $u->tel = $tel;
         $u->pwrd = $pass;
         $u->id_role = $profil;
         $u->etat = $etat;

         $u->add();
        // $stmt = $db->prepare('...');
         //$stmt->execute();
