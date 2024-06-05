document.addEventListener('DOMContentLoaded', function() {
    const weatherContainer = document.querySelector('.weather-container');
    const weatherIcon = document.getElementById('weather-icon');
    const weatherInfo = document.getElementById('weather-info');
    const pedidosContainer = document.getElementById('pedidosContainer');
    
    fetch('https://api.meteomatics.com/2024-06-04T15:25:00.000+02:00/t_2m:C/41.3828939,2.1774322/json?model=mix', {
        headers: {
            'Authorization': 'Basic ' + btoa('ifemamadrid_tejeda_unai:477ZcMkAd1')
        }
    })
    .then(response => response.json())
    .then(data => {
        const temperature = data.data[0].coordinates[0].dates[0].value;
        weatherInfo.textContent = `${temperature}°C`;

        // Determinar el icono del clima basado en la temperatura
        if (temperature > 25) {
            weatherIcon.className = 'fas fa-sun'; // Icono de sol
        } else if (temperature < 15) {
            weatherIcon.className = 'fas fa-snowflake'; // Icono de nieve
        } else {
            weatherIcon.className = 'fas fa-cloud'; // Icono de nube
        }

        // Calcular y mostrar las ganancias del repartidor basado en la temperatura
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
