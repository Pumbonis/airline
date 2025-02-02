document.addEventListener('DOMContentLoaded', function() {
    const days = document.querySelectorAll('.day');

    days.forEach(day => {
        day.addEventListener('click', function() {
            if (!this.classList.contains('open')) {
                const dayNumber = this.getAttribute('data-day');
                const imagePath = `img/day${dayNumber}.jpg`;
                const content = `<h2>Tag ${dayNumber}</h2><img src="${imagePath}" alt="Bild für Tag ${dayNumber}">`;

                // Debugging: Überprüfe den Pfad
                console.log(`Loading image from path: ${imagePath}`);

                // Erstelle die Rückseite des Feldes
                const back = document.createElement('div');
                back.classList.add('back');
                back.innerHTML = content;

                // Füge die Rückseite zum Feld hinzu
                this.appendChild(back);

                // Öffne das Feld
                this.classList.add('open');
            }
        });
    });
});