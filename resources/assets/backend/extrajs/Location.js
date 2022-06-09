var moment = require("moment");

export default class Location {
    static Locationinit(id) {
        navigator.geolocation.getCurrentPosition(
            Location.success,
            Location.error
        );
        var date = moment().format("MMMM Do YYYY, h:mm:ss a");
        console.log("Location From Class list", date);
    }
    static success(position) {
        const location_result = document.getElementById("logged_user_location");
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        const apiurl = `https:api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=en`;

        //location_result.href = `https://www.openstreetmap.org/#map=18/${latitude}/${longitude}`;

        location_result.href = `https://www.openstreetmap.org/?mlat=${latitude}&mlon=${longitude}#map=12/${latitude}/${longitude}`;
        fetch(apiurl)
            .then((res) => res.json())
            .then((data) => {
                location_result.textContent = "";
                location_result.innerHTML = `<i class="fas fa-map-marker"></i> ${data.principalSubdivision}`;
            });
        console.log("succes location", position);
    }

    static error() {
        const location_result = document.getElementById("logged_user_location");
        location_result.textContent = "Unable to Detect";
    }
}
