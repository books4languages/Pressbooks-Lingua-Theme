<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @since      0.1
 * @package    Pressbooks_Lingua_Theme
 * @subpackage Pressbooks_Lingua_Theme/public
 * @author     23yesil <yigityesilpinar@gmail.com>
 */
class Pressbooks_Metadatatheme_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pressbooks_Metadata_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pressbooks_Metadata_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
                   $pm_BM = Pressbooks_Metadata_Book_Metadata::get_instance();
	 $meta=$pm_BM->get_current_metadata_flat();
             foreach ( $meta as $elt ) {
                        if($elt->get_name()==='Level'){
                            $level=$elt;
                        }
			
		} 
              $level=$level? strtolower($level):'';
              if(empty($level)){
                  wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pressbooks-metadata-public.css', array(), $this->version, 'all' );
              }
              else{
                  
                    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pressbooks-metadata-public-'.$level.'.css', array(), $this->version, 'all' ); 
              }
		

	}


}
