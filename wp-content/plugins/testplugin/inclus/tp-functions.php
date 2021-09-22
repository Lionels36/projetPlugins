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
		'all_items'           => __( 'Toutes les jeux Vidéos'),
		'view_item'           => __( 'Voir les jeux Vidéos'),
		'add_new_item'        => __( 'Ajouter un nouveau jeux Vidéos'),
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
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest' => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'jeux-videos'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'jeuxvideos', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );