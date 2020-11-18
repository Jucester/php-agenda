<?php 

        include_once 'includes/layouts/header.php';
        include_once 'includes/functions/queries.php';

        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        
        if(!$id) {
                die('Error. No es valido');
        }

        $res = obtenerUnContacto($id);
        $contacto = $res->fetch_assoc();
?>


<div class="contenedor-button">
        <a href="index.php" class="boton btn-volver"> Volver </a>
</div>

<div class="contenedor sombra contenedor-form">
    <form class="form-inline" action="/action_page.php" id="contacto">

            <legend> Editar contacto </legend>
            <?php  include_once 'includes/layouts/form.php' ?>

    </form>

</>

<?php  include_once 'includes/layouts/footer.php' ?>