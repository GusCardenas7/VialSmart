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
            { src: "../Videos/7.2 Interaccion con extraños.mp4", poster: "../imagenes/miniaturas/7.2 Interaccion con extraños.jpg", title: "Video 7.2: Interacción con extraños", elementId: "thumbnail-image14", titleId: "thumb-vid-title14" }
        ]
    },
    8: {
        centralVideo: {
            src: "../Videos/8.1 Respeto mutuo en la via publica.mp4",
            poster: "../imagenes/miniaturas/8.1 Respeto mutuo en la via publica.jpg",
            title: "Video 8.1: Respeto mutuo en la vía pública"
        },
        thumbnails: [
            { src: "../Videos/8.2 Resolucion de conflictos en la via.mp4", poster: "../imagenes/miniaturas/8.2 Resolucion de conflictos en la via.jpg", title: "Video 8.2: Resolución de conflictos en la vía", elementId: "thumbnail-image15", titleId: "thumb-vid-title15" },
            { src: "../Videos/8.3 Despedida.mp4", poster: "../imagenes/miniaturas/8.3 Despedida.jpg", title: "Video 8.3: Despedida", elementId: "thumbnail-image16", titleId: "thumb-vid-title16" }
        ]
    }
};

function Advice() {
    Block.play();
    alert("¡Necesitas desbloquear las lecciones anteriores!");   //COLOCAR EL ONCLICK EN TODAS
}

function checkAndApplyVideoStatus(moduleIndex) {
    const centralVideoId = `central-video${moduleIndex}`;
    const thumbnails = modules[moduleIndex].thumbnails;

    // Solo verificar el estado sin cambiar la visibilidad que el PHP ha aplicado
    const centralVideoElement = document.getElementById(centralVideoId);
    const centralVideoAltElement = document.getElementById(centralVideoId + ".1");

    if (centralVideoElement && !centralVideoAltElement) {
        // Si el video central desbloqueado está visible, no hacer nada
        console.log(`Central video ${centralVideoId} está desbloqueado.`);
    } else if (centralVideoAltElement && centralVideoAltElement.hidden === false) {
        // Si el video bloqueado está visible, no cambiar su estado
        console.log(`Central video ${centralVideoId}.1 está bloqueado.`);
    }

    // Verificar las miniaturas (thumbnails)
    thumbnails.forEach((thumbnail, index) => {
        const thumbnailElement = document.getElementById(thumbnail.elementId);
        const thumbnailAltElement = document.getElementById(thumbnail.elementId + ".1");

        if (thumbnailElement && !thumbnailAltElement) {
            // Si la miniatura desbloqueada está visible, no hacer nada
            console.log(`Thumbnail ${thumbnail.elementId} está desbloqueado.`);
        } else if (thumbnailAltElement && thumbnailAltElement.hidden === false) {
            // Si la miniatura bloqueada está visible, no cambiar su estado
            console.log(`Thumbnail ${thumbnail.elementId}.1 está bloqueado.`);
        }
    });
}





// Función para intercambiar el video central con la miniatura seleccionada
function swapVideos(thumbnailIndex) {
    // Obtener el módulo actual visible
    const currentModule = document.querySelector('.module:not([hidden])');
    const moduleIndex = currentModule.id.replace('module', '');

    // Obtener la información del video central y las miniaturas del módulo actual
    const centralVideoData = modules[moduleIndex].centralVideo;
    const thumbnails = modules[moduleIndex].thumbnails;

    // Obtener el thumbnail seleccionado y verificar si está desbloqueado
    const selectedThumbnail = thumbnails[thumbnailIndex - 1];
    const thumbnailElement = document.getElementById(selectedThumbnail.elementId);
    const thumbnailTitleElement = document.getElementById(selectedThumbnail.titleId);

    if (thumbnailElement && thumbnailElement.hidden === false) {
        const tempSrc = centralVideoData.src;
        const tempPoster = centralVideoData.poster;
        const tempTitle = centralVideoData.title;

        // Actualizar el video central con el de la miniatura seleccionada
        centralVideoData.src = selectedThumbnail.src;
        centralVideoData.poster = selectedThumbnail.poster;
        centralVideoData.title = selectedThumbnail.title;

        // Actualizar la miniatura seleccionada con el video, imagen y la leyends que estaab en el central.video
        selectedThumbnail.src = tempSrc;
        selectedThumbnail.poster = tempPoster;
        selectedThumbnail.title = tempTitle;

        // Aplicar los cambios en el DOM para que lo use el cental video
        const centralVideoSource = currentModule.querySelector('#central-video-source');
        const centralVideo = currentModule.querySelector('#central-video');
        const centralTitleElement = currentModule.querySelector('#central-video-title');

        centralVideoSource.src = centralVideoData.src;
        centralVideo.poster = centralVideoData.poster;
        centralTitleElement.textContent = centralVideoData.title;

        // Cambiar el poster y la leyenda del thumbnail seleccionado en el DOM
        const thumbnailImage = document.getElementById(selectedThumbnail.elementId);
        thumbnailImage.src = selectedThumbnail.poster;  
        thumbnailTitleElement.textContent = selectedThumbnail.title;  

        centralVideo.load();
        sortThumbnailsByTitle(moduleIndex);
    } else {

        Advice();
    }
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

    // Solo verificar y mantener el estado de los videos, no cambiarlo
    checkAndApplyVideoStatus(moduleIndex);
}

