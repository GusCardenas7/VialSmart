let Block = new Audio('../audios/block.wav');
// Información de los videos y miniaturas para cada módulo
const modules = {
    1: {
        centralVideo: {
            src: "../Videos/1.1 Que es la seguridad vial.mp4",
            poster: "../imagenes/miniaturas/1.1 Que es la seguridad vial.jpg",
            title: "Video 1.1: ¿Qué es la seguridad vial?"
        },
        thumbnails: [
            { src: "../Videos/1.2 Usuarios de la via.mp4", poster: "../imagenes/miniaturas/1.2 Usuarios de la via.jpg", title: "Video 1.2: Los usuarios de la vía", elementId: "thumbnail-image1", titleId: "thumb-vid-title1" },
            { src: "../Videos/1.3 La via y sus partes.mp4", poster: "../imagenes/miniaturas/1.3 La via y sus partes.jpg", title: "Video 1.3: La vía y sus partes", elementId: "thumbnail-image2", titleId: "thumb-vid-title2" }
        ]
    },
    2: {
        centralVideo: {
            src: "../Videos/2.1 Tipos de señales de transito.mp4",
            poster: "../imagenes/miniaturas/2.1 Tipos de señales de transito.jpg",
            title: "Video 2.1: Tipos de señales de tránsito"
        },
        thumbnails: [
            { src: "../Videos/2.2 Señales de tránsito más comunes.mp4", poster: "../imagenes/miniaturas/2.2 Señales de transito mas comunes.jpg", title: "Video 2.2: Señales de tránsito más comunes", elementId: "thumbnail-image3", titleId: "thumb-vid-title3" },
            { src: "../Videos/2.3 Señales especiales para niños.mp4", poster: "../imagenes/miniaturas/2.3 Señales especiales para niños.jpg", title: "Video 2.3: Señales especiales para niños", elementId: "thumbnail-image4", titleId: "thumb-vid-title4" }
        ]
    },
    3: {
        centralVideo: {
            src: "../Videos/3.1 Cruce seguro de la calle.mp4",
            poster: "../imagenes/miniaturas/3.1 Cruce seguro de la calle.jpg",
            title: "Video 3.1: Cruce seguro en las calles"
        },
        thumbnails: [
            { src: "../Videos/3.2 Comportamiento peatonal seguro.mp4", poster: "../imagenes/miniaturas/3.2 Comportamiento peatonal seguro.jpg", title: "Video 3.2: Comportamiento peatonal seguro", elementId: "thumbnail-image5", titleId: "thumb-vid-title5" },
            { src: "../Videos/3.3 Uso seguro de la bicicleta.mp4", poster: "../imagenes/miniaturas/3.3 Uso seguro de la bicicleta.jpg", title: "Video 3.3: Uso seguro de la bicicleta", elementId: "thumbnail-image6", titleId: "thumb-vid-title6" }
        ]
    },
    4: {
        centralVideo: {
            src: "../Videos/4.1 Uso del cinturón de seguridad.mp4",
            poster: "../imagenes/miniaturas/4.1 Uso del cinturón de seguridad.jpg",
            title: "Video 4.1: Uso del cinturón de seguridad"
        },
        thumbnails: [
            { src: "../Videos/4.2 Comportamiento seguro en el automovil.mp4", poster: "../imagenes/miniaturas/4.2 Comportamiento seguro en el automovil.jpg", title: "Video 4.2: Comportamiento seguro en el automóvil", elementId: "thumbnail-image7", titleId: "thumb-vid-title7" },
            { src: "../Videos/4.3 Transporte escolar.mp4", poster: "../imagenes/miniaturas/4.3 Transporte escolar.jpg", title: "Video 4.3: Transporte escolar", elementId: "thumbnail-image8", titleId: "thumb-vid-title8" }
        ]
    },
    5: {
        centralVideo: {
            src: "../Videos/5.1 Que hacer en caso de un accidente.mp4",
            poster: "../imagenes/miniaturas/5.1 Que hacer en caso de un accidente.jpg",
            title: "Video 5.1: ¿Qué hacer en caso de accidente?"
        },
        thumbnails: [
            { src: "../Videos/5.2 Primeros auxilios basicos.mp4", poster: "../imagenes/miniaturas/5.2 Primeros auxilios basicos.jpg", title: "Video 5.2: Primeros auxilios básicos", elementId: "thumbnail-image9", titleId: "thumb-vid-title9" },
            { src: "../Videos/5.3 Prevencion y seguridad en caso de emergencias.mp4", poster: "../imagenes/miniaturas/5.3 Prevencion y seguridad en caso de emergencias.jpg", title: "Video 5.3: Prevención y seguridad en caso de emergencias", elementId: "thumbnail-image10", titleId: "thumb-vid-title10" }
        ]
    },
    6: {
        centralVideo: {
            src: "../Videos/6.1 Identificacion de situaciones de riesgo.mp4",
            poster: "../imagenes/miniaturas/6.1 Identificacion de situaciones de riesgo.jpg",
            title: "Video 6.1: Identificación de situaciones de riesgo"
        },
        thumbnails: [
            { src: "../Videos/6.2 Estrategias de prevencion.mp4", poster: "../imagenes/miniaturas/6.2 Estrategias de prevencion.jpg", title: "Video 6.2: Estrategias de prevención", elementId: "thumbnail-image11", titleId: "thumb-vid-title11" },
            { src: "../Videos/6.3 Seguridad personal.mp4", poster: "../imagenes/miniaturas/6.3 Seguridad personal.jpg", title: "Video 6.3: Seguridad personal", elementId: "thumbnail-image12", titleId: "thumb-vid-title12" }
        ]
    },
    7: {
        centralVideo: {
            src: "../Videos/7.1 Respuestas en casos de emergencias.mp4",
            poster: "../imagenes/miniaturas/7.1 Respuestas en casos de emergencias.jpg",
            title: "Video 7.1: Respuestas en casos de emergencias"
        },
        thumbnails: [
            { src: "../Videos/7.2 Interaccion con extraños.mp4", poster: "../imagenes/miniaturas/7.2 Interaccion con extraños.jpg", title: "Video 7.2: Interacción con extraños", elementId: "thumbnail-image13", titleId: "thumb-vid-title13" },
            { src: "../Videos/1.3 La via y sus partes.mp4", poster: "../imagenes/miniaturas/1.3 La via y sus partes.jpg", title: "Video 1.3: La vía y sus partes", elementId: "thumbnail-image14", titleId: "thumb-vid-title14" }
        ]
    },
    8: {
        centralVideo: {
            src: "../Videos/8.1 Respeto mutuo en la via publica.mp4",
            poster: "../imagenes/miniaturas/8.1 Respeto mutuo en la via publica.jpg",
            title: "Video 8.1: Respeto mutuo en la vía pública"
        },
        thumbnails: [
            { src: "../Videos/2.2 Señales de tránsito más comunes.mp4", poster: "../imagenes/miniaturas/2.2 Señales de transito mas comunes.jpg", title: "Video 2.2: Señales de tránsito más comunes", elementId: "thumbnail-image15", titleId: "thumb-vid-title15" },
            { src: "../Videos/1.3 La via y sus partes.mp4", poster: "../imagenes/miniaturas/1.3 La via y sus partes.jpg", title: "Video 1.3: La vía y sus partes", elementId: "thumbnail-image16", titleId: "thumb-vid-title16" }
        ]
    }
};

// Función para intercambiar el video central con la miniatura seleccionada
function swapVideos(thumbnailIndex) {
    // Obtener el módulo actual visible
    const currentModule = document.querySelector('.module:not([hidden])');
    const moduleIndex = currentModule.id.replace('module', '');

    // Obtener la información del video central y las miniaturas del módulo actual
    const centralVideoData = modules[moduleIndex].centralVideo;
    const thumbnails = modules[moduleIndex].thumbnails;

    // Obtener elementos del DOM para el video central
    const centralVideoSource = currentModule.querySelector('#central-video-source');
    const centralVideo = currentModule.querySelector('#central-video');
    const centralTitleElement = currentModule.querySelector('#central-video-title');
    
    // Obtener la miniatura seleccionada
    const thumbnail = thumbnails[thumbnailIndex - 1];
    const thumbnailImage = document.getElementById(thumbnail.elementId);
    const thumbnailTitleElement = document.getElementById(thumbnail.titleId);

    // Guardar el video central actual en variables temporales
    const tempSrc = centralVideoData.src;
    const tempPoster = centralVideoData.poster;
    const tempTitle = centralVideoData.title;

    // Actualizar el video central con el de la miniatura seleccionada
    centralVideoData.src = thumbnail.src;
    centralVideoData.poster = thumbnail.poster;
    centralVideoData.title = thumbnail.title;

    // Actualizar la miniatura con el video que estaba en el centro
    thumbnail.src = tempSrc;
    thumbnail.poster = tempPoster;
    thumbnail.title = tempTitle;

    // Aplicar los cambios en el DOM
    centralVideoSource.src = centralVideoData.src;
    centralVideo.poster = centralVideoData.poster;
    centralTitleElement.textContent = centralVideoData.title;
    thumbnailImage.src = thumbnail.poster; // Actualiza el poster de la miniatura seleccionada
    thumbnailTitleElement.textContent = thumbnail.title; // Actualiza el título de la miniatura

    // Recargar el video central para que se apliquen los cambios
    centralVideo.load();
    sortThumbnailsByTitle(moduleIndex);
}

function sortThumbnailsByTitle(moduleIndex) {
    // Obtener el módulo actual y sus miniaturas
    const thumbnails = modules[moduleIndex].thumbnails;

    // Ordenar el array thumbnails basado en el título
    thumbnails.sort((a, b) => a.title.localeCompare(b.title));

    // Obtener el contenedor de miniaturas del módulo actual
    const thumbnailContainer = document.querySelector(`#module${moduleIndex} .thumbnails`);

    // Limpiar el contenedor
    thumbnailContainer.innerHTML = '';

    // Agregar las miniaturas en el nuevo orden al contenedor
    thumbnails.forEach(thumbnail => {
        const thumbnailDiv = document.createElement('div');
        thumbnailDiv.className = 'thumbnail';

        const imgElement = document.createElement('img');
        imgElement.id = thumbnail.elementId;
        imgElement.src = thumbnail.poster;
        imgElement.alt = thumbnail.title;
        imgElement.onclick = () => swapVideos(thumbnails.indexOf(thumbnail) + 1);

        const titleElement = document.createElement('div');
        titleElement.className = 'thumb-vid-title';
        titleElement.id = thumbnail.titleId;
        titleElement.textContent = thumbnail.title;

        thumbnailDiv.appendChild(imgElement);
        thumbnailDiv.appendChild(titleElement);
        thumbnailContainer.appendChild(thumbnailDiv);
    });
}

function hideModules(moduleIndex) {
    // Ocultar todos los módulos
    const modulesContainers = document.querySelectorAll('.module');
    modulesContainers.forEach(module => module.hidden = true);

    // Mostrar el módulo seleccionado
    const selectedModule = document.getElementById('module' + moduleIndex);
    selectedModule.hidden = false;

    // Actualizar la barra de navegación
    const navItems = document.querySelectorAll('nav ul li a');
    navItems.forEach(item => item.classList.remove('active'));
    document.getElementById('a-module' + moduleIndex).classList.add('active');

    // Ordenar y mostrar las miniaturas del módulo seleccionado
    sortThumbnailsByTitle(moduleIndex);
}

function Advice() {
    Block.play();
    alert("¡Necesitas desbloquear las lecciones anteriores!");   //COLOCAR EL ONCLICK EN TODAS
}