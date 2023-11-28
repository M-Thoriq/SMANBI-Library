$(document).ready(function() {

    $('#tableBody').load('../../views/anggota/anggota.php');

})

setInterval(function() {
    
    $('#tableBody').load('../../views/anggota/anggota.php');
    
}, 500);