const contactForm = document.querySelector('#contacto'),
    listadoContactos = document.querySelector('#listado tbody');

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
            
            const res = JSON.parse(xhr.responseText);

            // Insert in table:
            const nuevoContacto = document.createElement('tr');
            nuevoContacto.innerHTML = `
                <td> ${res.datos.nombre} </td>
                <td> ${res.datos.ubicacion} </td>
                <td> ${res.datos.telefono} </td>
            `;

            const contenedorAcciones = document.createElement('td');
            // crear iconos con enlaces

            // 1. Editar
            const iconoEditar = document.createElement('i');
            iconoEditar.classList.add('fas', 'fa-pen-square');

            const enlaceEditar = document.createElement('a');
            enlaceEditar.appendChild(iconoEditar);
            enlaceEditar.classList.add('btn', 'btn-editar')
            enlaceEditar.href = `editar.php?id=${res.datos.id}`;

            contenedorAcciones.appendChild(enlaceEditar);

            // 2. Borrar
            const iconoBorrar = document.createElement('i');
            iconoBorrar.classList.add('fas', 'fa-trash-alt');

            const enlaceBorrar = document.createElement('a');
            enlaceBorrar.appendChild(iconoBorrar);
            enlaceBorrar.classList.add('btn', 'btn-borrar');
            enlaceBorrar.href = `borrar.php?id=${res.datos.id}`;

            contenedorAcciones.appendChild(enlaceBorrar);

            // Añadirlo al tr
            nuevoContacto.appendChild(contenedorAcciones);

            // Añadir al tbody
            listadoContactos.appendChild(nuevoContacto)

            // Reset el form
            document.querySelector('form').reset();

            // Mostrar notificacion
            noti('Añadido exitosamente', 'exito');
        }
    }
    xhr.send(info);

}