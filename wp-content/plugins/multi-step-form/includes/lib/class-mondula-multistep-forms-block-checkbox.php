<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Description of class-mondula-multistep-forms-step-options
 *
 * @author alex
 */
class Mondula_Form_Wizard_Block_Checkbox extends Mondula_Form_Wizard_Block {

    private $_label;
    private $_required;

    protected static $_type = "fw-checkbox";

    public function __construct ( $label, $required ) {
        $this->_label = $label;
        $this->_required = $required;
    }

    public function get_required( ) {
      return $this->_required;
    }

    public function get_type( ) {
        return self::$_type;
    }

    public function set_label ( $label ) {
        $this->_label = $label;
    }

    public function render ( $ids ) {
		?>
		<div class="fw-step-block" data-blockId="<?php echo $ids; ?>" data-type="<?php echo $this->_type; ?>" data-required="<?php echo $this->_required; ?>">
			<div class="fw-input-container">
				<input id="<?php echo $this->generate_id($ids) ?>" type="checkbox" class="fw-checkbox" name="<?php echo substr($this->generate_id($ids) , 0 , -2) ?>" data-id="checkbox">
				<label for="<?php echo $this->generate_id($ids) ?>"><?php echo $this->_label ?></label>
			</div>
			<div class="fw-clearfix"></div>
		</div>
		<?php
    }

    public function render_mail ( $data ) {
        echo "render_mail (checkbox)" . PHP_EOL;
        foreach ( $data as $key => $value ) {
            echo $this->_header . " : " . $this->_opts[$key] . PHP_EOL;
        }
    }

    public function as_aa() {
        return array(
            'type' => 'checkbox',
            'label' => $this->_label,
            'required' => $this->_required
        );
    }

    public static function from_aa( $aa , $current_version, $serialized_version ) {
        $label = $aa['label'];
        $required = $aa['required'];
        return new Mondula_Form_Wizard_Block_Checkbox( $label, $required );
    }
}
