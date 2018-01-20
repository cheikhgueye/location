<?php 
      if (!empty($_POST)) {
          extract($_POST);
          $auth = new connexion();
          $auth->login = $login;
          $auth->psw = $pwrd;
          var_dump($auth);
          if ($login == '') {
              header('location:index1.php?p=authentification&amp e=1');
          } elseif ($pwrd == '') {
              header('location:index1.php?p=authentification&amp e=2');
          } elseif ($auth->log()) {
              if ($auth->using('slug') == 'admin') {
                  header('location:index1.php?p=acadmin');
              } elseif ($auth->using('slug') == 'agent') {
                  header('location:index1.php?p=acagent');
              } elseif ($auth->using('slug') == 'gerant') {
                  header('location:index1.php?p=acgerant');
              }
          } else {
              echo 'mauvais identifiant';
          }
      }
      ?>
      <!doctype html>
      <html lang="en">
        <head>
          <title>Title</title>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="style.css">
      
          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        </head>
        <body>
       
  <div class="header">
    <div class="row">
        <div class="col-md-4">
            <h1>KHEUCHE from zero to hero</h1>
        </div>
        <div class="col-md-4" id="col-md-4">
            <a href="#">Services</a>
            <a href="#">Propositions</a>
            <a href="#">Contact</a>
        </div>
    </div>
    
</div>
<div class="container">
    <div class="inner">
        <h1></h1>
               

       
<div class="alert alert-danger alr">
    
  <strong>Danger!</strong><?php 
  echo $_GET['e'];
  if ($_GET['e'] == 1) {
      echo 'LE LOGIN EST OBLIGATOIRE';
  } elseif ($_GET['e'] == 2) {
      echo 'LE MOT DE PASSE EST OBLIGATOIRE';
  }
       ?>
</div>
        
        <form action="index1.php?p=authentification" method="post">
            <lagend>authentifiez-vouz</lagend><br>
            <label><span class="glyphicon glyphicon-user"></span></label>
            <input type="text" placeholder='Username' class="input" name="login" id="login" val-champ="login"/><br>
            <label><span class="glyphicon glyphicon-lock"></span></label>
            <input type="password" placeholder="password" class="input" name="pwrd"  id="pass" val-champ="mot da passe"/><br>
            <input type="submit" name="connexion" value="connexion" class="button"><br>
            <a href="#" type="button" class="s" data-toggle="modal" data-target="#modalContactForm">
            s'inscrire
</a>            
        </form>
        
    </div>    
</div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
         <script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</div>   <script src="script.js"></script>
    
    <!--Modal: Contact form-->
    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">
    
                <!--Header-->
                <div class="modal-header light-blue darken-3 white-text">
                    <h4 class="title"><i class="fa fa-pencil"></i> Contact form</h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body mb-0">
                    <form action="index1.php?p=inscrire" method="post">
                    <div class="md-form form-sm">
                    <label for="form19">Nom complet</label>
                        <i class="fa fa-envelope prefix"></i>
                        <input type="text" id="form19" class="form-control " name="nomc">
                      
                    </div>
    
                    <div class="md-form form-sm">
                    <label for="form20">login</label>
                        <i class="fa fa-lock prefix"></i>
                        <input type="text" id="form20" class="form-control" name="login">
                       
                    </div>
    
                    <div class="md-form form-sm">
                    <label for="form21">tel</label>
                        <i class="fa fa-tag prefix"></i>
                        <input type="number" id="form21" class="form-control" name="tel">
                       
                    </div>

                    <div class="md-form form-sm">
                    <label for="form21">Mot de passe</label>
                        <i class="fa fa-tag prefix"></i>
                        <input type="password" id="form21" class="form-control" name="pass">
                       
                    </div>

                    <div class="md-form form-sm">
                    <label for="form21">profil</label>
                        <i class="fa fa-tag prefix"></i>
                        <select  id="form21" class="form-control" name="profil" >
                             <option value=""></option>
                            <option value="2">agent</option>
                            <option value="3">gerant</option>
                            <option value="4">client</option>
                            <option value="5">proprietaire</option>
                           </select>
                       
                    </div>


                    <div class="md-form form-sm etat">
                        <i class="fa fa-tag prefix"></i> 
                        <input type="text" id="form21" class="form-control " value="-1" readonly  name="etat">
                        <label for="form21"></label>
                    </div>
    
                    
                    <div class="text-center mt-1-half">
                    <i class="fa fa-send ml-1"></i> <input type="submit"  class="btn" value="valider">
                    </div>
                    </form>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Contact form-->
       <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       <script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</div>   <script src="script.js"></script>
          </body>
          </html>
<style>
   .x{
        z-index: 0;
    }
    bod{height: 1000px;}
.container{background:url('http://nextlawgroup.com/wp-content/uploads/2013/07/Facebook-World-Network-HD-Wallpaper.jpg') center; width: 100%;}
.col-md-4 h1{ color : #9f00a7; font-family: calibri, arial; font-weight: bold; font-size: 30px; position: relative; left: 30px;} 
.header{background: white; width : 100%; }
.header a{color: rgb(100,100,100); padding: 20px; position: relative; top : 30px;font-family: calibri, arial;font-weight: 900;  }
#col-md-4{ height: 50px;}
.header a:hover{ transition-duration: 0.3s; color: rgb(0,0,0); }

/*container design*/
.control-label{float: left;}
.container .inner{width: 480px; margin: 100px auto; border : 1px solid none; background: rgba(55,55,55, 0.4); padding: 10px; -webkit-transform: skew(30deg,10deg);-moz-transform: skew(30deg,10deg); -o-transform: skew(30deg,10deg); transition-duration: 0.7s;}
.container .inner:hover{-webkit-transform:skew(0deg,0deg); -moz-transform:skew(0deg,0deg);-o-transform:skew(0deg,0deg);transition-duration: 0.7s; background: transparent;}
.inner h1{color : rgb(200,200,200); font-family: calibri, arial; font-weight: bold; text-align: center; font-size: 40px}
.inner h3{color: rgb(200,200,200); font-size: 18px; font-family: calibri; text-align: center; margin-top: -5px}
.inner form label span{color: white;}
.inner form lagend{color: white;}
.inner .input{width : 90%; border: none; border-bottom: 1px solid white; color: #9f00a7; background: transparent; padding: 10px;}
.inner .input:focus{box-shadow: none; border: 1px solid none;}
.container hr{border-color: rgb(100,100,100);}
.inner .button{border-radius:10px 10px 10px 10px;color: #9f00a7; background: rgba(50,50,50, 0.4); padding: 2px 30px ;  border: 2px solid #9f00a7;  font-family: calibri; margin:10px auto; font-weight: bold;}
.inner .button:hover{background: #8f00a7; color: white;}
.alr{
    color: #FF0000;
}
.s{
    color: white;
}
/*////////////////*/
col-md-4@import url(http://fonts.googleapis.com/css?family=Roboto);

/****** LOGIN MODAL ******/
.loginmodal-container {
  padding: 30px;
  max-width: 350px;
  width: 100% !important;
  background-color: #F7F7F7;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  font-family: roboto;
}

.loginmodal-container h1 {
  text-align: center;
  font-size: 1.8em;
  font-family: roboto;
}

.loginmodal-container input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.loginmodal-container input[type=text], input[type=password] {
  height: 44px;
  font-size: 16px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */ 
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.loginmodal-container input[type=text]:hover, input[type=password]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.loginmodal {
  text-align: center;
  font-size: 14px;
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
/* border-radius: 3px; */
/* -webkit-user-select: none;
  user-select: none; */
}

.loginmodal-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #4d90fe;
  padding: 17px 0px;
  font-family: roboto;
  font-size: 14px;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.loginmodal-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.loginmodal-container a {
  text-decoration: none;
  color: #666;
  font-weight: 400;
  text-align: center;
  display: inline-block;
  opacity: 0.6;
  transition: opacity ease 0.5s;
} 

.login-help{
  font-size: 12px;
}

</style>
