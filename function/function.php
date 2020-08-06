<?php

// function for calculation of refund amount
function Montant()
{
    global $Montant;

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
            $Montant = $tarif_couronnes * $Rbsmnt_CQ *  $Nbr;
            break;
        case 'Bridge 3elements':
            $Montant = $tarif_bridge * $Rbsmnt_CQ *  $Nbr;
            break;
        case 'Appareil dentaire(1a3dents)':
            $Montant = $tarif_appareil * $Rbsmnt_CQ;
            break;
        case 'Appareil dentaire(14dents)':
            $Montant = $tarif_appareil14 * $Rbsmnt_CQ;
            break;
        case 'Travaux dorthodontie':
            if ($age > 16) :
                $Montant = $tarif_conv;
            else :
                $Montant = $tarif_travaux *  $Rbsmnt_CQ *  $Nbr;
            endif;
            break;
        default:
            break;
    }
    echo $Montant . " €";
}
function Garantie()
{
    global $Garantie_R;
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

    switch ($_POST['dents']) {
        case 'Couronnes':
            $Garantie_R = $tarif_couronnes * $Garantie / 100 *  $Nbr;
            break;
        case 'Bridge 3elements':
            $Garantie_R = $tarif_bridge * $Garantie / 100 *  $Nbr;
            break;
        case 'Appareil dentaire(1a3dents)':
            $Garantie_R = $tarif_appareil * $Garantie / 100;
            break;
        case 'Appareil dentaire(14dents)':
            $Garantie_R = $tarif_appareil14 * $Garantie / 100;
            break;
        case 'Travaux dorthodontie':
            // MyAge($Garantie);
            if ($age > 16) :
                $Garantie_R = $tarif_conv;
            else :
                $Garantie_R = $tarif_travaux *  $Garantie / 100  *  $Nbr;
            endif;
            break;
        default:
            break;
    }
    echo $Garantie_R . " €";
}

// function for calculation total
function Rembourse()
{
    global $Montant;
    global $Garantie_R;
    global $Rembourse_CQ;
    $tarif_conv = $_POST['tarif-convotion'];
    $Rembourse = $Montant +  $Garantie_R;

    if ($Rembourse > $tarif_conv) :
        $Rembourse_CQ = $tarif_conv;
    else :
        $Rembourse_CQ = $Rembourse;
    endif;
    echo $Rembourse_CQ;
}

function Total()
{
    global $Rembourse_CQ;

    $tarif_conv = $_POST['tarif-convotion'];
    $Total = $tarif_conv - $Rembourse_CQ;
    echo $Total;
}
