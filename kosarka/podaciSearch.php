<?php
include("inicijalizacija.php");
$timID = $_GET['id'];
if ($timID == 0) {
  $sql = "select d.NazivTima as domacin ,g.NazivTima as gost,m.PoeniDomacin,m.PoenaGosti,m.mecID,gr.Naziv as grad from mec m join tim d on m.domacinID=d.timID join tim g on m.gostID=g.timID join grad gr on d.gradID=gr.GradID ";

} else {
  $sql = "select d.NazivTima as domacin ,g.NazivTima as gost,m.PoeniDomacin,m.PoenaGosti,m.mecID,gr.Naziv as grad from mec m join tim d on m.domacinID=d.timID join tim g on m.gostID=g.timID join grad gr on d.gradID=gr.GradID where m.domacinID=" . $timID . " OR m.gostID=" . $timID;
//u elsu smo samo dodali plus where uslov
}

$mecevi = $db->rawQuery($sql);

echo (json_encode($mecevi));
