document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registrationForm');
    const steps = form.querySelectorAll('.form-step');

    // Gestisci il click sul pulsante "Next"
    form.querySelector('.next-step').addEventListener('click', function () {
        steps[0].style.display = 'none'; // Nascondi il passo corrente
        steps[1].style.display = 'block'; // Mostra il passo successivo
    });

    // Gestisci il click sul pulsante "Prev"
    form.querySelector('.prev-step').addEventListener('click', function () {
        steps[1].style.display = 'none'; // Nascondi il passo corrente
        steps[0].style.display = 'block'; // Mostra il passo precedente
    });
});
