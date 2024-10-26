<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:srvbd.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

  //  self::$pdo->exec("DROP TABLE IF EXISTS PASATIEMPO");

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS VEHICULO (
      PAS_ID INTEGER,
      PAS_NOMBRE TEXT NOT NULL,
      PAS_NUMSERIE TEXT NOT NULL,
      PAS_PLACAS TEXT NOT NULL,

      CONSTRAINT PAS_PK
       PRIMARY KEY(PAS_ID),

      CONSTRAINT PAS_NOM_UNQ
       UNIQUE(PAS_NOMBRE),

      CONSTRAINT PAS_NOM_NV
       CHECK(LENGTH(PAS_NOMBRE) > 0),
       
      CONSTRAINT PAS_NUMSER_NV
       CHECK(LENGTH(PAS_NUMSERIE) > 0),
       
      CONSTRAINT PAS_PLACAS_NV
       CHECK(LENGTH(PAS_PLACAS) > 0)
     )"
   );
  }

  return self::$pdo;
 }
}
