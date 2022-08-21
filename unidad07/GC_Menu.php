<!-- DISPOSICION DEL MENU -->
<?php 
        define('GC_BASE', new conexion_BD(SERVIDOR, USUARIO, PASS, BASE));
        define('GP', new gestionProductos(GC_BASE));
        define('GC', new Carrito(GC_BASE));

        if(isset($_GET['GC'])){

            switch($_GET['GC']){

                // FUNCIONES PARA VER EL CARRITO DE COMPRAS

                case 'listProd':
                    verListaProductos();
                    break;

                case 'agregarProd':
                    $cod_Producto = $_GET['COD'];
                    agregarProducto($cod_Producto);
                    break;

                case 'verCarrito':
                    verCarrito();
                    break;
                
                case 'quitarProd':
                    $cod_Producto = $_GET['COD'];
                    eliminarProducto($cod_Producto);
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
                <p class="subtitulo" >Catalogo de Productos</p>
            </div>
            <table class='tabStyled'>
                <tr>
                    <td>Imagen</td>
                    <td>Producto</td>
                    <td>Descripcion</td>
                    <td>Precio</td>
                    <td>Añadir al carrito</td>
                </tr>
    <?php
            for($i=0; $i<count($lista_prod); $i++){
                echo " <tr>
                        <td><img class='imgProducto' src='".$lista_prod[$i]['pathImg']."'></td>
                        <td>".$lista_prod[$i]['producto']." (".$lista_prod[$i]['codigo'].") </td>
                        <td>".$lista_prod[$i]['descripcion']."</td>
                        <td>".$lista_prod[$i]['precio']."</td>
                        <td class='rowAcciones'>
                        <a class='btn_action' href='unidad7.php?GC=agregarProd&COD=".$lista_prod[$i]['codigo']."' >
                            <img src='unidad07/img/Boton_agregar.png' alt='Agregar Producto al Carrito'>
                        </a>
                    </td>
                </tr>";
            }
            echo "</table>";
        }

// AGREGAR PRODUCTO AL CARRITO    
        function agregarProducto($codigo){
            if(GC->existeProducto($codigo)){
                header('Location: unidad7.php?GC=verCarrito');
                echo "<p class='error'>El producto ya esta en el catalogo</p>";
            } else{
                $prod = GP->seleccionarProducto($codigo);
                GC->agregarProducto($prod[0]['codigo'], $prod[0]['producto'], $prod[0]['descripcion'], $prod[0]['precio']);
                header('Location: unidad7.php?GC=verCarrito');
                echo "<p class='validate'>Se añadio el producto correctamente</p>";
            }
        } 

     ?>

<!-- VER CARRITO -->
    <?php 
        function verCarrito(){
            $cantProd = GC->productosCargados();

            if($cantProd > 0){
                $lista_prod = GC->listarProductos();
                echo "
                <div class='seccionEncabezado'>
                    <p class='subtitulo' >Carrito de Productos</p>
                </div>
                <table class='tabStyled'>
                    <tr>
                        <td>Producto</td>
                        <td>Descripcion</td>
                        <td>Precio</td>
                        <td>Eliminar del carrito</td>
                    </tr>
                ";
    
                for($i=0; $i<count($lista_prod); $i++){
                    echo " <tr>
                            <td>".$lista_prod[$i]['producto']." (".$lista_prod[$i]['codigo'].") </td>
                            <td>".$lista_prod[$i]['descripcion']."</td>
                            <td>".$lista_prod[$i]['precio']."</td>
                            <td class='rowAcciones'>
                            <a class='btn_action' href='unidad7.php?GC=quitarProd&COD=".$lista_prod[$i]['codigo']."' >
                                <img src='unidad07/img/Boton_eliminar.png' alt='Quitar Producto'>
                            </a>
                        </td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='error'>No hay productos en el carrito</p>";
            }

            echo "
                <a href='unidad7.php?GC=listProd' class='btnMenu' >
                    <img src='unidad07/img/Boton_Compras.png' alt='Continuar Comprando'>
                    <p>Continuar comprando</p>
                </a>";
        }
    ?>
    
<!-- ELIMINAR PRODUCTO -->
    <?php
        function eliminarProducto($codProd){
            GC->quitarProducto($codProd);
            header('Location: unidad7.php?GC=verCarrito');
            echo "<p class='validate'>Se elimino el producto correctamente</p>";
        }
    ?>

