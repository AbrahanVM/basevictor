<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_VEHICULO.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");
 $numserie = recuperaTexto("numserie");
 $placas = recuperaTexto("placas");
 $nombre = validaNombre($nombre);

 update(
  pdo: Bd::pdo(),
  table: VEHICULO,
  set: [PAS_NOMBRE => $nombre, PAS_NUMSERIE => $numserie, PAS_PLACAS => $placas],
  where: [PAS_ID => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "numserie" => ["value" => $numserie],
  "placas" => ["value" => $placas],
 ]);
});
