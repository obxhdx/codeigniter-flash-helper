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
 * @link        http://www.christophermonnat.com/2009/05/building-applications-using-codeigniter-part-3-helpers/
 */


/**
 * Display formatted flash message.
 *
 * @access public
 * @param string|array
 * @return string
 */
function display_flash($name)
{
  $CI =& get_instance();

  if($CI->session->flashdata($name))
  {
    $flash = $CI->session->flashdata($name);

    if (is_array($flash['message'])) {
      $msg = '<div class="' . $flash['message_type'] . '">';

      foreach ($flash['message'] as $flash_message) {
        $msg .= $flash_message . '<br />';
      }

      return $msg . '</div>';
    } else {
      return '<div class="' . $flash['message_type'] . '">' . $flash['message'] . '</div>';
    }
  }
}

/**
 * Save provided message as a flash variable.
 *
 * @access public
 * @param string
 * @param string
 * @param string
 * @param boolean
 */
function set_flash($name, $message_type, $message, $redirect=FALSE)
{
  $CI =& get_instance();
  $CI->session->set_flashdata($name, array('message_type' => $message_type, 'message' => $message));

  if ($redirect)
    redirect($redirect);
}

/* End of file flash_helper.php */
/* Location: ./application/helpers/flash_helper.php */
