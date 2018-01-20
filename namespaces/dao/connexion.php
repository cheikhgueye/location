
<?php


use PDO;

class connexion
{
    private $_login;
    private $_psw;
    private $bdd;

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

    public function log()
    {
        try {
            if ($this->bdd == null) {
                $this->bdd = new PDO('mysql:host=;dbname=BDlocation;charset=utf8', 'root', '774262278',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                $this->bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

                $sql = 'select * from utilsateur  left join roles on utilsateur.id_role=roles.id  WHERE login=:login and psw=:psw';
                $req = $this->bdd->prepare($sql);
                $req->execute(array(
                     'login' => $this->login,
                     'psw' => $this->psw,
                 ));

                $data = $req->fetch();

                $_SESSION['auth'] = $data;

                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function autorisation($rang)
    {
        try {
            if ($this->bdd == null) {
                $this->bdd = new PDO('mysql:host=;dbname=BDlocation;charset=utf8', 'root', '774262278',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                $this->bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $sql = 'select slug,level from roles ';
                $req = $this->bdd->prepare($sql);
                $req->execute();
                $data = $req->fetch();
                $role = array();

                if ($this->using('slug') != $rang) {
                    header('location:index1.php?p=forbiden');
                } else {
                    return true;
                }
            }
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function using($champ)
    {
        if (isset($_SESSION['auth']->$champ)) {
            return $_SESSION['auth']->$champ;
        } else {
            return false;
        }
    }
}
$auth = new connexion();
