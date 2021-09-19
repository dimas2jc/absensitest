$(document).ready(function(){
    const table = document.getElementById('absensi');
    $(table).DataTable();

    // Geolocation
    $('.ambil-lokasi').on('click', function(){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError, options);
        } else { 
            alert("Geolocation is not supported by this browser.");
        }
        
        $('.konfirmasi').attr("disabled", false);

    });
    
    var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };

    function showPosition(position) {
        let getLat = position.coords.latitude;
        let getLon = position.coords.longitude;
        let getAcc = position.coords.accuracy;
        
        $('#latitude').val(getLat);
        $('#longitude').val(getLon);
        $('#accuracy').val(getAcc);

        $('#maps-holder').attr("src", "https://maps.google.com/maps?q="+getLat+", "+getLon+"&z=15&output=embed");
    }

    function showError(error) {
        switch(error.code) {
          case error.PERMISSION_DENIED:
            alert("User denied the request for Geolocation.");
            break;
          case error.POSITION_UNAVAILABLE:
            alert("Location information is unavailable.");
            break;
          case error.TIMEOUT:
            alert("The request to get user location timed out.");
            break;
          case error.UNKNOWN_ERROR:
            alert("An unknown error occurred.");
            break;
        }
    }
})