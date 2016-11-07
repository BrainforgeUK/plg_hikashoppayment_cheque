<?php
/**
 * @package	HikaShop for Joomla!
 * @version	2.3.3
 * @author	hikashop.com
 * @copyright	(C) 2010-2014 HIKARI SOFTWARE. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
?><?php
class plgHikashoppaymentBF_Cheque extends hikashopPaymentPlugin {
	var $name = 'bf_cheque';
	var $multiple = true;
	var $pluginConfig = array(
		'order_status' => array('ORDER_STATUS', 'orderstatus'),
		'status_notif_email' => array('ORDER_STATUS_NOTIFICATION', 'boolean','0'),
		'return_url' => array('RETURN_URL', 'input'),
		'information' => array('Cheque information', 'big-textarea')
	);

	function onAfterOrderConfirm(&$order,&$methods,$method_id){
		parent::onAfterOrderConfirm($order, $methods, $method_id);
		$method =& $methods[$method_id];
		$this->modifyOrder($order->order_id, $method->payment_params->order_status, @$method->payment_params->status_notif_email, false);
		$this->removeCart = true;

		$this->information = $method->payment_params->information;
		if(preg_match('#^[a-z0-9_]*$#i',$this->information)){
			$this->information = JText::_($this->information);
		}
		$currencyClass = hikashop_get('class.currency');
		$this->amount = $currencyClass->format($order->order_full_price,$order->order_currency_id);
		$this->order_number = $order->order_number;

		return $this->showPage('end');
	}

	function getPaymentDefaultValues(&$element) {
		$element->payment_name='Cheque';
		$element->payment_description='You can pay by sending us a cheque.';
		$element->payment_images='blank-cheque';

		$element->payment_params->information='You can make out your cheque to: XXXX XXXX<br/>
			<br/>
			And then, send your cheque to the address below :<br/>
			<br/>
			XXXXXX XXXXXX<br/>
			<br/>
			XX XXXX XXXXXX<br/>
			<br/>
			XXXXX XXXXXXX<br/>
			<br/>
			Once we receive it, we will confirm your order.';
		$element->payment_params->order_status='created';
	}
}
