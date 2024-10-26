<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaPlacas(false|string $placas)
{
    if ($placas === false) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Faltan las placas.",
            type: "/error/faltaplacas.html",
            detail: "La solicitud no tiene el valor de las placas."
        );
    }

    $trimPlacas = trim($placas);

    if ($trimPlacas === "") {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Placas en blanco.",
            type: "/error/placasenblanco.html",
            detail: "Pon texto en el campo placas."
        );
    }

    // Valida que las placas sigan el formato correcto (e.g., 3 letras seguidas de 3-4 números)
    if (!preg_match("/^[A-Z]{3}\d{3,4}$/", $trimPlacas)) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Formato de placas inválido.",
            type: "/error/formatoinvalido.html",
            detail: "El formato de las placas debe ser 3 letras en Mayusculas seguidas de 3 o 4 números."
        );
    }

    return $trimPlacas;
}
