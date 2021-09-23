<?php /*
* On utilise une fonction pour créer notre custom post type 'Séries TV'
*/

function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Jeux Vidéos', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Jeux Vidéos', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Jeux Vidéos'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Tous les jeux Vidéos'),
		'view_item'           => __( 'Voir les jeux Vidéos'),
		'add_new_item'        => __( 'Ajouter un nouveau jeu vidéo'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer le jeu Vidéo'),
		'update_item'         => __( 'Modifier le jeu Vidéo'),
		'search_items'        => __( 'Rechercher un jeu Vidéo'),
		'not_found'           => __( 'Non trouvé'),
		'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Jeux Vidéos'),
		'description'         => __( 'Tout sur les jeux Vidéos'),
		'labels'              => $labels,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest' => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'jeux-videos'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "jeux videos" et ses arguments
	register_post_type( 'jeuxvideos', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );


add_action( 'init', 'wpm_add_taxonomies', 0 );

//On crée 3 taxonomies personnalisées: Année, Réalisateurs et Catégories de jeux videos.

function wpm_add_taxonomies() {

    
	
	// Taxonomie Developpeur

	// On déclare ici les différentes dénominations de notre taxonomie qui seront affichées et utilisées dans l'administration de WordPress
	$labels_developpeurs = array(
		'name'              			=> _x( 'Developpeurs', 'taxonomy general name'),
		'singular_name'     			=> _x( 'Developpeurs', 'taxonomy singular name'),
		'search_items'      			=> __( 'Chercher un developpeur'),
		'all_items'        				=> __( 'Tous les developpeurs'),
		'edit_item'         			=> __( 'Editer le developpeur'),
		'update_item'       			=> __( 'Mettre à jour le developpeur'),
		'add_new_item'     				=> __( 'Ajouter un nouveau developpeur'),
		'new_item_name'     			=> __( 'Valeur du nouveau developpeur'),
		'separate_items_with_commas'	=> __( 'Séparer les developpeurs avec une virgule'),
		'menu_name'         => __( 'Developpeurs'),
	);

	$args_developpeurs = array(
	// Si 'hierarchical' est défini à false, notre taxonomie se comportera comme une étiquette standard
		'hierarchical'      => false,
		'labels'            => $labels_developpeurs,
		'show_ui'           => true,
		‘show_in_rest’ => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'developpeurs' ),
	);

	register_taxonomy( 'developpeur', 'jeuxvideos', $args_developpeurs );

	// Taxonomie Consoles
	
	$labels_consoles = array(
		'name'                       => _x( 'Consoles', 'taxonomy general name'),
		'singular_name'              => _x( 'Consoles', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher une console'),
		'popular_items'              => __( 'Consoles populaires'),
		'all_items'                  => __( 'Toutes les consoles'),
		'edit_item'                  => __( 'Editer une console'),
		'update_item'                => __( 'Mettre à jour une console'),
		'add_new_item'               => __( 'Ajouter une nouvelle console'),
		'new_item_name'              => __( 'Nom de la nouvelle console'),
		'separate_items_with_commas' => __( 'Séparer les consoles avec une virgule'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer une console'),
		'choose_from_most_used'      => __( 'Choisir parmi les plus utilisés'),
		'not_found'                  => __( 'Pas de console trouvés'),
		'menu_name'                  => __( 'Consoles'),
	);

	$args_consoles = array(
		'hierarchical'          => false,
		'labels'                => $labels_consoles,
		'show_ui'               => true,
		'show_in_rest'			=> true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'consoles' ),
	);

	register_taxonomy( 'consoles', 'jeuxvideos', $args_consoles );
	
	// Catégorie de genres

	$labels_genre = array(
		'name'                       => _x( 'Genre', 'taxonomy general name'),
		'singular_name'              => _x( 'Genre', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher un genre'),
		'popular_items'              => __( 'Genre populaires'),
		'all_items'                  => __( 'Toutes les genres'),
		'edit_item'                  => __( 'Editer un genre'),
		'update_item'                => __( 'Mettre à jour un genre'),
		'add_new_item'               => __( 'Ajouter un nouveau genre'),
		'new_item_name'              => __( 'Nom du nouveau genre'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer un genre'),
		'choose_from_most_used'      => __( 'Choisir parmi les genres les plus utilisées'),
		'not_found'                  => __( 'Pas de genres trouvés'),
		'menu_name'                  => __( 'Genres de jeux videos'),
	);

	$args_genre = array(
	// Si 'hierarchical' est défini à true, notre taxonomie se comportera comme une catégorie standard
		'hierarchical'          => true,
		'labels'                => $labels_genre,
		'show_ui'               => true,
		'show_in_rest'			=> true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'genre' ),
	);
    register_taxonomy( 'genres', 'jeuxvideos', $args_genre );
}
/* ajouter champ "Extrait" dans les page WP */
function ajouter_extrait_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'ajouter_extrait_pages' );

//--------------------------------SHORTCODE-------------------------------------------
//Fonction appelée au shortcode
function cptID($atts){
	extract($atts);
	if (isset($id)) {

		//$post devient le post à l'id n°atts
		$post = get_post($id);

		//On affiche les valeurs du post
		echo $post->post_title;
		echo $post->post_content;
	}
}
//Fonction qui enregistre le shortcode
add_shortcode('jeuid', 'cptID');







/*function tax($atts){
	$atts = shortcode_atts( array(
		'default' => ''
	  ), $atts );
	
		$terms = get_terms('genres');
       

	    wp_reset_query();
		$args = array('post_type' => 'jeuxvideos',
		
		  'tax_query' => array(
			array(
			  'taxonomy' => 'genres',
			  'field' => 'slug',
			  'terms' => $atts,
			),
		  ),
		 );
		 var_dump ($args);
		 
		 $loop = new WP_Query($args);
		 if($loop->have_posts()) {
			while($loop->have_posts()) : $loop->the_post();
				echo ' "'.get_the_title().'" ';
			endwhile;
		 }
	
	}

	
add_shortcode('tax', 'tax');*/

//Prend 2 paramètres : $tax et $id 
//Exemple : [findTax tax=nomTaxonomie id=sousNomTaxonomie]
function tax($atts){
	//Récuperation des paramètres du shortcode $id et $tax
	extract($atts);

	//Récuperation de la taxonomie (Genres, auteurs ou consoles)
	$custom_terms = get_terms($tax);


	foreach($custom_terms as $custom_term) {
    wp_reset_query();
    $args = array('post_type' => 'jeuxvideos', //<= Post type = votre CPT !!!
        'tax_query' => array(
            array(
                'taxonomy' => $tax, //<= Votre nom de taxonomie!!!
                'field' => 'slug',
                'terms' => $custom_term->slug,
            ),
        ),
     );

	 //Loop pour parcourir les posts
     $loop = new WP_Query($args);

	 //<= Votre sous-nom de taxonomie (ici $id) pour n'afficher que la bonne
     if(($loop->have_posts()) && ($id == $custom_term->name)) { 
        echo '<h2>'.$custom_term->name.'</h2>';

        while($loop->have_posts()) : $loop->the_post();
            echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
        endwhile;
     }
	}
}

	
add_shortcode('findTax', 'tax');


/*function shortcode_bienvenue(){
    return "<h2>Bienvenue chez karac !</h2>";
}
add_shortcode('bienvenue', 'shortcode_bienvenue');*/