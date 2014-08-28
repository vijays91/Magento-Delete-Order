<?php
class Vijaystore_Deleteorder_Model_Deleteorder
{
	public function deleteOrder($order_id)
	{
		//** Sales Order Delete
		$delete_order_sale	  		= Mage::getModel('sales/order')->load($order_id)->delete();
		$delete_order_sale_address	= Mage::getModel('sales/order_address')->load($order_id, 'parent_id')->delete();
		$delete_order_sale_payment	= Mage::getModel('sales/order_payment')->load($order_id, 'parent_id')->delete();
		$delete_order_invoice 		= Mage::getModel('sales/order_invoice')->load($order_id, 'order_id')->delete();
		$delete_order_shipment 		= Mage::getModel('sales/order_shipment')->load($order_id, 'order_id')->delete();
		$delete_order_creditmemo 	= Mage::getModel('sales/order_creditmemo')->load($order_id, 'order_id')->delete();
	}
}