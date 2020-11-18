const contactForm = document.querySelector('#contacto');

eventListeners();

function eventListeners() {
    // Cuando el formulario de crear o editar son ejecutados

    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
    
        const nombre = document.querySelector('#nombre').value,
              ubicacion = document.querySelector('#ubc').value,
              telefono = document.querySelector('#phone').value,
              accion = document.querySelector('#accion').value;

        if (nombre === '' || ubc === '' || phone === '') {
            noti('Todos los campos son obligatorios', 'error');
        } else {
            noti('Añadido exitosamente', 'exito');
            const infoContacto = new FormData();
            infoContacto.append('nombre', nombre);
            infoContacto.append('ubicacion', ubicacion);
            infoContacto.append('telefono', telefono);
            infoContacto.append('accion', accion);

            console.log(...infoContacto);
        
            if(accion === 'crear') {
                // Crear el nuevo contacto con una función AJAX
                insertarContacto(infoContacto);
            } else {

            }
        }
    })
}

const noti = (mensaje, tipo) => {
    const notification = document.createElement('div');
    notification.classList.add(tipo, 'notification', 'sombra');
    notification.textContent = mensaje;

    // form
    contactForm.insertBefore(notification, document.querySelector('form legend'));

    setTimeout(() => {
        notification.classList.add('visible');
        setTimeout(() => {
            notification.classList.remove('visible');
            setTimeout(() => {
                notification.remove();
            }, 500)
        }, 3000);
    }, 100);
}

const insertarContacto = (info) => {
    
    let xhr = new XMLHttpRequest();

    xhr.open('POST', 'includes/models/model-contacto.php', true);  
    xhr.onload = function() {
        if(this.status === 200) {
            console.log(xhr.responseText);
            console.log(JSON.parse(xhr.responseText));
          
        }
    }
    xhr.send(info);

}