$(document).ready(function() {
    $('#tableData').paging({limit:3});
    $('#tableData1').paging({limit:3});
    $('#tableData2').paging({limit:3});
    
});

function ukloni(id) {
    $.ajax({
        type: "POST",
        url: "/Ajax/ukloniKorisnika",
        data: {
        korime: id
        }
        }).done(function(result) {
            $('#' + id).remove();
        });
}