        
// //penggunaan ajax untuk live search
//     //ambil elemen elemen yang dibutuhkan
//         var keyword = document.getElementById('keyword');
//         var tombolCari = document.getElementById('tombol-cari');
//         var container = document.getElementById('container');

//     //tambahkan event ketika keyword ditulis
//         keyword.addEventListener('keyup', function() {
            
//         //buat objek ajax
//             var xhr = new XMLHttpRequest();

//         //cek kesiapan ajax
//             xhr.onreadystatechange = function() {
//                 if( xhr.readyState == 4 && xhr.status == 200 ) {
//                     container.innerHTML = xhr.responseText;
//                 }
//             }

//         //eksekusi ajax
//             xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
//             xhr.send();

//         });




//penggunaan jquery untuk live search
    $(document).ready (function () {

        $('#keyword').on('keyup', function() {

            //$.get()
            $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
    
                $('#container').html(data);
            });
        });
    });