<!-- DISPOSICION DEL MENU -->
    <?php 
        define('GP_BASE', new conexion_BD(SERVIDOR, USUARIO, PASS, BASE));
        define('GP', new gestionProductos(GP_BASE));

        if(isset($_GET['GP'])){

            switch($_GET['GP']){
                case 'listProd':
                    verListaProductos();
                    break;
    
                case 'formNewProd':
                    form_agregarProducto();
                    break;

                case 'newProd':
                    if(GP->existeProducto($_POST['codigo'])){
                        echo "<p class='error'>El codigo ingresado ya se encuentra asignado a otro producto</p>";
                    }else{
                        agregarProducto();
                    }
                    break;

                case 'formEditProd':
                    $cod_Producto = $_GET['COD'];

                    if(isset($cod_Producto) && GP->existeProducto($cod_Producto)){
                        form_actualizarProducto($cod_Producto);
                    }else{
                        echo "<p class='error'>No se asigno el codigo de producto a modificar</p>";
                    };
                    break;
            
                case 'editProd':     
                    actualizarProducto();
                    break;

                case 'formQuitProd':
                    $cod_Producto = $_GET['COD'];

                    if(isset($cod_Producto) && GP->existeProducto($cod_Producto)){
                        form_eliminarProducto($cod_Producto);
                    }else{
                        echo "<p class='error'>No se asigno el codigo de producto a eliminar</p>";
                    };
                    break;
                
                case 'quitProd':
                    eliminarProducto();
                    break;
            }
        }
    ?>


<!-- LISTADO DE PRODUCTOS -->

    <?php 
        function verListaProductos(){
            $lista_prod = GP->listarProductos();
    ?>
            <div class="seccionEncabezado">
                <p class="subtitulo" >Listado de Productos</p>
                <a href='unidad7.php?GP=formNewProd' class='btnMenu' >
                    <img src='unidad07/img/Boton_agregar.png' alt='Agragar item'>
                    <p>Añadir producto</p>
                </a>
            </div>
            <table class='tabStyled'>
                <tr>
                    <td>Codigo</td>
                    <td>Producto</td>
                    <td>Descripcion</td>
                    <td>Categoria</td>
                    <td>Precio</td>
                    <td>Ruta Imagen</td>
                    <td>Acciones</td>
                </tr>
    <?php
            for($i=0; $i<count($lista_prod); $i++){
                echo " <tr>
                        <td>".$lista_prod[$i]['codigo']."</td>
                        <td>".$lista_prod[$i]['producto']."</td>
                        <td>".$lista_prod[$i]['descripcion']."</td>
                        <td>".$lista_prod[$i]['categoria']."</td>
                        <td>".$lista_prod[$i]['precio']."</td>
                        <td>".$lista_prod[$i]['pathImg']."</td>
                        <td class='rowAcciones'>
                        <a class='btn_action' href='unidad7.php?GP=formEditProd&COD=".$lista_prod[$i]['codigo']."' >
                            <img src='unidad07/img/Boton_Editar.png' alt='Editar'>
                        </a>
                        <a class='btn_action' href='unidad7.php?GP=formQuitProd&COD=".$lista_prod[$i]['codigo']."' >
                            <img src='unidad07/img/Boton_Eliminar.png' alt='Eliminar'>
                        </a>
                    </td>
                </tr>";
            }
            echo "</table>";
        }
    ?>
            

<!-- CARGA DE PRODUCTOS -->
<!-- Productos de Ejemplo: https://www.musimundo.com/hogar-y-aire-libre/muebles/c/218 -->
    <?php 
        function form_agregarProducto(){
            echo "
                <p class='subtitulo'>Carga de Producto<p>
                <form action='unidad7.php?GP=newProd' method='POST' class='form_Divided'>
                    <input type='text' name='codigo' placeholder='Codigo' required>
                    <input type='text' name='producto' placeholder='Nombre' required>
                    <input type='text' name='descripcion' placeholder='Descripcion' required>
                    <select name='categoria' required>
                        <option value='Mueble'>Mueble</option>
                        <option value='Libreria'>Libreria</option>
                        <option value='Almacen'>Almacen</option>
                    </select>
                    <input type='number' name='precio' placeholder='Precio' required>
                    <input type='text' name='pathImagen' placeholder='Ruta de imagen' required>
                    <input type='submit' value='Cargar'>
                </form>
            ";
        }

        function agregarProducto(){
                GP->agregarProducto(
                    $_POST['codigo'], $_POST['producto'], $_POST['descripcion'], $_POST['categoria'], $_POST['precio'], $_POST['pathImagen']
                );
                header('Location: unidad7.php?GP=listProd');
                echo "<p class='validate'>Se añadio el producto correctamente</p>";
        }
    ?>


<!-- MODIFICAR DATOS DE PRODUCTO -->
    <?php 
        function form_actualizarProducto($cod){
            $producto = GP->seleccionarProducto($cod);
            echo "
                <p class='subtitulo'>Modificar Producto<p>
                <form action='unidad7.php?GP=editProd' method='POST' class='form_Divided'>
                    <input type='text' name='codigo' placeholder='Codigo' value='".$producto[0]['codigo']."' required readonly>
                    <input type='text' name='producto' placeholder='Nombre' value='".$producto[0]['producto']."' required>
                    <input type='text' name='descripcion' placeholder='Descripcion' value='".$producto[0]['descripcion']."' required>
                    <select name='categoria' value='".$producto[0]['categoria']."' required>
                        <option value='Mueble'>Mueble</option>
                        <option value='Libreria'>Libreria</option>
                        <option value='Almacen'>Almacen</option>
                    </select>
                    <input type='number' name='precio' placeholder='Precio' value='".$producto[0]['precio']."' required>
                    <input type='text' name='pathImagen' placeholder='Ruta de imagen' value='".$producto[0]['pathImg']."' required>
                    <input type='submit' value='Actualizar'>
                </form>
            ";
        }

        function actualizarProducto(){
            $respuesta = GP->actualizarProducto(
                $_POST['codigo'], $_POST['producto'], $_POST['descripcion'], $_POST['categoria'], $_POST['precio'], $_POST['pathImagen']
            );
            header('Location: unidad7.php?GP=listProd');
            echo "<p class='validate'>Se actualizo el producto correctamente</p>";
        }
    ?>

<!-- ELIMINAR PRODUCTO -->
    
    <?php 
        function form_eliminarProducto($cod){
            $producto = GP->seleccionarProducto($cod);
            $codProd = $producto[0]['codigo'];
            $nomProd = $producto[0]['producto'];
            echo "
                <p class='subtitulo'>Eliminar Producto<p>
                <p>¿Esta seguro que desea eliminar el producto: $nomProd ($codProd)?</p>
                <form action='unidad7.php?GP=quitProd' method='POST' id='form_eliminar'>
                    <input type='hidden' name='codigo' value='$codProd'>
                    <input type='submit' name='confirmar' value='Si'>
                    <input type='submit' name='confirmar' value='No'>
                </form>
            ";
        }

        function eliminarProducto(){
            $respuesta = $_POST['confirmar'];
            $codProd = $_POST['codigo'];

            if($respuesta == 'Si'){
                GP->quitarProducto($codProd);
                header('Location: unidad7.php?GP=listProd');
                echo "<p class='validate'>Se elimino el producto correctamente</p>";
            } else{
                header('Location: unidad7.php?GP=listProd');
                echo "<p class='error'>Se cancelo la solicitud</p>";
            }
        }

    ?>