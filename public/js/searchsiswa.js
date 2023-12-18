aData = {}
$("#siswa_search").autocomplete({
    source: function(request, response) {
        $.ajax({
            url: "siswa.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                aData = ($.map(data, function(item) {
                    return {
                        label: item.nama,
                    }
                }));
                var hasil = $.ui.autocomplete.filter(aData, request.term);
                response(hasil);
            }
        });
    }
});
