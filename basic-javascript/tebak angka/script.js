var userInput, angka, percobaan = 3;
var lagi = true, benar = false;

angka = Math.floor(Math.random() * 10) + 1;

userInput = prompt('Tebak angka 1-10:');

while (lagi) {

    if (userInput > angka) {
        percobaan--;
        userInput = prompt('Terlalu tinggi, coba lebih rendah.\nPercobaan tersisa: ' + percobaan + '\n1-10');
    }
    else if (userInput < angka) {
        percobaan--;
        userInput = prompt('Terlalu rendah, coba lebih tinggi.\nPercobaan tersisa: ' + percobaan + '\n1-10');
    }
    else {
        percobaan--;
        userInput = prompt('Tebak pake angka bosss.\nPercobaan tersisa: ' + percobaan + '\n1-10');
    }

    if (userInput == angka) {
        alert('Selamat tebakan kamu benar, Angka yang berhasil ditebak adalah ' + angka);
        lagi = false;
        benar = true;
        alert('Terimakasih telah bermain!');
    }

    if (percobaan == 1 && benar == false) {
        alert('Kamu gagal menebak. Angka rahasia = ' + angka);
        lagi = false;
        alert('Terimakasih telah bermain!');
    }
}