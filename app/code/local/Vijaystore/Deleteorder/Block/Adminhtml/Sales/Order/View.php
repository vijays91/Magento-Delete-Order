<?php
class Vijaystore_Deleteorder_Block_Adminhtml_Sales_Order_View extends Mage_Adminhtml_Block_Sales_Order_View
{
    public function __construct()
    {
		parent::__construct();
		if(Mage::helper('deleteorder/data')->delete_order_active())
		{
			$message = Mage::helper('deleteorder')->__('Are you sure Want to Delete?');
			$this->_addButton('delete', array(
				'label'     => Mage::helper('deleteorder')->__('Delete'),
				'onclick'   => 'deleteConfirm(\''.$message.'\', \'' . $this->getDelUrl() . '\')',
				//'class'     => 'go' //** This button like invoice,shipment
				'class'     => '  delete'
			));
		}
	}
	
	public function getDelUrl()
	{
		return  $this->getUrl('deleteorder/adminhtml_deleteorder/orderDelete');
	}
}