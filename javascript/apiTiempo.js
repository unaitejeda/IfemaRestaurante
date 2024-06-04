document.addEventListener('DOMContentLoaded', function() {
    const weatherContainer = document.querySelector('.weather-container');
    const weatherIcon = document.getElementById('weather-icon');
    const weatherInfo = document.getElementById('weather-info');
    
    fetch('https://api.meteomatics.com/2024-06-04T15:25:00.000+02:00/t_2m:C/41.3828939,2.1774322/json?model=mix', {
        headers: {
            'Authorization': 'Basic ' + btoa('ifemamadrid_tejeda_unai:477ZcMkAd1')
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        const temperature = data.data[0].coordinates[0].dates[0].value;
        weatherInfo.textContent = `${temperature}°C`;
    
        // Determinar qué icono de clima mostrar según la temperatura, el estado del tiempo, etc.
        // Por ejemplo, si la temperatura es alta, mostrar un icono de sol
        // Si la temperatura es baja, mostrar un icono de nube
        // Puedes ajustar esta lógica según tus necesidades
        if (temperature > 25) {
            weatherIcon.className = 'fas fa-sun'; // Icono de sol
        } else {
            weatherIcon.className = 'fas fa-cloud'; // Icono de nube
        }
    })
    .catch(error => {
        console.error('Error fetching weather data:', error);
        weatherInfo.textContent = 'Error fetching weather data';
    });
});
