<?php  
    include_once 'includes/functions/queries.php';
    include_once 'includes/layouts/header.php'

?>

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

        <p class="total-contactos"> <span>  </span> contactos </p>

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
                  
                    
             
                                
                <?php $contactos = obtenerContactos(); 
                
                if($contactos->num_rows):  ?>  
             
                    <?php foreach($contactos as $contacto):  ?>

                        <tr> 
                            <td> <?= $contacto['nombre'] ?> </td>
                            <td> <?= $contacto['ubicacion'] ?> </td>
                            <td> <?= $contacto['telefono'] ?> </td>
                            <td> 

                                <a href="editar.php?id=<?= $contacto['id']; ?>" class="btn-editar btn">
                                    <i class="fas fa-pen-square"></i>
                                </a>

                                <button data-id="<?= $contacto['id']; ?>"  class="btn-borrar btn">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                            </td>
                        
                        </tr>

                    <?php endforeach ?>
            <?php endif ?>
              

          

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php  include_once 'includes/layouts/footer.php' ?>