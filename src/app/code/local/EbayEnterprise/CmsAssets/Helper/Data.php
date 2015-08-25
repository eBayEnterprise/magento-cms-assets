<?php
/**
 * eBay Enterprise CMS Assets module
 *
 * @category    EbayEnterprise
 * @package     EbayEnterprise_CmsAssets
 */

class EbayEnterprise_CmsAssets_Helper_Data extends Mage_Core_Helper_Abstract
{

	const EDITOR_STYLE = 'font: 12px/15px monospace; -moz-tab-size:2; tab-size:2;';

	public function getCategoryHeadAssets()
	{
		return $this->_filterHtml(Mage::registry('current_category')->getHeadAssets());
	}

	public function getCategoryEndBodyAssets()
	{
		return $this->_filterHtml(Mage::registry('current_category')->getEndBodyAssets());
	}

	public function getCmsPageHeadAssets()
	{
		return $this->_filterHtml(Mage::getBlockSingleton('cms/page')->getPage()->getHeadAssets());
	}

	public function getCmsPageEndBodyAssets()
	{
		return $this->_filterHtml(Mage::getBlockSingleton('cms/page')->getPage()->getEndBodyAssets());
	}

	protected function _filterHtml($html)
	{
		return Mage::getSingleton('widget/template_filter')->filter($html);
	}

}
