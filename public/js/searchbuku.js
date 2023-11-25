$(document).ready(function() {
    $('#body').load('buku.php?keyword='+$('#keywordInit').text());
    $('#book_search').on('keyup', function() {
        $('#body').load('buku.php?keyword=' + $('#book_search').val());
    });
});
