//Uros Mutavdzic 378/19
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

function evidentiraj(id, greska) {
    $.ajax({
        type: "POST",
        url: "/Ajax/evidencijaGreske",
        data: {
        admin: id,
        idGreske: greska
        }
        }).done(function(result) {
            $('#' + greska).remove();
            //alert(result);
            //$('#' + id).remove();
        });
}