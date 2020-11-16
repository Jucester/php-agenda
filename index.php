<?php  include_once 'includes/layouts/header.php' ?>

<div class="contenedor sombra contenedor-form">
    <form class="form-inline" action="/action_page.php">

            <legend> Añadir un contacto </legend>

            <div class="campos">
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" placeholder="Enter nombre" name="nombre">
                </div>

                <div class="campo">
                    <label for="ubc">Ubicacón:</label>
                    <input type="text" id="ubc" placeholder="Enter ubicación" name="ubc">
                </div>

                <div class="campo">
                    <label for="phone">Teléfono:</label>
                    <input type="tel" id="phone" placeholder="Enter telephone" name="phone">
                </div>
            </div>

            <div class="send">
               <button type="submit">Submit</button>
            </div>

  
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