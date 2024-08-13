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
            { src: "../Videos/1.3 La via y sus partes.mp4", poster: "../imagenes/miniaturas/1.3 La via y sus partes.jpg", title: "Video 1.3: La vía y sus partes", elementId: "thumbnail-image4", titleId: "thumb-vid-title4" }
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