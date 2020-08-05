<?php

function MyAge($value)
{
    // A function for calculating age
    $date = $_POST['date-naissance'];
    $today = date("d-m-Y");
    $diff = date_diff(date_create($date), date_create($today));
    $age = $diff->format('%y');
    // variables
    $Nbr = isset($_POST['nbr']) ? $_POST['nbr'] : NULL;
    // $Garantie = isset($_POST['Garantie']) ? $_POST['Garantie'] : NULL;
    $tarif_conv = $_POST['tarif-convotion'];
    $tarif_travaux = 193.5;

    if ($age > 16) :
        $sum1 = $tarif_conv;
    else :
        $sum1 = $tarif_travaux *  $value *  $Nbr;
    endif;

    echo  $sum1;
}
// function for calculation of refund amount
function Montant()
{
    global $sum;

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
            MyAge($Rbsmnt_CQ);
            break;
        default:
            break;
    }
    echo $sum . " €";
}
function Garantie()
{
    global $sum1;
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
    $tarif_travaux = 193.5 / 100;
    $Nbr = isset($_POST['nbr']) ? $_POST['nbr'] : NULL;

    switch ($_POST['dents']) {
        case 'Couronnes':
            $sum1 = $tarif_couronnes * $Garantie / 100 *  $Nbr;
            break;
        case 'Bridge 3elements':
            $sum1 = $tarif_bridge * $Garantie / 100 *  $Nbr;
            break;
        case 'Appareil dentaire(1a3dents)':
            $sum1 = $tarif_appareil * $Garantie / 100;
            break;
        case 'Appareil dentaire(14dents)':
            $sum1 = $tarif_appareil14 * $Garantie / 100;
            break;
        case 'Travaux dorthodontie':
            MyAge($Garantie);
            // if ($age > 16) :
            //     $sum1 = $tarif_conv;
            // else :
            //     $sum1 = $tarif_travaux *  $Garantie  *  $Nbr;
            // endif;
            break;
        default:
            break;
    }
    echo $sum1 . " €";
}

// function for calculation total
function Rembourse()
{
    global $sum;
    global $sum1;
    global $sum2;
    $tarif_conv = $_POST['tarif-convotion'];
    $Rembourse = $sum +  $sum1;

    if ($Rembourse > $tarif_conv) :
        $sum2 = $tarif_conv;
    else :
        $sum2 = $Rembourse;
    endif;
    echo $sum2;
}

function Total()
{
    global $sum2;

    $tarif_conv = $_POST['tarif-convotion'];
    $sum3 = $tarif_conv - $sum2;
    echo $sum3;
}
