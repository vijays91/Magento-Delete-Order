<?php
class Vijaystore_Deleteorder_Helper_Data extends Mage_Core_Helper_Abstract
{
	const XML_PATH_DELETEORDER_ENABLE   = 'deleteorder_tab/deleteorder_setting/deleteorder_active';
	
	public function conf($code, $store = null) {
        return Mage::getStoreConfig($code, $store);
    }
	
	public function delete_order_active()
	{
		return $this->conf(self::XML_PATH_DELETEORDER_ENABLE, $store);		
	}
}

?>