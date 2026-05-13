document.addEventListener('DOMContentLoaded', function(){
    addEventListener();
    darkmode();
});

function darkmode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    const botonDarkMode = document.querySelector('.dark-mode-boton');

    function aplicarTema(dark) {
        if (dark) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    }

    let darkLocal = window.localStorage.getItem('dark');

    if (darkLocal !== null) {
        aplicarTema(darkLocal === 'true');
    } else {
        aplicarTema(prefiereDarkMode.matches);
        prefiereDarkMode.addEventListener('change', () => {
            aplicarTema(prefiereDarkMode.matches);
        });
    }

    botonDarkMode.addEventListener('click', () => {
        const modoActual = document.body.classList.contains('dark-mode');
        const nuevoModo = !modoActual;
        aplicarTema(nuevoModo);
        window.localStorage.setItem('dark', nuevoModo.toString());
    });
}

function addEventListener(){
    
    const mobilMenu = document.querySelector('.mobile-menu');
    mobilMenu.addEventListener('click', () => {
        const navegacion = document.querySelector('.navegacion');
        if(!document.querySelector('.mostrar')){
        navegacion.classList.add('mostrar');
    }else{
        navegacion.classList.remove('mostrar');
    }
    });

    // CAMPOS CONDICIONALES

    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodo));

};

function mostrarMetodo(e) {
    const contactoDiv = document.querySelector('#contacto');
    
    if(e.target.value === 'telefono'){
        contactoDiv.innerHTML =  `

        <input type="number" placeholder="Tu numero" id="telefono" name="contacto[telefono]" required>   
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="contacto[fecha]">
        <label for="hora">Hora:</label>
        <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    }else{
        contactoDiv.innerHTML =  `
        <label for="email">Correo:</label>
        <input type="email" placeholder="Tu correo" id="email" name="contacto[correo]">
        `;
    }
}
