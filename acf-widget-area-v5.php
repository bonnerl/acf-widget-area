<?php

class acf_field_widget_area extends acf_field {
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/
		
		$this->name = 'widget_area';
		
		
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		
		$this->label = __('Widget Area', 'acf-widget-area');
		
		
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		
		$this->category = 'relational';
		
		
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		
		$this->defaults = array(
			);
		
		
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('widget_area', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> __('Error! Please select a valid widget area.', 'acf-widget-area'),
		);
		
				
		// do not delete!
    	parent::__construct();
    	
	}
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field_settings( $field ) {
		
	}
	
	
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field( $field ) {
		global $wp_registered_sidebars;
		?>
		<select name="<?php echo esc_attr($field['name']) ?>" id="">
			<?php foreach ( $wp_registered_sidebars as $sidebar_id => $att ) :
				if ( 'wp_inactive_widgets' == $sidebar_id )
					continue;
				$selected = ( $field['value'] == $sidebar_id ) ? ' selected="selected"' : '';
				?>
				<option value="<?php echo $sidebar_id ?>"<?php echo $selected ?>><?php echo $att['name'] ?></option>
			<?php endforeach; ?>
		</select>
		<?php
	}
	
}


// create field
new acf_field_widget_area();

?>
