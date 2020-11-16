<?php  include_once 'includes/layouts/header.php' ?>

<div class="contenedor-button">
    <button type="submit" class="btn-voler btn">
        Volver
    </button>
</div>

<div class="contenedor sombra contenedor-form">
    <form class="form-inline" action="/action_page.php">

            <legend> Editar contacto </legend>

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

</>

<?php  include_once 'includes/layouts/footer.php' ?>