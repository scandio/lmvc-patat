var mode_toggle = function(el){
    if(el.name=="mode_d")
    {
        $('#btn_walk').removeAttr('disabled');
        window.travelMode='driving';
        el.disabled = 'disabled';
    }
    else if(el.name=="mode_w")
    {
        $('#btn_drive').removeAttr('disabled');
        window.travelMode='walking';
        el.disabled = 'disabled';
    }
    $('#map').patatmap('requestLocation');
};

$('#map').patatmap({

});