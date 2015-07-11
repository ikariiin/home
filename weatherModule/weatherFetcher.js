/**
 * Created by root on 11/7/15.
 */
navigator.geolocation.getCurrentPosition(GetLocation);
function GetLocation(location)
{
    var long = location.coords.longitude;
    var lat = location.coords.latitude;
    $.post("weatherModule/jsPhpInterface.php", { lat: lat, lon: long })
        .done(function(data)
        {
            var parsedJSON = JSON.parse(data);
            $("#temp").html
            (
                "<div class='panel panel-primary'>" +
                "<div class='panel-heading'>" +
                "Temperature" +
                "</div>" +
                "<div class='panel-body'>" +
                "<div style='font-size: 50px; background-image: url('http://localhost/home/resources/rainy_weather_by_kadeddy-d5jbciy.jpg');'>"
                +
                parsedJSON.data.current_condition[0].FeelsLikeC + "° C" +
                    "</div>" +
                    "</div>" +
                "</div>"
            );
        });
}