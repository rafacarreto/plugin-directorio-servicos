<div class="row w-100 tab-pane fade show active my-4 mx-auto" id="home" role="tabpanel" aria-labelledby="home-tab">

<?php
    $args = array (
        'orderby' => 'title',
        'order' => 'ASC',
        'post_type' => 'unidades_y_servicios',
        'posts_per_page' => -1
    );
    $unidades = query_posts($args);

    if ($unidades) {
?>

<div class="row mx-auto">
    <div class="input-group col col-md-6  mb-3 mt-3 mx-auto">
        <div class="input-group-prepend">
            <span class="input-group-text" 
            id="inputGroup-sizing-default"><?php _e("Search"); ?></span>
        </div>
        <input type="text" id="search" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="<?php _e("Enter the term to filter services", "f_valle_lili"); ?>">
    </div>
</div>

<div class="card mb-3 border-0">
        
    <div class="card-body mb-0">

        <ul class="row p-0 mb-0 mx-3 d-flex justify-content-center">
            <?php
            foreach ($unidades as $unidad){
            ?>
                <li class="toHide col-12 col-sm-6 col-md-4 py-2 info-servicios align-items-center">

                        <?php 
                            $category = get_the_terms( $unidad->ID, 'unidades-medicas' );
                            echo "<p class='my-2 text--xm departamento-servicio text--".$category[0]->slug."'>".($category[0]->name)."</p>";
                        ?>
                        <a class="d-block text--work_sans text--sm text--medium text--black-dark py-2 detalle-servicio" href="<?php echo get_permalink($unidad->ID); ?>">
                            <?php 
                            echo "<h6>".$unidad->post_title . "</h6>"; 
                            ?>
                        </a>
                        <span class="d-block text--work_sans text--sm text--medium text--green-dark py-2">                                                        
                            <?php 
                            $extension = get_field('extensiones', $unidad->ID);
                            if($extension != Null){
                            echo ' Ext: '.$extension;
                            }
                            ?>
                        </span>

                </li>

            <?php } //foreach ?>
        </ul>

    </div>
        
</div>
<?php }//if ?>


</div>