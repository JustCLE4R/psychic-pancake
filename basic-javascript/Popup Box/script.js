// var list = ['Nama', 'Umur', 'Alamat'], data = [];

// for(var i =0;i<list.length;i++){
//     data.push(prompt('Masukan '+list[i]+' :'));
// }

// console.log(data);

// var konfir = confirm('Yakin kah maniezz?');
// if(konfir){
//     alert('User menekan tombol ok');
// }else{
//     alert('User menekan tombol Cancel');
// }

alert('Selamat datang');

var lagi = true;

while (lagi){
    var nama = prompt('Masukan Nama anda :');
    alert('Halo ' + nama);
    lagi = confirm('Ulang lagi?');
}