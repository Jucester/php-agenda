<?php  include_once 'includes/layouts/header.php' ?>

<div class="contenedor sombra contenedor-form">
    <form class="form-inline" action="#" id="contacto">

            <legend> Añadir un contacto </legend>

            <?php  include_once 'includes/layouts/form.php' ?>

  
    </form>
</div>

<div class="contenedor sombra contactos">
    <div class="contenedor-contactos">
        <h2> Contactos: </h2>

        <input type="text" id="buscar" class="buscador sombra" placeholder="Ingresa el nombre del contacto">

        <p class="total-contactos"> <span> 12 </span> </p>

        <div class="contenedor-tabla">
            
            <table id="listado" class="listado"> 
                <thead> 
                    <tr>
                        <th> Nombre: </th>
                        <th> Empresa: </th>
                        <th> Teléfono: </th>
                        <th> Acciones: </th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td> Jucel </td>
                        <td> The Owl's Nest </td>
                        <td> +58 412 666 6666 </td>
                        <td> 

                            <a href="#" class="btn-editar btn">
                                <i class="fas fa-pen-square"></i>
                            </a>

                            <a href="#" data-id="1" class="btn-borrar btn">
                                <i class="fas fa-trash-alt"></i>
                            </a>

                        </td>
                    </tr>

                    <tr>
                        <td> Jucel </td>
                        <td> The Owl's Nest </td>
                        <td> +58 412 666 6666 </td>
                        <td> 

                            <a href="#" class="btn-editar btn">
                                <i class="fas fa-pen-square"></i>
                            </a>

                            <a href="#" data-id="1" class="btn-borrar btn">
                                <i class="fas fa-trash-alt"></i>
                            </a>

                        </td>
                    </tr>

                    <tr>
                        <td> Jucel </td>
                        <td> The Owl's Nest </td>
                        <td> +58 412 666 6666 </td>
                        <td> 

                            <a href="#" class="btn-editar btn">
                                <i class="fas fa-pen-square"></i>
                            </a>

                            <a href="#" data-id="1" class="btn-borrar btn">
                                <i class="fas fa-trash-alt"></i>
                            </a>

                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php  include_once 'includes/layouts/footer.php' ?>