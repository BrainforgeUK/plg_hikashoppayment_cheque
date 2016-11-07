<?php
/**
 * @package		HikaShop for Joomla!
 * @author		http://www.brainforge.co.uk
 * @basedon   Derived from manual shipping module by HIKARI SOFTWARE SARL
 * @copyright	(C) 2016 Jonathan Brain. All rights reserved.
 * @license		GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
// no direct access
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.filesystem.file');

class plghikashoppaymentBF_ChequeInstallerScript {  
  private function installMedia($parent) {
    $src = $parent->getParent()->getPath('source', __DIR__) . '/media/images/payment/blank-cheque.png';
    $dest = JPATH_SITE . '/media/com_hikashop/images/payment/blank-cheque.png';
    JFile::copy($src, $dest);
  }

  function install($parent) {
    $this->installMedia($parent);
  }
  
  function uninstall($parent) {
  }
  
  function update($parent) {
    $this->installMedia($parent);
  }
  
  function preflight($type, $parent) {
  }
  
  function postflight($type, $parent) {
  }
}
?>