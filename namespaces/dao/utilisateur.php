<?php
 use PDO;

namespace namespaces\dao;

class utilisateur
{
    private $_id;
    private $_nom_comlet; //je sais que c est nomComplet mais j avais fait une faute de frappe sur ma base !!
    public $_login;
    public $_pwrd;
    private $_tel;
    private $_id_role;
    private $_etat;
    private $_npsw;
    private $_bdd;

    private function getConnexion()
    {
        try {
            if ($this->bdd == null) {
                $this->bdd = new PDO('mysql:host=;dbname=BDlocation;charset=utf8', 'root', '774262278',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function listeusers()
    {
        $this->getConnexion();
        // requete a executer
        $sql = 'select * from utilsateur';
        // preparation de la requete
        $donnees = $this->bdd->query($sql);

        return $donnees;
    }

    public function add()
    {
        try {
            if ($this->bdd == null) {
                $this->bdd = new PDO('mysql:host=;dbname=BDlocation;charset=utf8', 'root', '774262278',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                // requete a executer
                $sql = 'insert INTO utilsateur(nom_comlet, login, tel,psw,id_role,etat)
                  values(:nom_comlet, :login, :tel,:pwrd,:id_role,:etat)';
                // preparation de la requete
                $req = $this->bdd->prepare($sql);
                //execution de la requete
                $data = $req->execute(
            array('nom_comlet' => $this->nom_comlet,
                  'login' => $this->login,
                  'tel' => $this->tel,
                  'pwrd' => $this->pwrd,
                  'id_role' => $this->id_role,
                  'etat' => $this->etat,
                ));
                /*les gars on peut recuperer le dernier id puis
                je l utuserais pour le rediriger directement apres
                l inscription***signe kheuche****from zero to hero

                */
                $id = $this->bdd->lastInsertId();

                $sql = 'select * from utilsateur where id="'.$id.'"';
                $req = $this->bdd->query($sql);

                $info = $req->fetch();
                // var_dump($info['login']);il faut avoir l habitude de le faire pour verifier
                extract($_POST);
                //maintnant je le conduit directement vers sa page d accueil
                $auth = new connexion();
                $auth->login = $info['login'];
                $auth->psw = $info['psw'];
                $auth->log();

                if ($auth->using('slug') == 'client') {
                    header('location:index1.php?p=acclient');
                } elseif ($auth->using('slug') == 'agent') {
                    header('location:index1.php?p=acagent');
                } elseif ($auth->using('slug') == 'gerant') {
                    header('location:index1.php?p=acgerant');
                }

                return $data;
            }
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
            echo 'pas de connexion';
        }
    }

    public function logon()
    {
        try {
            if ($this->bdd == null) {
                $this->bdd = new PDO('mysql:host=;dbname=BDlocation;charset=utf8', 'root', '774262278',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $sql = 'select login ,psw from utilsateur where etat=1';
                $req = $this->bdd->query($sql);
                $info = $req->fetch();
                var_dump($info);

                if ($info['psw'] == $this->psw && $info['login'] == $this->login) {
                    return 'utilisateur';
                }
            }
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    // la fonction a_d_b alcati dou bayi dor permet  d activer ,de bloquer et de debloquer
    public function a_d_b()
    {
        try {
            if ($this->bdd == null) {
                $this->bdd = new PDO('mysql:host=;dbname=BDlocation;charset=utf8', 'root', '774262278',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                if ($this->etat == -1) {
                    $sql = 'UPDATE utilsateur SET etat = :e where etat=:et and id='.$this->id;
                    $query = $this->bdd->prepare($sql);

                    $query->execute(array(':e' => 1, ':et' => $this->etat));
                    echo 'utilisateur active';
                } elseif ($this->etat == 0) {
                    $sql = 'UPDATE utilsateur SET etat = 1 where etat=:et and id='.$this->id;
                    $query = $this->bdd->prepare($sql);

                    $query->execute(array(':et' => $this->etat));
                    echo 'utilisateur debloque ';
                } elseif ($this->etat == 1) {
                    $sql = 'UPDATE utilsateur SET etat = 0 where etat=:et and id='.$this->id;
                    $query = $this->bdd->prepare($sql);

                    $query->execute(array(':et' => $this->etat));
                    echo 'utilisateur bloque';
                }
            }
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    //kheuche***ch() permet de changer un mot de passe
    public function ch()
    {
        try {
            if ($this->bdd == null) {
                $this->bdd = new PDO('mysql:host=;dbname=BDlocation;charset=utf8', 'root', '774262278',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $sql = 'select login ,psw from utilsateur';
                $req = $this->bdd->query($sql);
                $info = $req->fetch();

                if ($info[1] == $this->psw && $info[0] == $this->login) {
                    $sql = 'UPDATE utilsateur SET psw = :ps where login=:lo';

                    $query = $this->bdd->prepare($sql);

                    $query->execute(array(':ps' => $this->npsw, ':lo' => $this->login));
                    echo 'vous avez changez votre mot de passe';
                }
            }
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}
