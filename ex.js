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