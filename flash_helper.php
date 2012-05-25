<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package   CodeIgniter
 * @author    ExpressionEngine Dev Team
 * @copyright Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license   http://codeigniter.com/user_guide/license.html
 * @link      http://codeigniter.com
 * @since     Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Flash Helpers
 *
 * Provide helper functions for common flash message operations.
 *
 * @package     CodeIgniter
 * @subpackage  Helpers
 * @category    Helpers
 * @author      Chris Monnat (https://github.com/mrtopher)
 * @commiter    Obedi Ferreira (https://github.com/obxhdx)
 * @modifier    Eric Haughee (https://github.com/ehaughee)
 * @link        http://www.christophermonnat.com/2009/05/building-applications-using-codeigniter-part-3-helpers/
 * 
 */


/**
 * Display formatted flash message.  Compatible with 
 * a CodeIgniter redirect() and loading a view.
 *
 * @access public
 * @param string|array
 * @return string
 */
function flash($name = 'flash_message')
{
  $CI =& get_instance();

	if($CI->session->flashdata($name))
	{
		$flash = $CI->session->flashdata($name);

		if (is_array($flash['message'])) 
		{
		  $msg  = '<div class="alert alert-block alert-' . $flash['message_type'] . '">';
		  $msg .= '<button class="close" data-dismiss="alert">×</button>';

		  foreach ($flash['message'] as $flash_message) 
		  {
		    $msg .= $flash_message . '<br />';
		  }

		  return $msg . '</div>';
		} 
		else 
		{
		  return "<div class='alert alert-block alert-{$flash['message_type']}'>
		  			    <button class='close' data-dismiss='alert'>×</button>{$flash['message']} 
		  		    </div>";
		}
	}
	else if (isset($_SESSION["flash"]) && !empty($_SESSION["flash"]))
	{   
		/** 
		* This code derived from: http://codeigniter.com/wiki/Simple_FlashNotice_helper/
 		*/

	    $flash = $_SESSION["flash"];
	    unset($_SESSION["flash"]);

	    $msg = '';
	    foreach($flash as $key => $val) 
	    {
	        $msg .= "<div class='alert alert-block alert-$key'>
                      <button class='close' data-dismiss='alert'>×</button>
                      $val
                   </div>";
	    }
	    
	    return $msg;
	}
}

/**
 * Save provided message as a flash variable for display
 * after a CodeIgniter redirect (redirect()).
 *
 * @access public
 * @param string
 * @param string
 * @param string
 * @param boolean
 */
function setflash($message, $message_type, $redirect = FALSE, $name = 'flash_message')
{
  $CI =& get_instance();
  $CI->session->set_flashdata($name, array('message_type' => $message_type, 'message' => $message));

  if ($redirect)
    redirect($redirect);
}


/**
 * Save provided message as a flash variable for display
 * after loading a view ($this->load->view()).
 * Source: http://codeigniter.com/wiki/Simple_FlashNotice_helper/
 *
 * @access public
 * @param string
 * @param string
 */
function setviewflash($error = "An error has occurred", $type = "error") 
{
    $_SESSION["flash"][$type] = $error;
}

/* End of file flash_helper.php */
/* Location: ./application/helpers/flash_helper.php */
?> 