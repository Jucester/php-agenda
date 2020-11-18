<div class="campos">
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" placeholder="Enter nombre" name="nombre" value="<?= ($contacto['nombre'] ? $contacto['nombre'] : null) ?>">
                </div>

                <div class="campo">
                    <label for="ubc">Ubicacón:</label>
                    <input type="text" id="ubc" placeholder="Enter ubicación" name="ubc" value="<?= ($contacto['ubicacion'] ? $contacto['ubicacion'] : null) ?>">
                </div>

                <div class="campo">
                    <label for="phone">Teléfono:</label>
                    <input type="tel" id="phone" placeholder="Enter telephone" name="phone" value="<?= ($contacto['telefono'] ? $contacto['telefono'] : null) ?>">
                </div>
            </div>

            <div class="send">
                <?php
                    $textoBtn = $contacto['nombre'] ? 'Editar': 'Añadir'; 
                    $accionBtn = $contacto['nombre'] ? 'editar': 'crear'; 
                ?>

               <input type="hidden" id="accion" value="<?= $accionBtn ?>">
                <?php if(isset($contacto['id'])):   ?>
                    <input type="hidden" id="id" value="<?= $contacto['id']; ?>">

                <?php endif ?>
               <button type="submit" class="boton"> <?= $textoBtn ?> </button>
            </div>