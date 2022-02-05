<?php
include 'inicijalizacija.php';

$poruka = '';
if (isset($_POST["unesi"])) {

  include("mecClass.php");
  $mec = new Mec($db);

  if ($mec->unesiMec()) {
    $poruka = 'Uspesno sacuvan mec';
  } else {
    $poruka = 'Greska pri cuvanju';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>1. Ženska liga Srbije</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

  </head>
  <body>
    <?php include 'navbar.php'; ?>


    <section id ="feature" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Timovi 1. Ženske lige Srbije</h2>
            <p><?php
              echo ($poruka);
              ?></p>
            <hr class="bottom-line">
            <form method="post" action="">

                <div class="form-group">
                  <label for="domacin" class="cols-sm-2 control-label">Domacin</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                      <select id="domacin" class="form-control" name="domacin" >
                        <?php
                        $sviTimovi = $db->get('tim');
                        foreach ($sviTimovi as $tim) {
                          ?>
                                  <option value="<?php echo ($tim['TimID']); ?>"><?php echo ($tim['NazivTima']); ?></option>
                                <?php

                              }
                              ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="gost" class="cols-sm-2 control-label">Gost</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                      <select id="gost" class="form-control" name="gost" >
                        <?php
                        $sviTimovi = $db->get('tim');
                        foreach ($sviTimovi as $tim) {
                          ?>
                                  <option value="<?php echo ($tim['TimID']); ?>"><?php echo ($tim['NazivTima']); ?></option>
                                <?php

                              }
                              ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="poenDom" class="cols-sm-2 control-label">Osvojeni poeni domacina</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                      <input type="number" class="form-control" name="poenDom" id="poenDom"  placeholder="Poeni domacin"/>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="poenGost" class="cols-sm-2 control-label">Osvojeni poeni gosta</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                      <input type="number" class="form-control" name="poenGost" id="poenGost"  placeholder="Poeni gost"/>
                    </div>
                  </div>
                </div>



                <div class="form-group ">
                  <button type="submit" name="unesi" id="button" class="btn btn-primary btn-lg btn-block login-button">Unesi mec</button>
                </div>

              </form>
          </div>
        </div>
      </div>
    </section>

    <?php include 'footer.php'; ?>



    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>

  </body>
</html>
