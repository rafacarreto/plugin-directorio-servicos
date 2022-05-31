
  <!-- Services list -->
  <div class="conatiner-fluid">
   <div class="row mx-auto">
      <div class="input-group col col-md-6  mb-3 mt-3 mx-auto">
          <div class="input-group-prepend">
              <span class="input-group-text" 
              id="inputGroup-sizing-default"><?php _e("Search"); ?></span>
          </div>
          <input type="text" id="search" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="<?php _e("Enter the term to filter services", "f_valle_lili"); ?>">
      </div>
    </div>
  
    <ul class="row justify-content-center m-0 p-0">

          <?php 

            // funcion para hacer query de servicios por sede
            function query_base_servicios_en_sedes($value_sede){
              $query = array(
                'numberposts'	=> -1,
                'post_type'		=> 'unidades_y_servicios',
                'suppress_filter' => true,
                'meta_query'	=> array(
                  'relation'		=> 'LIKE',
                  array(
                    'key'	 	=> 'disponible_en_sede',
                    'value'	  	=> $value_sede,
                    'compare' => 'LIKE'
                  )
                ) 
              );
              
              //return $query;
              $query_ressult = new WP_Query($query);

              return $query_ressult;
              
            }

            // funcion para iterar sobre los servicios y mostrar las tarjetas
            function servicios_en_sede($query_ressult){


              if( $query_ressult->have_posts() ):

                //var_dump($query_ressult);
                
                while( $query_ressult->have_posts() ): $query_ressult->the_post();
                echo '<li class="toHide col-12 col-md-3 m-1">
                <div class="card p-2">';
                //... your code
                $category = get_the_terms( $query_ressult->ID, 'unidades-medicas' );
                echo "<p class='my-0 text--xm departamento-servicio text--".$category[0]->slug."'>".($category[0]->name)."</p>";
                echo '<a class="my-0 py-0 d-block text--work_sans text--medium text--black-dark detalle-servicio" href="'.get_permalink( $query_ressult->ID ).'">';
                echo _e( the_title() , "f_valle_lili").'</a>';
                $extension = get_field('extensiones', $query_ressult->ID);
                if($extension != Null){
                echo '<p class="my-0 py-0 d-block text--work_sans text--sm text--green-dark"> Ext: '.$extension.'</p>';
                }
                echo '</div></li>';
                echo '<br/>';
            
                endwhile;
              endif;

              wp_reset_query();
            }


            if(get_the_title() === 'Sede Principal' || get_the_title() === 'Head office'){
            //Query especialidades sede Principla               
              $services_principal = query_base_servicios_en_sedes('Principal');
              servicios_en_sede($services_principal); 
            }else if(get_the_title() === 'Sede Limonar' || get_the_title() === 'Limonar Headquarters'){
            //Query especialidades sede Limonar
                $services_limonar = query_base_servicios_en_sedes('Limonar');
                servicios_en_sede($services_limonar);
            }else if(get_the_title() === 'Sede Av. Estación' || get_the_title() === 'Av. Station Headquarters'){
              //Query especialidades sede Alfaguara
                $services_avestacion = query_base_servicios_en_sedes('Av-Estación');
                servicios_en_sede($services_avestacion); 
            }else if(get_the_title() === 'Sede Alfaguara Jamundí'){
            //Query especialidades sede Alfaguara
                $services_alfaguara = query_base_servicios_en_sedes('Alfaguara');
                servicios_en_sede($services_alfaguara); 
            }else if(get_the_title() === 'Sede Betania'){
            //Query especialidades sede Betania
                $services_betania = query_base_servicios_en_sedes('Betania');
                servicios_en_sede($services_betania);
            } 
          ?>

      </div>
    </ul>
  </div>