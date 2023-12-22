aData = {}; 
bData = {};
cData = {};

$("#pengarang").autocomplete({
    source: function(request, response) {
        $.ajax({
            url: "pengarang.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                aData = ($.map(data, function(item) {
                    return {
                        label: item.nama_pengarang,
                    }
                }));
                console.log(aData);
                var hasil1 = $.ui.autocomplete.filter(aData, request.term);
                response(hasil1);
            }
        });
    }
});
$("#penerbit").autocomplete({
    source: function(request, response) {
        $.ajax({
            url: "penerbit.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                bData = ($.map(data, function(item) {
                    return {
                        label: item.nama_penerbit,
                    }
                }));
                console.log(bData);
                var hasil2 = $.ui.autocomplete.filter(bData, request.term);
                response(hasil2);
            }
        });
    }
});
$("#judul").autocomplete({
    source: function(request, response) {
        $.ajax({
            url: "judul.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                cData = ($.map(data, function(item) {
                    return {
                        label: item.judul_buku,
                    }
                }));
                console.log(cData);
                var hasil3 = $.ui.autocomplete.filter(cData, request.term);
                response(hasil3);
            }
        });
    }
});