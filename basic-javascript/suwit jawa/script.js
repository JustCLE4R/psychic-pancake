var lagi = true;
var userInput, compInput, result;

var suwit = ['gajah', 'orang', 'semut'];

while (lagi) {

    var error = 0;

    userInput = prompt('Masukan Pilihan: gajah, orang, semut').toLowerCase();

    compInput = suwit[Math.floor(Math.random() * 3)];

    if (userInput == compInput) {
        result = 'SERI! dengan Comp';
    }
    else if (userInput == 'gajah') {
        result = (compInput == 'orang') ? 'MENANG!' : 'KALAH!';
    }
    else if (userInput == 'orang') {
        result = (compInput == 'gajah') ? 'KALAH!' : 'MENANG!';
    }
    else if (userInput == 'semut') {
        result = (compInput == 'orang') ? 'KALAH!' : 'MENANG!';
    }
    else {
        error = 1;
    }

    if(error == 0){
        alert('User memilih ' + userInput.toUpperCase() + ' dan comp memilih ' + compInput.toUpperCase() + '\n\nKamu ' + result);
    }
    else{
        alert('Pilih yang ada-ada ajalah bosss!')
    }
    
    lagi = confirm('Main lagi?');
}