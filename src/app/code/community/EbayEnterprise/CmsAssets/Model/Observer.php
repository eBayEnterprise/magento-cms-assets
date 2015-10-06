<?php
/**
 * eBay Enterprise CMS Assets module
 *
 * @category    EbayEnterprise
 * @package     EbayEnterprise_CmsAssets
 */

class EbayEnterprise_CmsAssets_Model_Observer extends Varien_Event_Observer
{

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

		$wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig();
		$codeEditorTranslator = new CodeEditorTranslator($wysiwygConfig->getTranslator());
		$wysiwygConfig->setTranslator($codeEditorTranslator);
		$wysiwygConfig->setAddWidgets(false);

		$fieldset->addField('head_assets', 'editor', array(
			'name'  => 'head_assets',
			'label' => Mage::helper('cms')->__('HTML for <head>'),
			'title' => Mage::helper('cms')->__('HTML for <head>'),
			'value' => $model->getHeadAssets(),
			'class' => 'code-editor',
			'style' => EbayEnterprise_CmsAssets_Helper_Data::EDITOR_STYLE,
			'config' => $wysiwygConfig,
			'wysiwyg' => false,
		));
		$fieldset->addField('end_body_assets', 'editor', array(
			'name'  => 'end_body_assets',
			'label' => Mage::helper('cms')->__('HTML for end of <body>'),
			'title' => Mage::helper('cms')->__('HTML for end of <body>'),
			'value' => $model->getEndBodyAssets(),
			'class' => 'code-editor',
			'style' => EbayEnterprise_CmsAssets_Helper_Data::EDITOR_STYLE,
			'config' => $wysiwygConfig,
			'wysiwyg' => false,
		));
	}

}

// Hate me if you want, but it's 9pm and I want to go home.
class CodeEditorTranslator
{
	private $_realTranslator;

	public function __construct($realTranslator) {
		$this->_realTranslator = $realTranslator;
	}

	public function __($string) {
		if ($string == 'Insert Image...') {
			$string = 'Insert File...';
		}
		return $this->_realTranslator->__($string);
	}
}
