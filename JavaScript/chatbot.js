document.getElementById('send-button').addEventListener('click', sendMessage);
document.getElementById('user-input').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        sendMessage();
    }
});

function sendMessage() {
    const userInput = document.getElementById('user-input').value.trim();
    if (userInput === "") return;

    displayMessage(userInput, 'user');
    document.getElementById('user-input').value = '';

    // Enviar el mensaje al servidor
    fetch('../Admin/funciones/chatbot_backend.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ message: userInput })
    })
    .then(response => response.json())
    .then(data => {
        displayMessage(data.reply, 'bot');
    })
    .catch(error => {
        console.error('Error:', error);
        displayMessage("Lo siento, ocurrió un error. Inténtalo de nuevo más tarde.", 'bot');
    });
}

function displayMessage(message, sender) {
    const chatBody = document.getElementById('chat-body');
    const messageDiv = document.createElement('div');
    messageDiv.classList.add('message');
    messageDiv.classList.add(sender === 'user' ? 'user-message' : 'bot-message');
    messageDiv.textContent = message;
    chatBody.appendChild(messageDiv);
    chatBody.scrollTop = chatBody.scrollHeight;
}
