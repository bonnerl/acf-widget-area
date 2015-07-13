<?php

class acf_field_widget_area extends acf_field {
	
	// vars
	var $settings, // will hold info such as dir / path
		$defaults; // will hold default field options
		
		
	/*
	*  __construct
	*
	*  Set name / label needed for actions / filters
	*
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function __construct()
	{
		// vars
		$this->name = 'widget_area';
		$this->label = __('Widget Area');
		$this->category = __("Relational",'acf'); // Basic, Content, Choice, etc
		$this->defaults = array(
		);
		
		
		// do not delete!
    	parent::__construct();
    	
    	
    	// settings
		$this->settings = array(
			'path' => apply_filters('acf/helpers/get_path', __FILE__),
			'dir' => apply_filters('acf/helpers/get_dir', __FILE__),
			'version' => '1.0.0'
		);

	}
	
	
	/*
	*  create_options()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like below) to save extra data to the $field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field	- an array holding all the field's data
	*/
	
	function create_options( $field )
	{	
	}
	
	
	/*
	*  create_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function create_field( $field )
	{
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
