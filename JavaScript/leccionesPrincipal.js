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
}

function goToLesson(moduleIndex, lessonIndex) {
    window.location.href = `leccion${moduleIndex}-${lessonIndex}.php`;
}