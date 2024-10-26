<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_VEHICULO.php";

ejecutaServicio(function () {

 $lista = select(pdo: Bd::pdo(),  from: VEHICULO,  orderBy: PAS_NOMBRE);

 $render = "";
 foreach ($lista as $modelo) {
  $encodeId = urlencode($modelo[PAS_ID]);
  $id = htmlentities($encodeId);
  $nombre = htmlentities($modelo[PAS_NOMBRE]);
  $numserie = htmlentities($modelo[PAS_NUMSERIE]);
  $placas = htmlentities($modelo[PAS_PLACAS]);
  $render .=
   "<li>
     <p>
      <a href='modifica.html?id=$id'>$nombre, $numserie, $placas</a>
     </p>
    </li>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
});
