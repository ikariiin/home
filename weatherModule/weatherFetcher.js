/**
 * Created by root on 11/7/15.
 */
navigator.geolocation.getCurrentPosition(GetLocation);
function GetLocation(location)
{
    var long = location.coords.longitude;
    var lat = location.coords.latitude;
    $.post("jsPhpInterface.php", { lat: lat, lon: long })
        .done(function(data)
        {
            console.log(data);
        });
}