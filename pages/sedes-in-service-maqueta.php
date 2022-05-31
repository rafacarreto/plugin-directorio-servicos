<!-- sedes in this service -->
<div class="" id="sedes_block">
        <p class="text--work_sans text--black-dark text--semibold text--sm text--lh-1 mb-1"><?php _e("Disponible en la sede", "f_valle_lili") ?>: </p>
        <?php 
            $disponible_en_sede = get_field('disponible_en_sede'); 
            if($disponible_en_sede){
            echo '<ul class="d-flex align-items-center p-0">';
            foreach ($disponible_en_sede as $val) {?>
            <li class="d-flex py-2 text--work_sans text--black-dark text--normal text--sm text--lh-1 border-span">
                <i class="icon-mini-arrow-right text--black-links text--xs align-items-center d-flex">
                </i>
                <a href="<?php echo $val["value"]; ?>"><?php echo $val["label"]; ?></a>
            </li>
        <?php }
            echo '</ul>';
        }
        ?>
</div>
