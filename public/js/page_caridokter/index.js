var valueNama = null;
var valueCabang = null;
var valueHari = null;
var valueJam = null;
var valueSpesialis = null;
var valueJenisKelamin = null;
var nullGenre = 0;
function searchByName(){
	valueNama = document.getElementById("namesearch").value.toUpperCase();
	showBySearch();
}


function searchByCabang(){
	var select = document.getElementById("cabang");
	valueCabang = select.options[select.selectedIndex].value.toUpperCase();
	showBySearch();
}

function searchByHari(){
	var select = document.getElementById("hari");
	valueHari = select.options[select.selectedIndex].value.toUpperCase();
	showBySearch();
}

function searchByJam(){
	var select = document.getElementById("jam");
	valueJam = select.options[select.selectedIndex].value.toUpperCase();
	showBySearch();
}
function searchBySpesialis(){
	var select = document.getElementById("spesialis");
	valueSpesialis = select.options[select.selectedIndex].value.toUpperCase();
	showBySearch();
}


function searchByJenisKelamin(genre){
    var perempuan = document.getElementsByClassName('genre')[1];
    var lakilaki = document.getElementsByClassName('genre')[0];
    var semua = document.getElementsByClassName('genre')[2];
    if(genre.toUpperCase() == "RESET" || (lakilaki.checked == false && perempuan.checked == false)){
            valueJenisKelamin = null;
            perempuan.checked = false;
            lakilaki.checked = false;
    }else{
        if( genre.toUpperCase() == "LAKI-LAKI"){
                perempuan.checked = false;
        }else{
                lakilaki.checked = false;
        }
        semua.checked = false;
        valueJenisKelamin = genre.toUpperCase();
    }
	showBySearch();
}
function reset(){
    location.reload();
}

function showBySearch(){
    var listDokter = document.getElementById('listDokter')
    var listDokterToList = listDokter.getElementsByClassName('list');
    var lengthList = listDokterToList.length; 
    for(var i = 0 ; i < lengthList ; i++){
        var card = listDokterToList[i].getElementsByClassName('card')[0];
        var cardBody = card.getElementsByClassName('card-body')[0];
        var nama = cardBody.getElementsByClassName('nama')[0].innerText.toUpperCase();
        var jenisKelamin = cardBody.getElementsByClassName('jenis_kelamin')[0].innerText.toUpperCase();
        var cabang = cardBody.getElementsByClassName('cabang')[0].innerText.toUpperCase();

        var cardFooter = card.getElementsByClassName('card-footer')[0];
        var spesialis = cardFooter.getElementsByClassName('spesialis')[0].innerText.toUpperCase();
        var InList = [nama,jenisKelamin,cabang,spesialis];
        var InForm = [valueNama,valueJenisKelamin,valueCabang,valueSpesialis];
        var x=0;
        for(var j=0 ; j < 4 ;j++){
            if ((InList[j].indexOf(InForm[j]) === -1) && (InForm[j] !== null)){
      			listDokterToList[i].style.display = "none";
      			break;
      		}else{
      			listDokterToList[i].style.display = "block";
      		}
        }
    }
}



document.getElementById("namesearch").addEventListener("keyup",searchByName);
document.getElementById("cabang").addEventListener("change",searchByCabang);
document.getElementById("spesialis").addEventListener("change",searchBySpesialis);
document.getElementById("reset").addEventListener("click",reset);