setTimeout(function () {
    console.log("Bienvenue")
}, 5000);

console.log("Qui êtes-vous ?");

function ModifDiv{
    var newDiv = "Coucou c'est le nouveau moi";
    document.getElementById('Root').innerHTML = newDiv; 
    alert (newDiv);
}
