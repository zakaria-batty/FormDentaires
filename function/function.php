<?php

// function for calculation of refund amount
function Montant()
{
    global $sum;
    // variables
    $Rbsmnt_CQ = 70 / 100;
    $Chirurgien_dentiste = 21;
    $stomatoloque8S1 = 28;
    $stomatoloque_S2 = 23;

    // Coditions for choosing doctors
    switch ($_POST['dents']) {
        case 'Chirurgien dentiste':
            $sum = $Chirurgien_dentiste * $Rbsmnt_CQ;
            break;
        case 'stomatoloque (secteur 1)':
            $sum = $stomatoloque8S1 * $Rbsmnt_CQ;
            break;
        case 'stomatoloque (secteur 2)':
            $sum = $stomatoloque_S2 * $Rbsmnt_CQ;
            break;
        default:
            break;
    }
    echo $sum . " €";
}
function Garantie()
{
    global $sum1;
    // variables
    $Garantie = isset($_POST['Garantie']) ? $_POST['Garantie'] : NULL;
    $Rbsmnt_CQ = 70 / 100;
    $Chirurgien_dentiste = 21;
    $stomatoloque8S1 = 28;
    $stomatoloque_S2 = 23;

    switch ($_POST['dents']) {
        case 'Chirurgien dentiste':
            $sum1 = $Chirurgien_dentiste * $Garantie / 100;
            break;
        case 'stomatoloque (secteur 1)':
            $sum1 = $stomatoloque8S1 * $Garantie / 100;
            break;
        case 'stomatoloque (secteur 2)':
            $sum1 = $stomatoloque_S2 * $Garantie / 100;
            break;
        default:
            break;
    }
    echo $sum1 . " €";
}

// function for calculation total
// function for calculation Rembourse
function Rembourse()
{
    global $sum;
    global $sum1;
    global $sum2;
    $tarif_conv = $_POST['tarif-convotion'];
    $Rembourse = $sum1 +  $sum;

    if ($Rembourse > $tarif_conv) :
        $sum2 = $tarif_conv;
    else :
        $sum2 = $Rembourse;
    endif;
    echo $sum2 . " €";;
}
// function for calculation Total
function Total()
{
    global $sum2;

    $tarif_conv = $_POST['tarif-convotion'];
    $sum3 = $tarif_conv - $sum2;
    echo $sum3 . " €";;
}
