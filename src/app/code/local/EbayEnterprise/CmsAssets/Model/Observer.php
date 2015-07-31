<?php
/**
 * eBay Enterprise CMS Assets module
 *
 * @category	EbayEnterprise
 * @package     EbayEnterprise_CmsAssets
 */

class EbayEnterprise_CmsAssets_Model_Observer extends Varien_Event_Observer {

	public function pageAdminEditTabContentPrepareForm(Varien_Event_Observer $observer)
	{
		$model = Mage::registry('cms_page');
		$form = $observer->getForm();
		$fieldset = $form->addFieldset('ebayenterprise_content_fieldset', array(
			'legend' => Mage::helper('cms')->__('CMS Page External Assets'),
			'class' => 'fieldset-wide'));
		$fieldset->addField('header_css', 'textarea', array(
			'name'  => 'header_css',
			'style' => 'font: 12px/15px monospace; -moz-tab-size:2; tab-size:2;',
			'label' => Mage::helper('cms')->__('HTML for <head>'),
			'title' => Mage::helper('cms')->__('HTML for <head>'),
			'value' => $model->getHeaderCss()
		));
	}

	public function pageAdminPrepareSave(Varien_Event_Observer $observer)
	{
		$model = $observer->getEvent()->getPage();
		$request = $observer->getEvent()->getRequest();
		$data = $request->getPost();
		$model->setHeaderCss($data['header_css']);
	}

	/**
	 * Add JavaScript to page admin that enables the tab key.
	 */
	public function pageAdminAddJavascriptBlock($observer)
	{
		$controller = $observer->getAction();
		$layout = $controller->getLayout();
		$block = $layout->createBlock('core/text');

$script = <<<JSPT
<script type="text/javascript">
var page_header_css = document.getElementById("page_header_css");
if (page_header_css) {
	page_header_css.addEventListener('keydown',this.keyHandler,false);
}
function keyHandler(e) {
	if (e.keyCode === 9) {
		var el = e.target;
		var text = "\t";
		el.focus();
		if (typeof el.selectionStart == "number") {
			var val = el.value;
			var selStart = el.selectionStart;
			el.value = val.slice(0, selStart) + text + val.slice(el.selectionEnd);
			el.selectionEnd = el.selectionStart = selStart + text.length;
		} else if (typeof document.selection != "undefined") {
			var textRange = document.selection.createRange();
			textRange.text = text;
			textRange.collapse(false);
			textRange.select();
		}
		e.preventDefault();
	}
}
</script>
JSPT;

		$block->setText($script);
		if ($layout->getBlock('js')) {
			$layout->getBlock('js')->append($block);
		}
	}

}
