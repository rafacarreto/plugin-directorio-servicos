jQuery(document).ready(function($) {
    if($('#myTabContent').length){

        if(window.location.href.indexOf("&key=") > -1) {
            value = getUrlParameters();
            $( document ).ready(function() {
                document.getElementById("search").value = getUrlParameters(); //set value on myInputID
                var x = document.getElementsByClassName("toHide");
                $(x).filter(function() {
                    let contenido = $(this).text().normalize('NFD').replace(/[\u0300-\u036f]/g,"").toLowerCase().indexOf(value) > -1;
                    $(this).toggle( contenido )
                });
            });
        }

        $("#search").on("keyup", function() {    
            var value = $(this).val().toLowerCase();
            var x = document.getElementsByClassName("toHide");
            $(x).filter(function() {
                let contenido = $(this).text().normalize('NFD').replace(/[\u0300-\u036f]/g,"").toLowerCase().indexOf(value) > -1;
                $(this).toggle( contenido )
            });
        });

    } 
})