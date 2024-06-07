document.addEventListener('DOMContentLoaded', function() {
    const weatherIcon = document.getElementById('weather-icon');
    const weatherInfo = document.getElementById('weather-info');

    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
    const day = ('0' + currentDate.getDate()).slice(-2);

    const formattedDate = `${year}-${month}-${day}T15:25:00.000+02:00`;

    fetch(`https://api.meteomatics.com/${formattedDate}/t_2m:C/41.3828939,2.1774322/json?model=mix`, {
        headers: {
            'Authorization': 'Basic ' + btoa('ifemamadrid_tejeda_unai:477ZcMkAd1')
        }
    })
    .then(response => response.json())
    .then(data => {
        const temperature = data.data[0].coordinates[0].dates[0].value;
        weatherInfo.textContent = `${temperature}°C`;

        if (temperature > 25) {
            weatherIcon.className = 'fas fa-sun';
        } else if (temperature < 15) {
            weatherIcon.className = 'fas fa-snowflake';
        } else {
            weatherIcon.className = 'fas fa-cloud';
        }

        const gananciaElements = document.querySelectorAll('.ganancia-repartidor');
        gananciaElements.forEach(element => {
            const precio = parseFloat(element.dataset.precio);
            let porcentajeGanancia = 10;

            if (temperature !== 20) {
                porcentajeGanancia = 10 + (Math.abs(20 - temperature));
            }

            const ganancia = (precio * porcentajeGanancia) / 100;
            element.textContent = `${ganancia.toFixed(2)}€ (${porcentajeGanancia}%)`;
        });
    })
    .catch(error => {
        console.error('Error fetching weather data:', error);
        weatherInfo.textContent = 'Error fetching weather data';
    });
});
