$(document).ready(function() {
    $('.autocomplete').each(function (i, data) {
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(data),
            {types: ['address']});
    });
});