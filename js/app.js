const contactForm = document.querySelector('#contacto'),
      listadoContactos = document.querySelector('#listado tbody'),
      buscador = document.querySelector('#buscar');

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
            } else if (accion === 'editar') {
                const id = document.querySelector('#id').value;
                infoContacto.append('id', id);
                actualizarContacto(infoContacto);
            }
        }
    })
    
    if(listadoContactos) {
        // Eliminar contacto
        listadoContactos.addEventListener('click', eliminarContacto);
    }

    // Buscador barra
    buscador.addEventListener('input', (e) => {

        const exp = new RegExp(e.target.value, "i"),
              registros = document.querySelectorAll('tbody tr');

              registros.forEach(registro => {
                registro.style.display = 'none';    
               
                if(registro.childNodes[1].textContent.replace(/\s/g, " ").search(exp) != -1) {
                    registro.style.display = "table-row";
                }
                numeroContactos();
            });

    })
 
    numeroContactos();

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
            enlaceBorrar.setAttribute('data-id', res.datos.id);

            contenedorAcciones.appendChild(enlaceBorrar);

            // Añadirlo al tr
            nuevoContacto.appendChild(contenedorAcciones);

            // Añadir al tbody
            listadoContactos.appendChild(nuevoContacto)

            // Reset el form
            document.querySelector('form').reset();

            // Mostrar notificacion
            noti('Añadido exitosamente', 'exito');
            numeroContactos();
        }
    }
    xhr.send(info);

}

function eliminarContacto(e) {
    console.log('click')
    if ( e.target.parentElement.classList.contains('btn-borrar') ){
        const id = e.target.parentElement.getAttribute('data-id');
        
        const res = confirm('¿Estas seguro (a) ?');

        if(res) {
            
            let xhr = new XMLHttpRequest();
            xhr.open('GET', `includes/models/model-contacto.php?id=${id}&accion=borrar`, true);
            xhr.onload = function() {
                if(this.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    console.log(data);

                    if(data.respuesta == 'correcto') {
                        console.log(e.target.parentElement.parentElement.parentElement);
                        e.target.parentElement.parentElement.parentElement.remove();

                        noti('Contacto eliminado', 'exito');
                        numeroContactos();
                    } else {
                        noti('Hubo un error...', 'error');
                    }
                }
            }
            xhr.send();
        } 
    }

}

const actualizarContacto = (info) => {

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'includes/models/model-contacto.php', true);

    xhr.onload = function() {
        if(this.status === 200) {
            const res = JSON.parse(xhr.responseText);
            console.log(res);

            if(res.respuesta === 'correcto') {
                noti('Contacto editado', 'exito');
            } else {

                noti('Hubo un error', 'error');
            }

            setTimeout(() => {
                window.location.href = 'index.php';
            }, 1000);
        }
    };

    xhr.send(info);

}

function numeroContactos() {
    
    const totalContactos = document.querySelectorAll('tbody tr'),
          contenedorCantidad = document.querySelector('.total-contactos span');

    let total = 0;

    totalContactos.forEach(contacto => {
        if(contacto.style.display === '' || contacto.style.display === 'table-row') {
            total++;
        }
    });
    console.log(total);

    contenedorCantidad.textContent = total;
}
