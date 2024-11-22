let Message = new Audio('../audios/message.wav');
document.getElementById('send-button').addEventListener('click', sendMessage);
document.getElementById('user-input').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        sendMessage();
    }
});

function sendMessage() {
    const userInput = document.getElementById('user-input').value.trim();
    if (userInput === "") return;

    displayMessage(userInput, 'user', true); // Pasa `true` para guardar en sessionStorage
    document.getElementById('user-input').value = '';

    fetch('../Admin/funciones/chatbot_backend.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ message: userInput })
    })
        .then(response => response.json())
        .then(data => {
            displayMessage(data.reply, 'bot', true); // Manda el true para que se guarde en sessionStorage
        })
        .catch(error => {
            console.error('Error:', error);
            displayMessage("Lo siento, ocurrió un error. Inténtalo de nuevo más tarde.", 'bot', true);
        });
}

function displayMessage(message, sender, saveToStorage = false) {
    Message.play();
    const chatBody = document.getElementById('chat-body');
    const messageDiv = document.createElement('div');
    messageDiv.classList.add('message');
    messageDiv.classList.add(sender === 'user' ? 'user-message' : 'bot-message');
    messageDiv.textContent = message;
    chatBody.appendChild(messageDiv);
    chatBody.scrollTop = chatBody.scrollHeight;

    // Guarda en sessionStorage solo si saveToStorage es iguak a true
    if (saveToStorage) {
        updateChatHistory({ message, sender });
    }
}

function displayFact(message, sender, saveToStorage = false) {
    Message.play();
    const chatBody = document.getElementById('chat-body');
    const messageDiv = document.createElement('div');
    messageDiv.classList.add('fact');
    messageDiv.textContent = message;
    chatBody.appendChild(messageDiv);
    chatBody.scrollTop = chatBody.scrollHeight;

    // Guarda en sessionStorage solo si saveToStorage es true
    if (saveToStorage) {
        updateChatHistory({ message, sender: 'fact' });
    }
}

function updateChatHistory(newMessage) {
    let messages = JSON.parse(sessionStorage.getItem('chatHistory')) || [];
    messages.push(newMessage);
    sessionStorage.setItem('chatHistory', JSON.stringify(messages));
}

function loadChatHistory() {
    const chatBody = document.getElementById('chat-body');
    chatBody.innerHTML = ""; // Limpiar el contenedor de mensajes

    const messages = JSON.parse(sessionStorage.getItem('chatHistory')) || [];
    messages.forEach(msg => {
        if (msg.sender === 'fact') {
            displayFact(msg.message, 'bot'); // Llamada sin saveToStorage
        } else {
            displayMessage(msg.message, msg.sender); // Llamada sin saveToStorage
        }
    });
}

// Cargar el historial de mensajes cuando se cargue la página
document.addEventListener("DOMContentLoaded", loadChatHistory);

// Función para solicitar datos curiosos automáticamente
function obtenerDatoCurioso() {
    fetch('../Admin/funciones/chatbot_backend.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ message: "dato_curioso" })
    })
        .then(response => response.json())
        .then(data => {
            displayFact(data.reply, 'bot', true); // Asegura que se guarde en sessionStorage
        })
        .catch(error => {
            console.error('Error al obtener el dato curioso:', error);
        });
}

// Generar un dato curioso cada 3 minutos 
setInterval(obtenerDatoCurioso, 180000);
