<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/style.css">
    <title>formulaire</title>
</head>

<body>
    <section class="content">
        <div class="nav-content">


            <?php
            if (isset($_POST["Nom"])) {
                include("./function/function.php");
            ?>
                <article class="box affiche">
                    <div class="content">
                        <table class="table">
                            <tr>
                                <th class="th">Remboursement CQ</th>
                                <th class="th">Garantie</th>
                                <th class="th">Montant Remboursé</th>
                                <th class="th">Total</th>
                            </tr>
                            <tr>
                                <td class="td"><?php Montant(); ?></td>
                                <td class="td"><?php if ($_POST['Garantie']) : Garantie();
                                                else : echo  0 . ' €';
                                                endif; ?></td>
                                <td class="td"><?php if ($_POST['Garantie']) : echo Rembourse() . ' €';
                                                else : echo  0 . ' €';
                                                endif; ?></td>
                                <td class="td"><?php if ($_POST['Garantie']) : echo Total() . ' €';
                                                else : echo  0 . ' €';
                                                endif; ?></td>
                            </tr>
                        </table>
                    </div>
                </article>
            <?php
            } else {
            ?>
                <article class="block">
                    <!-- formulaire -->
                    <form class="formulaire" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

                        <!-- Section formule -->
                        <div class="formule">
                            <div class="les-input">
                                <input class="input" type="text" name="Nom" placeholder="Nom*" required>
                            </div>
                            <div class="les-input">
                                <input class="input" type="text" name="Prenom" placeholder="Prénom*" required>
                            </div>
                            <div class="les-input">
                                <input class="input" type="number" name="Telephone" placeholder="Téléphone*" required>
                            </div>
                            <div class="les-input">
                                <input class="input" type="text" name="Email" placeholder="Email*" required>
                            </div>
                        </div>

                        <!--  section-question -->
                        <div class="sect-choices">
                            <div class="questions">
                                <div class="formule">
                                    <div class="les-input" id="">
                                        <select class="input" name="dents" id="activities" style=" width: 217px;">
                                            <option value="">Travaux dentaire</option>
                                            <option value="Couronnes">Couronnes</option>
                                            <option value="Bridge 3elements">Bridge 3elements</option>
                                            <option value="Appareil dentaire(1a3dents)">Appareil dentaire (1 a 3 dents)</option>
                                            <option value="Appareil dentaire(14dents)">Appareil dentaire ( 14 dents)</option>
                                            <option value="Travaux dorthodontie">Travaux d'orthodontie</option>
                                        </select>
                                    </div>
                                    <div class="les-input" id="tarif">
                                        <input class="input" type="number" name="tarif-convotion" placeholder="tarif consultation*" required style="position: relative; right:5px;">
                                    </div>
                                    <div class="les-input">
                                        <select class="input" name="Garantie" id="" placeholder="" style=" width: 217px; position: relative; top: 30px;">
                                            <option value="">Garantie</option>
                                            <option value="100">100%</option>
                                            <option value="125">125%</option>
                                            <option value="150">150%</option>
                                            <option value="150">175%</option>
                                            <option value="200">200%</option>
                                            <option value="250">250%</option>
                                            <option value="300">300%</option>
                                            <option value="400">400%</option>
                                        </select>
                                    </div>
                                    <div class="les-input">
                                        <label class="label" for="date_début">Date de naissance*</label><br>
                                        <input class="input" type="date" name="date-naissance" style=" width: 204px; height: 19px; position:relative; right:5px;" required>
                                    </div>
                                    <div class="les-input">
                                        <input class="input" type="text" id="Nbr" name="nbr" style="display: none;">
                                    </div>
                                </div>
                            </div>

                            <div class="button">
                                <button class="btn" type="submit" name="comparer">Calculer le montant de remboursement</button>
                            </div>

                    </form>
                <?php } ?>
                </article>
        </div>
    </section>
    <script src="js/script.js"></script>

</body>

</html>