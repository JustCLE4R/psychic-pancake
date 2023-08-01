var jumlahAngkot = 10;
var angkotBeroperasi = 6;

for(var noAngkot = 1; noAngkot <= jumlahAngkot; noAngkot++){
    if(noAngkot > angkotBeroperasi){
        console.log('Angkot No. '+noAngkot+' sedang tidak beroperasi.');
    }else{
        console.log('Angkot No. '+noAngkot+' beroperasi dengan baik.');
    }
}