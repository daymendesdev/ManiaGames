document.addEventListener('DOMContentLoaded', function() {
    // Sistema de estrelas interativo
    const ratingInputs = document.querySelectorAll('.rating input');
    const ratingLabels = document.querySelectorAll('.rating label');

    ratingLabels.forEach(label => {
        label.addEventListener('mouseover', function() {
            const value = this.getAttribute('for').replace('star', '');
            highlightStars(value);
        });

        label.addEventListener('mouseout', function() {
            const checkedInput = document.querySelector('.rating input:checked');
            if (checkedInput) {
                highlightStars(checkedInput.value);
            } else {
                resetStars();
            }
        });
    });

    ratingInputs.forEach(input => {
        input.addEventListener('change', function() {
            highlightStars(this.value);
        });
    });

    function highlightStars(value) {
        ratingLabels.forEach(label => {
            const starValue = label.getAttribute('for').replace('star', '');
            if (starValue <= value) {
                label.style.color = '#ffd700';
            } else {
                label.style.color = '#ddd';
            }
        });
    }

    function resetStars() {
        ratingLabels.forEach(label => {
            label.style.color = '#ddd';
        });
    }

    // Validação do formulário
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const nota = document.querySelector('input[name="nota"]:checked');
            
            if (!nota) {
                e.preventDefault();
                alert('Por favor, selecione uma nota para sua avaliação.');
                return;
            }

            // Aqui você pode adicionar mais validações se necessário
        });
    }
});
