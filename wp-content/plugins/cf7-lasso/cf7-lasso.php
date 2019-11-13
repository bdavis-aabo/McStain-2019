<?php
	/*
	Plugin Name: Contact Form 7 to Lasso
	Plugin URI: http://www.mountainwebmedia.com/
	Description: WordPress plugin to bridge between ContactForm7 and Lasso.
	Author: Jean Le Clerc
	Version: 1.1
	Author URI: http://www.mountainwebmedia.com/
	*/
	
	defined('ABSPATH') or die('Ah! Ah! Ah! You didn\'t say the magic word!');
	global $cf7Lasso;
	
	if(!class_exists('cf7Lasso')) {
		class cf7Lasso {
			static protected $_instance;
		    static protected $operators = array('+', '-', '*');
			
			static public function instance(){
				if(is_null(cf7Lasso::$_instance)) cf7Lasso::$_instance = new cf7Lasso();
				return cf7Lasso::$_instance;
			}
			
			private $form_analytics = false;
		    private $session = array();
			
            private function session_set($key, $data) {
                $key = sanitize_key($key);
            
                if(isset($this->session[$key]) && ($data === null)) unset($this->session[$key]);
                else {
                    if(!is_string($data)) $data = serialize($data);
                    $this->session[$key] = $data;
                }
            }
            private function session_get($key, $default='') {
                $key = sanitize_key($key);
                if(!isset($this->session[$key])) return $default;
                return maybe_unserialize($this->session[$key]);
            }
            private function captcha(&$equation) {
                $n1 = rand(1, 10);
                $n2 = rand(1, 10);
                $op = cf7Lasso::$operators[rand(0, count(cf7Lasso::$operators) - 1)];
                
                $equation = number_format(max($n1, $n2), 0).$op.number_format(min($n1, $n2), 0);
            
                switch($op) {
                    case '+':
                        $result = $n1 + $n2;
                        break;
                    case '-':
                        $result = $n1 - $n2;
                        break;
                    case '*':
                        $result = $n1 * $n2;
                        break;
                    case '/':
                        $result = $n1 / $n2;
                        break;
                    default:
                        $result = null;
                        break;
                }
            
                return $result;
            }
            
			function __construct() {
			    add_action('init', array($this, 'init'));
				add_action('admin_init', array($this, 'admin_init'), 15);
				add_action('customize_register', array($this, 'theme_customizer'));
				add_action('wp_footer', array($this, 'footer'));
				add_action('wpcf7_init', array($this, 'wpcf7_init'));
				add_action('wpcf7_mail_sent', array($this, 'wpcf7_mail_sent'));
				
				add_filter('wpcf7_validate_solution', array($this, 'wpcf7_solution_validator'), 20, 2);
			}
			public function init() {
                if(!defined('WP_SESSION_COOKIE')) define('WP_SESSION_COOKIE', 'FormSecure_wp_session');
                if(!class_exists('WP_Session')) {
                    $root = dirname(__FILE__);
                    require_once($root.'/inc/class-recursive-arrayaccess.php');
                    require_once($root.'/inc/class-wp-session.php');
                    require_once($root.'/inc/wp-session.php');
                }
                $this->session = WP_Session::get_instance();
			}
			public function admin_init() {
				if(function_exists('wpcf7_add_tag_generator')) {
				    wpcf7_add_tag_generator('hidden', __('Hidden field', 'cf7Lasso'), 'cf7Lasso-tg-pane-hidden', array($this, 'wpcf7_add_tag_generator'));
				    wpcf7_add_tag_generator('equation', __('Math equation', 'cf7Lasso'), 'cf7Lasso-tg-pane-equation', array($this, 'wpcf7_add_equation_tag_generator'));
				    wpcf7_add_tag_generator('solution', __('Math response', 'cf7Lasso'), 'cf7Lasso-tg-pane-solution', array($this, 'wpcf7_add_solution_tag_generator'));
			    }
			}
			public function theme_customizer($wp_customizer) {
				$wp_customizer->add_section('cf7Lasso-section', array(
					'title' => __('Lasso Settings', 'mwm'),
					'priority' => 100,
					'description' => 'Settings from the Contact Form 7 to Lasso Plugin'
				));
				$wp_customizer->add_setting('cf7Lasso_analytics');
				$wp_customizer->add_control(new WP_Customize_Control($wp_customizer, 'cf7Lasso_analytics', array(
					'type' => 'text',
					'label' => __('Lasso Analytics ID', 'mwm'),
					'section' => 'cf7Lasso-section',
					'settings' => 'cf7Lasso_analytics'
				)));
			}
			public function footer() {
				$analytics = get_theme_mod('cf7Lasso_analytics');
				if($analytics) {
?>

<script src="//app.lassocrm.com/analytics.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
var LassoCRM = LassoCRM || {};
(function(ns){
    ns.tracker = new LassoAnalytics('<?php echo $analytics; ?>');
})(LassoCRM);
try {
    LassoCRM.tracker.setTrackingDomain("//app.lassocrm.com");
    LassoCRM.tracker.init();  // initializes the tracker
    LassoCRM.tracker.track(); // track() records the page visit with the current page title, to record multiple visits call repeatedly.
    LassoCRM.tracker.patchRegistrationForms();
} catch(error) {}
-->
</script>
<?php if($this->form_analytics) { ?>
<script type="text/javascript">
(function(i) {var u =navigator.userAgent;
var e=/*@cc_on!@*/false; var st = setTimeout;if(/webkit/i.test(u)){st(function(){var dr=document.readyState;
if(dr=="loaded"||dr=="complete"){i()}else{st(arguments.callee,10);}},10);}
else if((/mozilla/i.test(u)&&!/(compati)/.test(u)) || (/opera/i.test(u))){
document.addEventListener("DOMContentLoaded",i,false); } else if(e){     (
function(){var t=document.createElement("doc:rdy");try{t.doScroll("left");
i();t=null;}catch(e){st(arguments.callee,0);}})();}else{window.onload=i;}})
(function() {for(var loop=0;loop<document.forms.length;loop++){if(document.forms[loop].guid)document.forms[loop].guid.value = LassoCRM.tracker.readCookie("ut");}});
</script>
<?php
					}
				}
			}
			public function wpcf7_init() {
				wpcf7_add_shortcode(array('equation'), array($this, 'wpcf7_math_equation_shortcode_handler'), false);
				wpcf7_add_shortcode(array('solution'), array($this, 'wpcf7_math_response_shortcode_handler'), true);
				wpcf7_add_shortcode(array('hidden', 'hidden*'), array($this, 'wpcf7_hidden_shortcode_handler'), true);
			}
			public function wpcf7_math_equation_shortcode_handler($tag) {
				$equation = $this->session_get('cf7-lasso-equation');
			    if(!$equation) {
			        $this->session_set('cf7-lasso-solution', $this->captcha($equation));
			        $this->session_set('cf7-lasso-equation', $equation);
			    }
			    return '<span class="what-is">'.$equation.'</span>';
			}
			public function wpcf7_math_response_shortcode_handler($tag) {
				$tag = new WPCF7_Shortcode($tag);
				$tag->name = 'cf7-lasso-it-is';
				
				$validation_error = wpcf7_get_validation_error($tag->name);
				$class = wpcf7_form_controls_class($tag->type, 'wpcf7-text');
				if($validation_error) $class .= ' wpcf7-not-valid';
				
				$atts = array();
				$atts['class'] = $tag->get_class_option($class);
				$atts['id'] = $tag->get_id_option();
				$atts['tabindex'] = $tag->get_option('tabindex', 'int', true);
				if($tag->is_required()) $atts['aria-required'] = 'true';
				$atts['aria-invalid'] = $validation_error ? 'true' : 'false';
				
				$value = (string)reset($tag->values);
				$value = $tag->get_default_option($value);
				$value = wpcf7_get_hangover($tag->name, $value);
				$atts['value'] = $value;
				$atts['type'] = 'text';
				$atts['name'] = $tag->name;
				$atts = wpcf7_format_atts($atts);
				
				$html = sprintf('<span class="wpcf7-form-control-wrap '.$tag->name.'"><input %1$s /></span>', $atts);
				
				return $html;
			}
			public function wpcf7_hidden_shortcode_handler($tag) {
				$tag = new WPCF7_Shortcode($tag);
				if(empty($tag->name)) return '';
				
				$this->form_analytics = true;
				$validation_error = wpcf7_get_validation_error($tag->name);
				$class = wpcf7_form_controls_class($tag->type, 'wpcf7-hidden');
				if($validation_error) $class .= ' wpcf7-not-valid';
				$class .= 'hidden';
				
				$atts = array();
				$atts['class'] = $tag->get_class_option($class);
				$atts['id'] = $tag->get_id_option();
				$atts['tabindex'] = $tag->get_option('tabindex', 'int', true);
				if($tag->is_required()) $atts['aria-required'] = 'true';
				$atts['aria-invalid'] = $validation_error ? 'true' : 'false';
				
				$value = (string)reset($tag->values);
				$value = $tag->get_default_option($value);
				$value = wpcf7_get_hangover($tag->name, $value);
				$atts['value'] = $value;
				$atts['type'] = 'hidden';
				$atts['name'] = $tag->name;
				$atts = wpcf7_format_atts($atts);
				
				$html = sprintf('<input %1$s />', $atts);
				
				return $html;
			}
			public function wpcf7_add_equation_tag_generator($contact_form) {
?>
<div id="cf7Lasso-tg-pane-equation">
    <form action="">
        <div class="control-box">
            <fieldset>
                <legend>Generate a math equation; needs to be paired with a solution field.</legend>

            </fieldset>
        </div>

        <div class="insert-box">
            <input type="text" name="equation" class="tag code" readonly="readonly" onfocus="this.select()">

            <div class="submitbox">
                <input type="button" class="button button-primary insert-tag" value="Insert Tag">
            </div>
        </div>
    </form>
</div>
<?php
            }
			public function wpcf7_add_solution_tag_generator($contact_form) {
?>
<div id="cf7Lasso-tg-pane-solution">
    <form action="">
        <div class="control-box">
            <fieldset>
                <legend>Generate a math response field; needs to be paired with a equation field.</legend>
                <input type="hidden" name="name" value="cf7-lasso-it-is" class="tg-name oneline" id="tag-generator-panel-solution-name">
            </fieldset>
        </div>

        <div class="insert-box">
            <input type="text" name="solution" class="tag code" readonly="readonly" onfocus="this.select()">


            <div class="submitbox">
                <input type="button" class="button button-primary insert-tag" value="Insert Tag">
            </div>
        </div>
    </form>
</div>
<?php
            }
			public function wpcf7_add_tag_generator($contact_form) {
?>
<div id="cf7Lasso-tg-pane-hidden">
    <form action="">
        <div class="control-box">
            <fieldset>
                <legend>Generate a form-tag for a hidden field.</legend>

                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo esc_html(__('Field Type', 'contact-form-7' )); ?></th>
                            <td>
                                <fieldset>
                                    <legend class="screen-reader-text"><?php echo esc_html(__('Field Type', 'contact-form-7' )); ?></legend>
                                    <label><input type="checkbox" name="required"> <?php echo esc_html(__('Required field', 'contact-form-7' )); ?></label>
                                </fieldset>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="tag-generator-panel-hidden-name">Name</label></th>
                            <td><input type="text" name="name" class="tg-name oneline" id="tag-generator-panel-hidden-name"></td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="tag-generator-panel-hidden-values">Default value</label></th>
                            <td>
                                <input type="text" name="values" class="oneline" id="tag-generator-panel-hidden-values"><br>
                            </td>
                        </tr>


                        <tr>
                            <th scope="row"><label for="tag-generator-panel-hidden-id">Id attribute</label></th>
                            <td><input type="text" name="id" class="idvalue oneline option" id="tag-generator-panel-hidden-id"></td>
                        </tr>

                    </tbody>
                </table>
            </fieldset>
        </div>

        <div class="insert-box">
            <input type="text" name="hidden" class="tag code" readonly="readonly" onfocus="this.select()">

            <div class="submitbox">
                <input type="button" class="button button-primary insert-tag" value="Insert Tag">
            </div>

            <br class="clear">

            <p class="description mail-tag"><label for="tag-generator-panel-hidden-mailtag">To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (<strong><span class="mail-tag"></span></strong>) into the field on the Mail tab.<input type="text" class="mail-tag code hidden" readonly="readonly" id="tag-generator-panel-hidden-mailtag"></label></p>
        </div>
    </form>
</div>
<?php
			}
			public function wpcf7_solution_validator($result, $tag) {
                $tag = new WPCF7_Shortcode($tag);
                $solution = $this->session_get('cf7-lasso-solution');
                $user_solution = isset($_POST['cf7-lasso-it-is']) ? $_POST['cf7-lasso-it-is'] : '';
                
                if(($user_solution == '') || ($solution != intVal($user_solution))) $result->invalidate('cf7-lasso-it-is', __('This is not the correct answer to the mathematical question.', 'contact-form-7' ));
                
                return $result;
			}
			public function wpcf7_mail_sent($contact_form) {
				$submission = WPCF7_Submission::get_instance();
				if($submission) {
					$posted_data = $submission->get_posted_data();
					if(!empty($posted_data)) {
						$lasso = $contact_form->additional_setting('Lasso');
						if(!empty($lasso)) {
							$data = @json_decode($lasso[0], true);
							if(!$data) $data = array();
							$lasso_fields = array(
								'LassoUID',
								'ProjectID',
								'ClientID',
								'FirstName',
								'LastName',
								'Mr',
								'Mrs',
								'Miss',
								'Ms',
								'Dr',
								'Sir',
								'Capt',
								'Prof',
								'Rev',
								'Mstr',
								'Address',
								'City',
								'Province',
								'PostalCode',
								'Country',
								'Company',
								'JobTitle',
								'SIN',
								'Phones-Home',
								'Phones-Cell',
								'Phones-Work',
								'Phones-WorkExt',
								'Phones-Fax',
								'Phones-Pager',
								'Emails-Primary',
								'Emails-Secondary',
								'Emails-Tertiary',
								'Comments',
								'Gender',
								'ContactPreference',
								'SignupThankyouLink',
								'SignupEmailLink',
								'SignupEmailSubject',
								'registrationPageIdentifier',
								'guid',
								'domainAccountId'
							);
							
							/*
							To indicate a Lasso field should be sent as an array, end it's CF7 name with "-", i.e. "Questions-1234-"
							*/
							
							//wp_mail('jean.leclerc@mountainwebmedia.com', 'CF7 Posted Data', print_r($posted_data, true));
							foreach($posted_data as $key => $value) {
								if(!in_array($key, $lasso_fields) && !preg_match('/^Questions\-/', $key)) continue;
								do {
									$key = preg_replace('/\-([^\-]*?)(\-|$)/', '[$1]$2', $key);
								} while(preg_match('/\-([^\-]*?)(\-|$)/', $key));
								$data[$key] = $value;
							}
							//wp_mail('jean.leclerc@mountainwebmedia.com', 'CF7 Standardized Data', print_r($data, true));
							
							foreach($data as $key => $value) {
							    if(is_array($value)) {
							        if(preg_match('/\[\]$/', $key)) { // Both CF7 and Lasso fields are arrays
							            unset($data[$key]);
							            $key = preg_replace('/\[\]$/', '', $key);
							            $data[$key] = $value;
							        } else { // CF7 is an array && Lasso field is NOT an array
							            $new_value = '';
							            if(!empty($value)) {
                                            foreach($value as $field_id => $mappings) {
                                                if(preg_match('/^0$/', $field_id)) $new_value = $mappings;
                                                else {
                                                    $field_id = preg_replace('/\-([^\-]+)(\-|$)/', '[$1]$2', $field_id);
                                                    if(isset($data[$field_id]) && isset($mappings[$data[$field_id]])) $new_value .= $mappings[$data[$field_id]];
                                                }
                                            }
							            }
							            $data[$key] = $new_value;
							        }
							    }
							}
							
							//wp_mail('jean.leclerc@mountainwebmedia.com', 'CF7 Lasso Data', print_r($data, true)."\n".http_build_query($data)."\n".intVal(WPCF7_USE_PIPE));
							
							$curl = curl_init();
							curl_setopt($curl, CURLOPT_URL, 'http://www.mylasso.com/registrant_signup.php');
							//curl_setopt($curl, CURLOPT_URL, 'http://www.mylasso.com/registrant_signup/test.json');
							curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($curl, CURLOPT_POST, count($data));
							curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
							$result = curl_exec($curl);
							//wp_mail('jean.leclerc@mountainwebmedia.com', 'CF7 Lasso response', $result);
							curl_close($curl);
						}
					}
				}
			}
		}
	}
	
	if(class_exists('cf7Lasso')) $cf7Lasso = cf7Lasso::instance();
?>