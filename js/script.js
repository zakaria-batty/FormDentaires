
const activitie = document.getElementById('activities');

activitie.addEventListener("change", function () {
    var displayText = activitie.options[activitie.selectedIndex].value;
    if (displayText == "Couronnes") {
        document.getElementById('Nbr').style.display = "block";
        document.getElementById('Nbr').setAttribute("placeholder", "Nbr de couronne");
        document.getElementById('Nbr').setAttribute("required", "required");
    }
    if (displayText == "Bridge 3elements") {
        document.getElementById('Nbr').style.display = "block";
        document.getElementById('Nbr').setAttribute("placeholder", "Nbre de Bridge");
    }
    if (displayText == "Travaux dorthodontie") {
        document.getElementById('Nbr').style.display = "block";
        document.getElementById('Nbr').setAttribute("placeholder", "Nbre de semestre");
    }
    if (displayText == "Appareil dentaire(1a3dents)" || displayText == "Appareil dentaire(14dents)") {
        document.getElementById('Nbr').style.display = "none";
        document.getElementById('Nbr').removeAttribute("required");
    }
});


