<?php
class Vijaystore_Deleteorder_Adminhtml_DeleteorderController extends Mage_Adminhtml_Controller_Action
{
	public function exportXlsAction()  
	{  
		$fileName   = 'orders.xls';
        $grid       = $this->getLayout()->createBlock('adminhtml/sales_order_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName)); 
	}	
	
	//** Sales Order Delete
    public function orderDeleteAction() 
	{
		$order_id = $this->getRequest()->getParam('order_id');
		if($order_id)
		{
			try {
				$delete_order = Mage::getModel('deleteorder/deleteorder')->deleteOrder($order_id);
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('deleteorder')->__('Order Was Deleted Successfully'));
			}
			catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}
		$this->_redirect('adminhtml/sales_order/index');
	}
	
	//** Sales Order Mass Delete
    public function massOrderDeleteAction() 
	{
		$deleteorder_ids = $this->getRequest()->getParam('order_ids');
		foreach($deleteorder_ids as $key => $deleteorder_id)
		{
			$delete_orders = Mage::getModel('deleteorder/deleteorder')->deleteOrder($deleteorder_id);
		}
		Mage::getSingleton('adminhtml/session')->addSuccess(
		Mage::helper('adminhtml')->__('Total of %d record(s) were deleted', count($deleteorder_ids)));			
		$this->_redirect('adminhtml/sales_order/index');
    }
}