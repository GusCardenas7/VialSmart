<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Chatbot de Educación Vial</title>
    <style>
        #chatbot {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 10px;
    overflow: hidden;
    font-family: Arial, sans-serif;
}

#chat-header {
    background-color: #007BFF;
    color: white;
    padding: 10px;
    text-align: center;
}

#chat-body {
    height: 300px;
    padding: 10px;
    overflow-y: scroll;
    background-color: #f9f9f9;
}

#chat-footer {
    display: flex;
    border-top: 1px solid #ccc;
}

#user-input {
    flex: 1;
    padding: 10px;
    border: none;
    outline: none;
}

#send-button {
    padding: 10px;
    border: none;
    background-color: #007BFF;
    color: white;
    cursor: pointer;
}

#send-button:hover {
    background-color: #0056b3;
}

.message {
    margin: 5px 0;
}

.user-message {
    text-align: right;
    color: blue;
}

.bot-message {
    text-align: left;
    color: green;
}

    </style>
</head>
<body>
    <div id="chatbot">
        <div id="chat-window">
            <div id="chat-header">Chatbot Educación Vial</div>
            <div id="chat-body"></div>
            <div id="chat-footer">
                <input type="text" id="user-input" placeholder="Escribe tu mensaje...">
                <button id="send-button">Enviar</button>
            </div>
        </div>
    </div>

    <script src="../JavaScript/chatbot.js"></script>
</body>
</html>
