<?php
/**
 * eBay Enterprise CMS Assets module
 *
 * @category    EbayEnterprise
 * @package     EbayEnterprise_CmsAssets
 */

class EbayEnterprise_CmsAssets_Model_Observer extends Varien_Event_Observer {

	public function pageAdminEditTabDesignPrepareForm(Varien_Event_Observer $observer)
	{
		$model = Mage::registry('cms_page');
		$form = $observer->getForm();
		$fieldset = $form->addFieldset(
			'ebayenterprise_design_fieldset',
			array(
				'legend' => Mage::helper('cms')->__('CMS Asset Includes'),
				'class' => 'fieldset-wide'
			),
			'^');
		$fieldset->addField('head_assets', 'textarea', array(
			'name'  => 'head_assets',
			'style' => EbayEnterprise_CmsAssets_Helper_Data::EDITOR_STYLE,
			'label' => Mage::helper('cms')->__('HTML for <head>'),
			'title' => Mage::helper('cms')->__('HTML for <head>'),
			'value' => $model->getHeadAssets()
		));
		$fieldset->addField('end_body_assets', 'textarea', array(
			'name'  => 'end_body_assets',
			'style' => EbayEnterprise_CmsAssets_Helper_Data::EDITOR_STYLE,
			'label' => Mage::helper('cms')->__('HTML for end of <body>'),
			'title' => Mage::helper('cms')->__('HTML for end of <body>'),
			'value' => $model->getEndBodyAssets()
		));
	}

}
