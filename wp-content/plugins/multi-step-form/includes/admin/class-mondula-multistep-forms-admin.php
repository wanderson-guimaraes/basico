<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class-mondula-multistep-forms-admin
 *
 * @author alex
 */
class Mondula_Form_Wizard_Admin {

	private $_wizard_service;

	private $_token;

	private $_assets_url;

	private $_script_suffix;

	private $_version;


	public function __construct( Mondula_Form_Wizard_Wizard_Service $wizard_service, $token, $assets_url, $script_suffix, $version ) {
		$this->_wizard_service = $wizard_service;
		$this->_token = $token;
		$this->_assets_url = $assets_url;
		$this->_script_suffix = $script_suffix;
		$this->_version = $version;
		$this->init();
	}

	private function init() {
			add_action( 'admin_menu', array( $this, 'setup_menu' ) );
			add_action( 'admin_init', array( $this, 'download_form_json' ) );

			add_action( 'wp_ajax_fw_wizard_save', array( $this, 'save' ) );
			add_action( 'wp_ajax_nopriv_fw_wizard_save', array( $this, 'save' ) );
	}

	public function setup_menu() {
			$all = add_menu_page( 'Multi Step Form', 'Multi Step Form', 'manage_options', 'mondula-multistep-forms', array( $this, 'menu' ), 'dashicons-feedback', '35' );
			add_submenu_page( 'mondula-multistep-forms', 'Multi Step Form List', 'Forms', 'manage_options', 'mondula-multistep-forms', array( $this, 'menu' ) );
			$add = add_submenu_page( 'mondula-multistep-forms', 'Mondula List Table', 'Add New', 'manage_options', 'mondula-multistep-forms&edit', array( $this, 'menu' ) );
			do_action( 'msf_submenus' );
			add_action( 'admin_print_styles-' . $all, array( $this, 'admin_js' ) );
			add_action( 'admin_print_styles-' . $add, array( $this, 'admin_js' ) );
	}

	public static function get_translation() {
		return array(
			'tooltips' => array(
				'title' => __( 'The step title is displayed below the progress bar', 'multi-step-form' ),
				'headline' => __( 'The step headline is displayed above the progress bar' , 'multi-step-form' ),
				'copyText' => __( 'The step description is displayed below the step headline' , 'multi-step-form' ),
				'removeStep' => __( 'remove step', 'multi-step-form' ),
				'removeSection' => __( 'remove section', 'multi-step-form' ),
				'removeBlock' => __( 'remove element', 'multi-step-form' ),
				'multiChoice' => __( 'Multi-Select uses checkboxes. Single-Select has radio-buttons.', 'multi-step-form' ),
				'paragraph' => __( 'Provide a static text block for explanations or additional info. You can use HTML for formatting.', 'multi-step-form' ),
				'dateformat' => __( 'click for date format specifications', 'multi-step-form' ),
			),
			'alerts' => array(
				'invalidEmail' => __( 'You need to enter a valid email address', 'multi-step-form' ),
				'noSubject' => __( 'You need to provide an email subject', 'multi-step-form' ),
				'noStepTitle' => __( 'WARNING: You need to provide a title for each step', 'multi-step-form' ),
				'noSectionTitle' => __( 'WARNING: You need to provide a title for each section', 'multi-step-form' ),
				'noFormTitle' => __( 'WARNING: You need to provide title for the form', 'multi-step-form' ),
				'onlyFive' => __( 'ERROR: only 5 steps are allowed in the free version', 'multi-step-form' ),
				'onlyTen' => __( 'ERROR: only 10 steps are possible', 'multi-step-form' ),
				'reallyDeleteStep' => __( 'Do you really want to delete this step?', 'multi-step-form' ),
				'reallyDeleteSection' => __( 'Do you really want to delete this section?', 'multi-step-form' ),
				'reallyDeleteBlock' => __( 'Do you really want to delete this block?', 'multi-step-form' ),
			),
			'title' => __( 'Step Title', 'multi-step-form' ),
			'headline' => __( 'Step Headline', 'multi-step-form' ),
			'copyText' => __( 'Step description', 'multi-step-form' ),
			'partTitle' => __( 'Section Title', 'multi-step-form' ),
			'addStep' => __( 'Add Step', 'multi-step-form' ),
			'addSection' => __( 'Add Section', 'multi-step-form' ),
			'addElement' => __( 'Add Element', 'multi-step-form' ),
			'label' => __( 'Label', 'multi-step-form' ),
			'dateformat' => __( 'Date Format', 'multi-step-form' ),
			'required' => __( 'Required', 'multi-step-form' ),
			'radio' => array(
				'header' => __( 'Header', 'multi-step-form' ),
				'option' => __( 'Option', 'multi-step-form' ),
				'options' => __( 'Options', 'multi-step-form' ),
				'addOption' => __( 'Add option', 'multi-step-form' ),
				'multiple' => __( 'Multiple Selection', 'multi-step-form' ),
			),
			'select' => array(
				'options' => __( 'Options (one per line)', 'multi-step-form' ),
				'search' => __( 'Enable search', 'multi-step-form' ),
				'placeholder' => __( 'Set placeholder', 'multi-step-form' ),
			),
			'paragraph' => array(
				'textHtml' => __( 'Text/HTML', 'multi-step-form' ),
				'text' => __( 'Paragraph text', 'multi-step-form' ),
			),
			'registration' => array(
				'info' => __( 'Please select the registration fields to be displayed to the user. Email is always required. If the user does not specify a username or password, WordPress is auto-generating these and sending them to the user via email.', 'multi-step-form' ),
				'loggedin' => __( 'You are already registered and logged in.', 'multi-step-form' ),
				'username' => __( 'Username', 'multi-step-form' ),
				'email' => __( 'Email', 'multi-step-form' ),
				'password' => __( 'Password', 'multi-step-form' ),
				'password-confirm' => __( 'Confirm Password', 'multi-step-form' ),
				'firstname' => __( 'First Name', 'multi-step-form' ),
				'lastname' => __( 'Last Name', 'multi-step-form' ),
				'website' => __( 'Website', 'multi-step-form' ),
				'bio' => __( 'Biographical Info', 'multi-step-form' ),
			),
		);
	}

	public function admin_js() {
		$edit = isset( $_GET['edit'] );

		if ( $edit ) {
			$id = isset( $_GET['edit'] ) ? $_GET['edit'] : '';
			$json = $this->_wizard_service->get_as_json( $id );
			$i18n = $this->get_translation();

			wp_register_script( $this->_token . '-backend', esc_url( $this->_assets_url ) . 'backend' . $this->_script_suffix . '.js', array( 'postbox', 'jquery-ui-dialog', 'jquery-ui-sortable', 'jquery-ui-draggable', 'jquery-ui-droppable', 'jquery-ui-tooltip', 'jquery' ), $this->_version );
			$ajax = array(
				'i18n' => $i18n,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'id' => $id,
				'nonce' => wp_create_nonce( $this->_token . $id ),
				'json' => $json,
			);
			wp_localize_script( $this->_token . '-backend', 'wizard', $ajax ); // array( 'i18n' => $i18n, 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'json' => $json ) );
			wp_enqueue_script( $this->_token . '-backend' );

			wp_register_style( $this->_token . '-backend', esc_url( $this->_assets_url ) . 'backend' . $this->_script_suffix . '.css', array(), $this->_version );
			wp_enqueue_style( $this->_token . '-backend' );
		}
	}

	public function menu() {
		$edit_url = esc_url(
			add_query_arg(
				array(
					'edit' => '',
				)
			)
		);
		$edit = isset( $_GET['edit'] );
		$delete = isset( $_GET['delete'] );
		$duplicate = isset( $_GET['duplicate'] );

		if ( $edit ) {
			$this->edit( $_GET['edit'] );
		} elseif ( $delete ) {
			$this->delete( $_GET['delete'] );
		} elseif ( $duplicate ) {
			$this->duplicate( $_GET['duplicate'] );
		} else {
			//$this->wizard_list();
			$this->table();
		}
	}

	public function delete( $id ) {
		$this->_wizard_service->delete( $id );
		$this->table();
	}

	public function bulk_delete( $ids ) {
		foreach ( $ids as $id ) {
			$this->_wizard_service->delete( $id );
		}
		$this->table();
	}

	public function duplicate( $id ) {
		$this->_wizard_service->duplicate( $id );
		$this->table();
	}

	/**
	 * Render a notice on the current page.
	 * $type error, warning, success, info
	 */
	private function notice( $type, $message ) {
		?>
		<div class="notice notice-<?php echo $type; ?> is-dismissible">
			<p><?php echo $message; ?></p>
		</div>
		<?php
	}

	function add_json_mime( $mime_types ) {
		$mime_types['json'] = 'application/json'; //Adding svg extension
		return $mime_types;
	}

	private function import_json( $json ) {
		$aa = json_decode( $json, true );
		if ( ! $aa ) {
			$this->notice( 'error', __( 'Invalid JSON-File. Check your syntax.', 'multi-step-form' ) );
		} else {
			if ( ! class_exists( 'Multi_Step_Form_Plus' ) ) {
				$step_count = count( $aa['wizard']['steps'] );
				for ( $i = 0; $i < $step_count; $i++ ) {
					if ( $i > 4 ) {
						unset( $aa['wizard']['steps'][ $i ] );
					}
				}
			}
			$this->_wizard_service->save( 0, $aa );
		}
	}

	private function handle_json_upload() {
		if ( isset( $_FILES['json-import'] ) ) {
			$overrides = array(
				'test_form' => false,
			);
			// enable JSON upload
			add_filter( 'upload_mimes', array( $this, 'add_json_mime') , 1, 1 );
			$uploaded = wp_handle_upload( $_FILES['json-import'], $overrides );
			// disable JSON upload
			remove_filter( 'upload_mimes', array( $this, 'add_json_mime') , 1, 1 );
			// Error checking using WP functions
			if ( isset( $uploaded['error'] ) ) {
				$this->notice( 'error', $uploaded['error'] );
			} elseif ( isset( $uploaded['type'] ) && $uploaded['type'] != 'application/json' ) {
				$this->notice( 'error', __( 'Forms must be imported as JSON files', 'multi-step-form' ) );
			} elseif ( isset( $uploaded['file'] ) && isset( $uploaded['url'] ) ) {
				$this->import_json( file_get_contents( $uploaded['file'] ) );
			}
		}
	}

	public function table() {
		$table = new Mondula_Form_Wizard_List_Table( $this->_wizard_service );
		$this->handle_json_upload();
		$table->prepare_items();
		$edit_url = esc_url(
			add_query_arg(
				array(
					'edit' => '',
				)
			)
		);
		?>
		<div class="wrap">
			<div id="icon-users" class="icon32"></div>
			<h2>Multi Step Forms
				<a href="<?php echo $edit_url; ?>" class="page-title-action">
					<?php _e( 'Add New', 'multi-step-form' ); ?>
				</a>
			</h2>
			<form id="fw-wizard-table" method="get">
				<input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>" />
				<?php $table->display(); ?>
			</form>
			<h2><?php echo __( 'Import a Form', 'multi-step-form' ); ?></h2>
			<form id="msf-import" method="post" enctype="multipart/form-data">
				<input type='file' id='json-import' name='json-import'></input>
				<input name="submit" id="submit" class="button button-primary" value="<?php echo __( 'Upload & Import', 'multi-step-form' ); ?>" type="submit">
			</form>
		</div>
		<?php
		if ( ! is_plugin_active( 'multi-step-form-plus/multi-step-form-plus.php' ) ) {
			?>
			<style>
				.wrap {
					width: 75%; 
					float: left;
					margin-right: 0px;
				}

				#msf-sidebar-container {
					width: 260px;
					padding: 0 0 0 30px;
					float: left;
					width: 20%;
					margin-top: 20px;
				}

				#sidebar {
					padding: 10px 15px 20px 15px;
					background:#fff;
					box-sizing: border-box;
					border: 1px solid #ddd;
				}

				#sidebar h2 {
					font-size: 22px;
					font-weight: 400;
					margin: 10px 0px 20px 0px;
					color:#00b0a4;
				
				}
			
				#sidebar h4 {
					margin: 20px 0px 0px 0px;
					color:#ff6d00;
				
				}
				
				#sidebar p {
					color:#777;
					margin: 0px 0px 20px 0px;
				}
				
				
				img {
					width: 100%;
					height: auto;
				}
			</style>
			<div class="msf_content_cell" id="msf-sidebar-container">
				<div id="sidebar">
					<div>
						<h2>Multi Step Form Plus</h2> 
						<h4>Up to 10 steps</h4> 
						<p>
							You can now divide your form in up to 10 Steps.
						</p>
						<h4>Save and export Form Data</h4> 
						<p>
							With PLUS, you can save filled forms in the database and export them as CSV
						</p>
						<h4>Conditional fields</h4> 
						<p>
							You want to bring more flexibility into your forms? Use conditional fields.
						</p>
						<p>
							<a href="https://mondula.com/multi-step-form-plus/" target="_blank"><img src="https://mondula.com/wp-content/uploads/2017/09/msf_plus_extension.png" alt="MSF Plus"></a> 
						</p>
						<p>
							<a class="button button-primary" href="https://mondula.com/multi-step-form-plus/" target="_blank">Get Multi Step Form Plus</a> 
						</p>
					</div>
				</div>
			</div>
		<?php
		}
	}

	public function wizard_list() {
		$edit_url = esc_url(
			add_query_arg(
				array(
					'edit' => '',
				)
			)
		);
		?>
		<div class="wrap">
			<h2>Wizard <a class="add-new-h2" href="<?php echo $edit_url; ?>">Add new</a></h2>
			<ul class="subsubsub"></ul>
			<form>
				<div class="tablenav top"></div>
				<table class="wp-list-table widefat fixed striped posts">
					<thead>
						<tr>
							<th scope="col">Titel</th>
							<th scope="col">Shortcode</th>
							<th scope="col">Datum</th>
						</tr>
					</thead>
				</table>
			</form>
		</div>
		<?php
	}

	public function edit( $id ) {
		add_thickbox();
		?>
		<div id="fw-alert">
			Success. Wizard saved.
		</div>
		<div class="wrap">
			<h2 class="nav-tab-wrapper">
				<a class="nav-tab nav-tab-active" id="fw-nav-steps">Steps</a>
				<a class="nav-tab" id="fw-nav-settings">Form settings</a>
			</h2>
			<div class="fw-mail-settings-container" style="display:none;">
				<div class="wrap">
					<h1>General settings</h1>
					<table class="form-table">
						<tr valign="top">
							<th scope="row">"Thank you"-page:</th>
							<td>
								<input type="text" class="fw-settings-thankyou" />
								<p class="description">Users will be redirected to this URL after form submit. Leave blank if you don't need one.</p>
							</td>
						</tr>
					</table>
					<h1>Mail settings</h1>
					<table class="form-table">
						<tr valign="top">
							<th scope="row">Send To:</th>
							<td>
								<input type="text" class="fw-mail-to" />
								<p class="description">Email address to which the mails are sent</p>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">Send From Email:</th>
							<td>
								<input type="text" class="fw-mail-from-mail" />
								<p class="description">Email address and name from which the emails are sent. Leave blank for default admin email.</p>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">Send From Name:</th>
							<td>
								<input type="text" class="fw-mail-from-name" />
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">Subject:</th>
							<td>
								<input type="text" class="fw-mail-subject" />
							</td>
						</tr>

						<tr valign="top">
							<th scope="row">Email Header:</th>
							<td>
								<textarea rows="5" cols="55" class="fw-mail-header"></textarea>
								<p class="description">Introductory text for email</p>
							</td>
						</tr>
					</table>
					<button class="fw-button-save"><?php _e( 'Save' ); ?></button>
				</div>
			</div>
			<div id="fw-elements-container" class="fw-elements-container">
				<div class="postbox-container">
					<div class="metabox-holder">
						<div class="postbox">
							<h3>Multi Step Form
								<?php do_action( 'msf_echopro', $id ); ?>
							</h3>
							<div class="inside">
								<div class="fw-elements">
									<input type="text" class="fw-wizard-title" value="Form Wizard" placeholder="Form Title">
									<a class="fw-element-step"><i class="fa fa-plus"></i> <?php _e( 'Add Step' ); ?></a>
									<h4>Drag &amp; Drop an element from below to a section</h4>
									<a class="fw-draggable-block fw-element-radio" data-type="radio"><i class="fa fa-arrows"></i> Radio/Checkbox</a>
									<a class="fw-draggable-block fw-element-select" data-type="select"><i class="fa fa-arrows"></i> Select/Dropdown</a>
									<a class="fw-draggable-block fw-element-text" data-type="text"><i class="fa fa-arrows"></i> Text field</a>
									<a class="fw-draggable-block fw-element-textarea" data-type="textarea"><i class="fa fa-arrows"></i> Textarea</a>
									<a class="fw-draggable-block fw-element-email" data-type="email"><i class="fa fa-arrows"></i> Email</a>
									<a class="fw-draggable-block fw-element-file" data-type="file"><i class="fa fa-arrows"></i> File Upload</a>
									<a class="fw-draggable-block fw-element-date" data-type="date"><i class="fa fa-arrows"></i> Date</a>
									<a class="fw-draggable-block fw-element-paragraph" data-type="paragraph"><i class="fa fa-arrows"></i> Paragraph</a>
									<?php
									if ( is_plugin_active( 'multi-step-form-plus/multi-step-form-plus.php' )
									&& Mondula_Form_Wizard_Wizard::fw_get_option( 'registration_enable' ,'fw_settings_registration' ) === 'on' ) {
										?>
										<a class="fw-draggable-block fw-element-registration" data-type="registration"><i class="fa fa-arrows"></i> Registration</a>
										<?php
									}
									?>
								</div>
								<div class="fw-actions">
									<button class="fw-button-save"><?php _e( 'Save' ); ?></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="fw-wizard-container" class="fw-wizard-container"></div>
			<div id="fw-elements-modal">
				<p>Content!</p>
			</div>
			<div id="fw-thickbox-content" style="display:none;">
				<div id="fw-thickbox-radio">Radio/Checkbox</div>
				<div id="fw-thickbox-select">Select/Dropdown</div>
				<div id="fw-thickbox-text">Text field</div>
				<div id="fw-thickbox-email">Email</div>
				<div id="fw-thickbox-fileupload">File Upload</div>
				<div id="fw-thickbox-textarea">Textarea</div>
				<div id="fw-thickbox-date">Date</div>
				<div id="fw-thickbox-paragraph">Paragraph</div>
				<?php
				if ( is_plugin_active( 'multi-step-form-plus/multi-step-form-plus.php' ) ) {
					?>
					<div id="fw-thickbox-registration">Registration</div>
				<?php
				}
				?>

			</div>

		</div>
		<?php
	}

	public function save() {
		// var_dump( $_POST );
		// wp_die('success');
		$_POST = stripslashes_deep( $_POST );
		$id = isset( $_POST['id'] ) ? $_POST['id'] : '';
		$nonce = isset( $_POST['nonce'] ) ? $_POST['nonce'] : '';
		$data = isset( $_POST['data'] ) ? $_POST['data'] : array();

		if ( wp_verify_nonce( $nonce, $this->_token . $id ) ) {
			if ( ! empty( $data ) ) {
				$this->_wizard_service->save( $id, $data );
				$response['msg'] = 'Success! Wizard saved.';
				wp_send_json_success( $response );
			} else {
				wp_send_json_error(
					array(
						'errorMsg' => 'Data is empty.',
					)
				);
			}
		} else {
			wp_send_json_error(
				array(
					'errorMsg' => 'Nonce failed to verify.',
				)
			);
		}
		wp_send_json_error(
			array(
				'errorMsg' => 'error',
			)
		);
	}

	/**
	 * Make a JSON string real pretty.
	 * @param $json JSON string
	 * @return pretty JSON string
	 */
	private function prettify_json( $json ) {
		$obj = json_decode( $json );
		return json_encode( $obj, JSON_PRETTY_PRINT );
	}

	/**
	 * Export a form as a JSON-Document, send headers and start download.
	 */
	public function download_form_json() {
		if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
			if ( isset( $_GET['page'] ) && $_GET['page'] === 'mondula-multistep-forms'
			&& isset( $_GET['export'] ) ) {
				/* Get JSON for form */
				$json = $this->prettify_json( $this->_wizard_service->get_as_json( $_GET['export'] ) );
				$filename = sanitize_file_name( 'msf-' . $_GET['export'] . '_' . date( 'Y-m-d H:i:s' ) );
				header( 'Pragma: public' );
				header( 'Expires: 0' );
				header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
				header( 'Cache-Control: private', false );
				header( 'Content-Type: application/json' );
				header( 'Content-Disposition: attachment; filename=' . $filename . '.json;' );
				header( 'Content-Transfer-Encoding: binary' );
				echo $json;
				exit;
			}
		}
	}
}
