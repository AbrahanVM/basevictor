<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaNumSerie(false|string $numserie)
{

 if ($numserie === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el numero de serie.",
   type: "/error/faltanumserie.html",
   detail: "La solicitud no tiene el valor del numero de serie."
  );

 $trimNumserie = trim($numserie);

 if ($trimNumserie === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Numero de serie en blanco.",
   type: "/error/numserieenblanco.html",
   detail: "Pon texto en el campo numero de serie.",
  );

    // Validación de formato: 17 caracteres alfanuméricos, sin I, O, Q
    if (!preg_match("/^[A-HJ-NPR-Z0-9]{17}$/", $trimNumserie)) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Formato de número de serie inválido.",
            type: "/error/formato_invalido.html",
            detail: "El número de serie debe tener 17 caracteres alfanuméricos (Letras en Mausculas) sin incluir las letras I, O o Q."
        );
    }

    return $trimNumserie;
}
