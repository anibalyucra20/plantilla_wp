<?php
get_header();
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                    <div class="row">
                        <div class="col-6 card">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail( 'full' );
                            }
                            ?>
                        </div>
                        <div class="col-6 row">
                            <div class="card col-12" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text"><?php the_content(); ?></p>
                                    <div class="row">
                                        <button class="btn btn-danger mr-2" onclick="cambiar_cantidad('resta');">-</button>
                                        <input type="number" value="1" class="form-control col-2" id="cantidad" min="1">
                                        <button class="btn btn-primary ml-2" onclick="cambiar_cantidad('suma');">+</button>
                                        <a href="#" class="btn btn-success ml-4">Comprar</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
            else :
                _e('No se encontraron productos en la categoría seleccionada', 'textdomain');
            endif;
            ?>
        </div> <!-- container-fluid -->
    </div>
    <script>
        function cambiar_cantidad(tipo) {
            var cantidad_actual = document.getElementById('cantidad').value;
            if (tipo == "suma") {
                var cantidad_nueva = parseInt(cantidad_actual) + 1;
            } else {
                if (tipo == "resta" && cantidad_actual > 1) {
                    var cantidad_nueva = parseInt(cantidad_actual) - 1;
                } else {
                    var cantidad_nueva = 0;
                }
            }
            document.getElementById('cantidad').value = cantidad_nueva;
        }
    </script>
    <!-- End Page-content -->
    <?php
    get_footer();
    ?>