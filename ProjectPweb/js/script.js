//ambil elemen

var keyword = document.getElementById('keyword');
var tombolcari = document.getElementById('tombol_cari');
var container = document.getElementById('container');

keyword.addEventListener('keyup', function(){
    
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }

    }

    xhr.open('GET','ajax/driver.php?keyword=' + keyword.value,true)
    xhr.send();

})