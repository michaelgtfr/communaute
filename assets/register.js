import './styles/register.css';

import $ from 'jquery';

//allows the display of additional elements in the file form
$(document).ready( function () {
    $("input[type=file]").change(function (e){
        $(this).next(".custom-file-label").text(e.target.files[0].name);
    });
    $(".custom-file-label").attr( "data-browse", "Choisir" );
});
