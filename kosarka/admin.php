<?php
include 'inicijalizacija.php';
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
            <h2>Timovi 1.Ženske lige Srbije</h2>
            <p><a href="noviMec.php" class="btn btn-danger btn-lg">Novi mec <i class="fa fa-plus"></i></a>
            <a href="izmenaNaziva.php" class="btn btn-danger btn-lg">Izmena naziva <i class="fa fa-refresh"></i></a>

          </p>
            <hr class="bottom-line">


            <select id="timoviSelect" class="form-control" onchange="popuniTabelu()">
              <option value="0">----SVI MECEVI----</option>
              <?php
                   //ako je vrednost nula, onda prikazuje sve timove; ako nije, onda prikazuje tim koji smo selektovali 

              $timovi = $db->get('tim');
              foreach ($timovi as $t) {
                ?>
                        <option value="<?php echo ($t['TimID']); ?>"><?php echo ($t['NazivTima']); ?></option>
                      <?php

                    }
                    ?>
            </select>
            <div id="tabela"></div>
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
    <script>

      		function popuniTabelu(){

            var timID = $("#timoviSelect").val();
            // document.getElementById('timoviSelect').value
      			$.ajax({
      				url: "podaciSearch.php",
      				data: "id="+timID,
      				success: function(result){


      				var text = '<table class="table table-hover"><thead><tr><th>Mec</th><th>Rezultat</th><th>Grad</th><th>Brisanje</th></tr></thead><tbody>';

      				$.each($.parseJSON(result), function(i, val) {
                text += 
                `
                <tr class="text-left">
      					  <td>${val.domacin} - ${val.gost}</td>
      					  <td>${val.PoeniDomacin} : ${val.PoenaGosti}</td>
      					  <td>${val.grad}</td>
      					  <td><a teamId=${val.mecID} onclick="obrisiTim(this)">Obrisi</a></td>
                </tr>
                `;
      					});

      					text+='</tbody></table>';
                // $('#tabela').html(text);
                document.getElementById('tabela').innerHTML = text;
      			}});
      		}

      		function obrisiTim(element) {
                $.ajax({
                    url:"obrisi.php",
                    data: {
                        id : element.getAttribute('teamId')
                    },
                    success: function(data) {
                        popuniTabelu();
                    }
                })
            };

      </script>
      <script>
      		$( document ).ready(function() {
      			popuniTabelu();
      		});
      </script>
  </body>
</html>
