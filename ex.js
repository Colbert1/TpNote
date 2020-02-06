function Time() {
    setTimeout(function () {
        console.log("Je suis là !")
    }, 5000);

    console.log("Où êtes-vous ?");
}

function ModifDiv() {
    document.getElementById('Root').innerHTML = 'Colbert';
}

function PleinModifDiv() {
    var i;
    var x = document.getElementsByName('Test');
    for (i = 0; i < 4; i++) {
        x[i].innerHTML = 'C';
    }
}
function getRandom() {
    fetch('ex.php').then((resp) => resp.json()).then(function (data) {
        console.log(data);
        UpdateDiv("JSJS", data[0]);
    })
        .catch(function (error) {
            console.log(error);
        });
}
function UpdateDiv(id, text) {
    var e = document.getElementById(id).innerHTML = text;
}