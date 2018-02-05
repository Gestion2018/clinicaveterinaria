<?php

include './enfermedadesComunesBusiness.php';

if (isset($_POST['actualizar'])) {

    if ( isset($_POST['enfermedadesComunesId']) && isset($_POST['enfermedadesComunesNombre']) && isset($_POST['enfermedadesComunesDescripcion']) && isset($_POST['enfermedadesComunesEstado'])) {
            
        $enfermedadesComunesId = $_POST['enfermedadesComunesId'];
        $enfermedadesComunesNombre = $_POST['enfermedadesComunesNombre'];
        $enfermedadesComunesDescripcion = $_POST['enfermedadesComunesDescripcion'];
        $enfermedadesComunesEstado = $_POST['enfermedadesComunesEstado'];
        $enfermedadesComunesProductosUsados = $_POST['enfermedadesComunesProductosUsados'];
        

        if (strlen($enfermedadesComunesNombre) > 0 && strlen($enfermedadesComunesDescripcion) > 0) {
            if (!is_numeric($enfermedadesComunesNombre)) {

                $enfermedadesComunes = new enfermedadescomunes($enfermedadesComunesId, $enfermedadesComunesNombre, $enfermedadesComunesDescripcion, 0, $enfermedadesComunesEstado, $enfermedadesComunesProductosUsados);

                $enfermedadesComunesBusiness = new EnfermedadesComunesBusiness();

                $resultado = $enfermedadesComunesBusiness->actualizarTBEnfermedadesComunes($enfermedadesComunes);
                if ($resultado == 1) {
                    header("location: ../../view/enfermedadesComunesView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../../view/enfermedadesComunesView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/enfermedadesComunesView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/enfermedadesComunesView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location:../../view/enfermedadesComunesView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['enfermedadesComunesId'])) {

        $enfermedadesComunesId = $_POST['enfermedadesComunesId'];

        $enfermedadesComunesBusiness = new EnfermedadesComunesBusiness();
        $resultado = $enfermedadesComunesBusiness->eliminarTBEnfermedadesComunes($enfermedadesComunesId);

        if ($resultado == 1) {
            header("location: ../../view/enfermedadesComunesView.php?success=deleted");
        } else {
            header("location: ../../view/enfermedadesComunesView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/enfermedadesComunesView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['enfermedadesComunesNombre']) && isset($_POST['enfermedadesComunesDescripcion']) && isset($_POST['enfermedadesComunesSintomas']) && isset($_POST['enfermedadesComunesProductosUsados']) && isset($_POST['enfermedadesComunesEstado'])) {
            
        $enfermedadesComunesNombre = $_POST['enfermedadesComunesNombre'];
        $enfermedadesComunesDescripcion = $_POST['enfermedadesComunesDescripcion'];
        $enfermedadesComunesSintomas = $_POST['enfermedadesComunesSintomas'];
        $enfermedadesComunesProductosUsados = $_POST['enfermedadesComunesProductosUsados'];
        $enfermedadesComunesEstado = $_POST['enfermedadesComunesEstado'];
        
        if (strlen($enfermedadesComunesNombre) > 0 && strlen($enfermedadesComunesDescripcion) > 0 && strlen($enfermedadesComunesSintomas) > 0 && strlen($enfermedadesComunesProductosUsados) > 0) {
            if (!is_numeric($enfermedadesComunesNombre) && !is_numeric($enfermedadesComunesProductosUsados)) {
                
                $enfermedadesComunes = new enfermedadescomunes(0, $enfermedadesComunesNombre, $enfermedadesComunesDescripcion, $enfermedadesComunesSintomas, $enfermedadesComunesEstado, $enfermedadesComunesProductosUsados);

                $enfermedadesComunesBusiness = new EnfermedadesComunesBusiness();

                $resultado = $enfermedadesComunesBusiness->insertarTBEnfermedadesComunes($enfermedadesComunes);

                /*if ($resultado == 1) {
                    header("location: ../../view/enfermedadesComunesView.php?success=inserted");
                } else {
                    header("location: ../../view/enfermedadesComunesView.php?error=dbError");
                }//if error a nivel de base*/
            } else {
                header("location: ../../view/enfermedadesComunesView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/enfermedadesComunesView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/enfermedadesComunesView.php?error=error");
    }//if si esta seteado el campo
}else if(isset($_POST['agregarSintoma'])){
    $enfermedadesComunesId = $_POST['enfermedadesComunesId'];
    $sintoma = $_POST['sintomas'];

    if($sintoma != "-1"){
        $enfermedadesComunesBusiness = new EnfermedadesComunesBusiness();
        $resultado = $enfermedadesComunesBusiness->insertarTBSintoma($enfermedadesComunesId, $sintoma);

        if ($resultado == 1) {
            header("location: ../../view/enfermedadesComunesView.php?success=success");
        } else {
            header("location: ../../view/enfermedadesComunesView.php?error=dbError");
        }//if
    }else{
        header("location: ../../view/enfermedadesComunesView.php");
    }
}else if(isset($_POST['eliminarSintoma'])){
    $enfermedadesComunesId = $_POST['enfermedadesComunesId'];
    $sintoma = $_POST['sintomasRegistrados'];

    $enfermedadesComunesBusiness = new EnfermedadesComunesBusiness();
    $resultado = $enfermedadesComunesBusiness->eliminarTBSintoma($enfermedadesComunesId, $sintoma);

    if ($resultado == 1) {
        header("location: ../../view/enfermedadesComunesView.php?success=success");
    } else {
        header("location: ../../view/enfermedadesComunesView.php?error=dbError");
    }
}else if(isset($_POST['agregarProducto'])){
    $enfermedadId = $_POST['enfermedadesComunesId'];
    $Seleccionado = $_POST['productosUsados'];
    $Anteriores = $_POST['enfermedadesComunesProductosUsados'];

    if($Seleccionado != "-1"){
        $enfermedadesComunesBusiness = new EnfermedadesComunesBusiness();
        $resultado = $enfermedadesComunesBusiness->actualizarProductos($enfermedadId, $Seleccionado, $Anteriores);

        if ($resultado == 1) {
            header("location: ../../view/enfermedadesComunesView.php?success=success");
        } else {
            header("location: ../../view/enfermedadesComunesView.php?error=dbError");
        }//if-else
    }else{
        header("location: ../../view/enfermedadesComunesView.php");
    }//if

}//if
?>
