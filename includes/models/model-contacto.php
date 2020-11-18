<?php
    include('../functions/bd.php');

    if($_POST['accion'] == 'crear') {

        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $ubicacion = filter_var($_POST['ubicacion'], FILTER_SANITIZE_STRING);
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);

        try {
            $query = $conn->prepare("INSERT INTO contactos (nombre, ubicacion, telefono) VALUES (?, ?, ?)");
            $query->bind_param("sss", $nombre, $ubicacion, $telefono);
            $query->execute();
            if($query->affected_rows == 1) {
                $res = [
                    'respuesta' => 'correcto',
                    'datos' => array(
                        'nombre' => $nombre,
                        'ubicacion' => $ubicacion,
                        'telefono' => $telefono,
                        'id' => $query->insert_id
                    )
                    ];
            }
            $query->close();
            $conn->close();
          
        } catch(Exception $e) {
            $res = array(
                'error' => $e->getMessage()
            );
        }
        echo json_encode($res);
        
    }   


    if($_GET['accion'] == 'borrar') {
        
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        try {

            $query = $conn->prepare("DELETE FROM contactos WHERE id = ? ");
            $query->bind_param("i", $id);
            $query->execute();
            if($query->affected_rows == 1){
                $res = array(
                    'respuesta' => 'correcto'
                );
            }
            
            $query->close();
            $conn->close();

        } catch (Exception $e) {
            $res = array(
                'error' => $e->getMessage()
            );
        }

        echo json_encode(($res));
    }