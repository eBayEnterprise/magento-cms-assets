<?php
/**
 * eBay Enterprise CMS Assets module
 *
 * @category    EbayEnterprise
 * @package     EbayEnterprise_CmsAssets
 */

class EbayEnterprise_CmsAssets_Block_Adminhtml_Codeeditor extends Varien_Data_Form_Element_Textarea
{
	public function getElementHtml()
	{
		$helper = Mage::helper('ebayenterprise_cmsassets');

		$this->addClass('code-editor');
		$this->setStyle(EbayEnterprise_CmsAssets_Helper_Data::EDITOR_STYLE);
		return parent::getElementHtml();
	}
}
