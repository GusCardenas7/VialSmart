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
            font-family: 'Share Tech Mono', monospace;
            z-index: 4;
        }

        #chat-header {
            background-color: #EC7474;
            /*background-image: linear-gradient(to right bottom, #50ff48, #7efd44, #9efa45, #b8f849, #cdf551, #dfe94a, #edde48, #f8d24a, #ffba46, #ffa14b, #ff8954, #fb735f);*/
            color: white;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
          #chat-header:hover {
            /*background-color: #76a559;*/
            background-image: linear-gradient(to right bottom, #7ef698, #99f68a, #b2f67e, #caf674, #e1f46c, #ede763, #f7db5e, #ffce5c, #ffb55c, #ff9d62, #fa876a, #ec7474);
            color: black;
          }

        #chat-body {
            display: none; /* Inicia comprimido */
            height: 300px;
            padding: 10px;
            overflow-y: scroll;
            background-color: #ffffff;
            opacity: 0.3;
            background-color: #ffffff;
            opacity: 1;
            background-size: 14px 14px;
            background-image:  repeating-linear-gradient(0deg, #cfffb9, #cfffb9 0.7000000000000001px, #ffffff 0.7000000000000001px, #ffffff);
        }

        #chat-footer {
            display: none; /* También inicia oculto */
            border-top: 1px solid #ccc;
        }

        #user-input {
            flex: 1;
            padding: 10px;
            border: none;
            outline: none;
            font-family: 'Share Tech Mono', monospace;
        }

        #send-button {
            padding: 10px;
            border: none;
            background-color: #76dc5d;
            color: white;
            cursor: pointer;
            font-family: 'Share Tech Mono', monospace;
        }
        #send-button:hover {
            background-color: #fffa51;
        }
        .message {
            margin: 5px 0;
            text-align: justify;
            text-justify: inter-word;
            font-size: 15px;
        }

        .user-message {
            text-align: right;
            color: #373737;
        }

        .bot-message {
            text-align: left;
            color: #36828b;
        }

        .fact {
            margin: 5px 0;
            text-align: left;
            text-justify: inter-word;
            color: black;
            font-weight: bold;
            font-size: 12px;
        }

    </style>
</head>
<body>
    <div id="chatbot">
        <div id="chat-window">
            <div style="font-weight:bold; font-size:17px;" id="chat-header">🚗 Vialito 🚗</div>
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


<script>
document.getElementById("chat-header").addEventListener("click", function() {
    const chatBody = document.getElementById("chat-body");
    const chatFooter = document.getElementById("chat-footer");

    // Alterna entre mostrar y ocultar el contenido del chat
    if (chatBody.style.display === "none") {
        chatBody.style.display = "block";
        chatFooter.style.display = "flex";
    } else {
        chatBody.style.display = "none";
        chatFooter.style.display = "none";
    }
});
</script>