<?php
/**
 * eBay Enterprise CMS Assets module
 *
 * @category	EbayEnterprise
 * @package     EbayEnterprise_CmsAssets
 */

class EbayEnterprise_CmsAssets_Helper_Data extends Mage_Core_Helper_Abstract {

	public function getCmsPageHeadAssets()
	{
		return Mage::getBlockSingleton('cms/page')->getPage()->getHeadAssets();
	}

	public function getCmsPageEndBodyAssets()
	{
		return Mage::getBlockSingleton('cms/page')->getPage()->getEndBodyAssets();
	}

}
