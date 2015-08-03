<?php
/**
 * @package	HikaShop for Joomla!
 * @version	2.3.3
 * @author	hikashop.com
 * @copyright	(C) 2010-2014 HIKARI SOFTWARE. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
?><div class="hikashop_check_end" id="hikashop_check_end">
	<span class="hikashop_check_end_message" id="hikashop_check_end_message">
		<?php
		echo JText::_('ORDER_IS_COMPLETE').'<br/>'.
		JText::sprintf('You can now send us a cheque with the amount of %s using the following information.',$this->amount).'<br/>'.
		$this->information.'<br/>'.
		JText::sprintf('Do not forget to include the order number ( %s ) on the back of the cheque so that we can match it to your order.',$this->order_number).'<br/>'.
		JText::_('THANK_YOU_FOR_PURCHASE');?>
	</span>
</div>
<?php
if(!empty($this->payment_params->return_url)){
	$doc = JFactory::getDocument();
	$doc->addScriptDeclaration("window.addEvent('domready', function() {window.location='".$this->payment_params->return_url."'});");
}
