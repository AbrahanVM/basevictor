<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaNumSerie.php";
require_once __DIR__ . "/../lib/php/validaplaca.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_VEHICULO.php";

ejecutaServicio(function () {

 $nombre = recuperaTexto("nombre");
 $numserie = recuperaTexto("numserie");
 $placas = recuperaTexto("placas");
 $nombre = validaNombre($nombre);
 $numserie = validaNumSerie($numserie);
 $placas = validaPlacas($placas);


 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: VEHICULO, values: [PAS_NOMBRE => $nombre, PAS_NUMSERIE => $numserie, PAS_PLACAS => $placas]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/pasatiempo.php?id=$encodeId", [
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "numserie" => ["value" => $numserie],
  "placas" => ["value" => $placas],
 ]);
});
