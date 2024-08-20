document.addEventListener("DOMContentLoaded", function() {
    const paragraphs = document.querySelectorAll('#lessons p');
    let lineIndex = 0;
    let charIndex = 0;

    function typeWriter() {
        if (lineIndex < paragraphs.length) {
            const currentParagraph = paragraphs[lineIndex];
            const text = currentParagraph.dataset.text;

            // Se asegura de que el contenido inicial esté vacío antes de comenzar
            if (charIndex === 0) {
                currentParagraph.textContent = '';
            }

            if (charIndex < text.length) {
                currentParagraph.textContent += text.charAt(charIndex);
                charIndex++;
                setTimeout(typeWriter, 50); // Ajuste la velocidad de la escritura
            } else {
                charIndex = 0; // Elimina el índice de caracteres para la línea siguiente
                lineIndex++; // Pasa a la siguiente línea
                setTimeout(typeWriter, 500); // Pausa entre líneas
            }
        }
    }

    // Guarda el texto original en un atributo de datos personalizado y vacía el contenido inicial
    paragraphs.forEach(p => {
        p.dataset.text = p.textContent;
        p.textContent = '';
    });

    typeWriter(); // Comienza el efecto/animacion 
});


