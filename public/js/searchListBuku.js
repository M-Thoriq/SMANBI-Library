$(document).ready(function() {
    $('#tableBody').load('listBuku.php?keyword=' + $('#book_search').val());
    $('#book_search').on('keyup', function() {
        $('#tableBody').load('listBuku.php?keyword=' + $('#book_search').val());
    });
});
