
// const activities = document.getElementById('activities');

function selectOption() {
    var d = document.getElementById('activities');
    var displayText = d.options[d.selectedIndex].value;
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
    if (displayText == "Appareil dentaire(1a3dents)" || displayText == "Appareil dentaire(14dents)" ) {
        document.getElementById('Nbr').style.display = "none";
        document.getElementById('Nbr').removeAttribute("required");
    } 
}

// activities.addEventListener("change", function () {
//     if (activities.value == "Couronnes") {
//         document.getElementById('Nbr').style.display = "block";
//     } else if (activities.value == "Bridge 3elements") {
//         document.getElementById('Nbr').style.display = "block";
//     } else if (activities.value == "Travaux dorthodontie") {
//         document.getElementById('Nbr').style.display = "block";
//     } else if (activities.value == "Appareil dentaire(1a3dents)") {
//         document.getElementById('Nbr').style.display = "none";
//     } else if (activities.value == "Appareil dentaire(14dents)") {
//         document.getElementById('Nbr').style.display = "none";
//     }else{

//     }

// });

