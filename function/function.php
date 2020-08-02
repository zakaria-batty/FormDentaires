<?php

// function for calculation of refund amount
function Montant()
{
    global $sum;
    // A function for calculating age
    $date = $_POST['date-naissance'];
    $today = date("d-m-Y");
    $diff = date_diff(date_create($date), date_create($today));
    $age = $diff->format('%y');
    // variables
    $Rbsmnt_CQ = 70 / 100;
    $tarif_conv = $_POST['tarif-convotion'];
    $tarif_couronnes = 107.5;
    $tarif_bridge = 279.5;
    $tarif_appareil = 64.5;
    $tarif_appareil14 = 182.5;
    $tarif_travaux = 193.5;
    $Nbr = isset($_POST['nbr']) ? $_POST['nbr'] : NULL;


    // Coditions for choosing doctors
    switch ($_POST['dents']) {
        case 'Couronnes':
            $sum = $tarif_couronnes * $Rbsmnt_CQ *  $Nbr;
            break;
        case 'Bridge 3elements':
            $sum = $tarif_bridge * $Rbsmnt_CQ *  $Nbr;
            break;
        case 'Appareil dentaire(1a3dents)':
            $sum = $tarif_appareil * $Rbsmnt_CQ;
            break;
        case 'Appareil dentaire(14dents)':
            $sum = $tarif_appareil14 * $Rbsmnt_CQ;
            break;
        case 'Travaux dorthodontie':
            if ($age > 16) :
                $sum = $tarif_travaux * $Rbsmnt_CQ *  $Nbr;
            else :
                $sum = $tarif_conv;
            endif;
            break;
        default:
            break;
    }
    // condition();
    echo $sum . " €";
    // var_dump($_POST);
}
function Garantie()
{
    // A function for calculating age
    $date = $_POST['date-naissance'];
    $today = date("d-m-Y");
    $diff = date_diff(date_create($date), date_create($today));
    $age = $diff->format('%y');
    // variables
    $Garantie = isset($_POST['Garantie']) ? $_POST['Garantie'] : NULL;
    $tarif_conv = $_POST['tarif-convotion'];
    $tarif_couronnes = 107.5;
    $tarif_bridge = 279.5;
    $tarif_appareil = 64.5;
    $tarif_appareil14 = 182.5;
    $tarif_travaux = 193.5;
    $Nbr = isset($_POST['nbr']) ? $_POST['nbr'] : NULL;

    switch (isset($_POST['Garantie'])) {
        case 'Couronnes':
            $sum = $tarif_couronnes * $Garantie / 100 *  $Nbr;
            break;
        case 'Bridge 3elements':
            $sum = $tarif_bridge * $Garantie / 100 *  $Nbr;
            break;
        case 'Appareil dentaire(1a3dents)':
            $sum = $tarif_appareil * $Garantie / 100;
            break;
        case 'Appareil dentaire(14dents)':
            $sum = $tarif_appareil14 * $Garantie / 100;
            break;
        case 'Travaux dorthodontie':
            if ($age > 16) :
                $sum = $tarif_travaux *  $Garantie / 100 *  $Nbr;
            else :
                $sum = $tarif_conv;
            endif;
            break;
        default:
            break;
    }
    echo $sum . " €";
}

// function for calculation total
function total()
{
    $Garantie = isset($_POST['Garantie']) ? $_POST['Garantie'] : NULL;
    $tarif_conv = $_POST['tarif-convotion'];
    $sum1 = $tarif_conv +  $Garantie;

    if ($sum1 <  $tarif_conv) :
        echo  $tarif_conv;
    else :
        echo $sum1;
    endif;
}
