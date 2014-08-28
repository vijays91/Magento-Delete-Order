<?php
class Vijaystore_Deleteorder_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Sales_Order_Grid
{

    protected function _prepareColumns()
    {
		if(Mage::helper('deleteorder/data')->delete_order_active())
		{
			$this->addExportType('deleteorder/adminhtml_deleteorder/exportXls', 
				Mage::helper('deleteorder')->__('Excel XL')
			);
        }
		return parent::_prepareColumns();
    }
	
	protected function _prepareMassaction()
    {	
		parent::_prepareMassaction();
		if(Mage::helper('deleteorder/data')->delete_order_active())
		{
			$this->getMassactionBlock()->addItem('delete', array(
				'label'    => Mage::helper('deleteorder')->__('Mass Delete'),
				'url'      => $this->getUrl('deleteorder/adminhtml_deleteorder/massOrderDelete'),
				'confirm'  => Mage::helper('deleteorder')->__('Are you sure Want to Delete?')
			));
		}
		
    }
}