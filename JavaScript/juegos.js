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