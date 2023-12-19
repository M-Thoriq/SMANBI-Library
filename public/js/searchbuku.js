$(document).ready(function() {
    $('#body').load('buku.php?keyword=' + encodeURIComponent($('#book_search').val()));
    var timeout = null;
    $('#book_search').on('keyup', function() {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            $('#body').load('buku.php?keyword=' + encodeURIComponent($('#book_search').val()));
        }, 1000);
    });
});