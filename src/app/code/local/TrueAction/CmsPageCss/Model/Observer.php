<?php
/**
 * TrueAction CSS Page CSS module
 *
 * @category    TrueAction
 * @package     TrueAction_CmsPageCss
 */

class TrueAction_CmsPageCss_Model_Observer extends Varien_Event_Observer {

	public function adminhtmlCmsPageEditTabContentPrepareForm(Varien_Event_Observer $observer)
	{
		$model = Mage::registry('cms_page');
		$form = $observer->getForm();
		$fieldset = $form->addFieldset('trueaction_content_fieldset', array('legend'=>Mage::helper('cms')->__('Header CSS'),'class'=>'fieldset-wide'));
		$fieldset->addField('header_css', 'textarea', array(
			'name'      => 'header_css',
			'style'			=> 'font: bold 12px/14px \'Courier New\', Courier, mono; -moz-tab-size:2; -o-tab-size:2; -webkit-tab-size:2; tab-size:2;background-image: url(data:image/gif;base64,R0lGODlhAQAOAOYEAAAAAP///+Tr/fz3sgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjEgNjQuMTQwOTQ5LCAyMDEwLzEyLzA3LTEwOjU3OjAxICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1LjEgTWFjaW50b3NoIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkJGOTVCNUYzNjRDOTExRTJBNEY2Qjg4ODNFNEJDMDE2IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkJGOTVCNUY0NjRDOTExRTJBNEY2Qjg4ODNFNEJDMDE2Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6QkY5NUI1RjE2NEM5MTFFMkE0RjZCODg4M0U0QkMwMTYiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QkY5NUI1RjI2NEM5MTFFMkE0RjZCODg4M0U0QkMwMTYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4B//79/Pv6+fj39vX08/Lx8O/u7ezr6uno5+bl5OPi4eDf3t3c29rZ2NfW1dTT0tHQz87NzMvKycjHxsXEw8LBwL++vby7urm4t7a1tLOysbCvrq2sq6qpqKempaSjoqGgn56dnJuamZiXlpWUk5KRkI+OjYyLiomIh4aFhIOCgYB/fn18e3p5eHd2dXRzcnFwb25tbGtqaWhnZmVkY2JhYF9eXVxbWllYV1ZVVFNSUVBPTk1MS0pJSEdGRURDQkFAPz49PDs6OTg3NjU0MzIxMC8uLSwrKikoJyYlJCMiISAfHh0cGxoZGBcWFRQTEhEQDw4NDAsKCQgHBgUEAwIBAAAh+QQBAAAEACwAAAAAAQAOAAAHCIAEgoOEgwKBADs=);',
			'label'     => Mage::helper('cms')->__('CSS'),
			'title'     => Mage::helper('cms')->__('CSS'),
			'value'     => $model->getHeaderCss()
		));
	} /* end headerCssField */

	public function cmsPagePrepareSave(Varien_Event_Observer $observer)
	{
		$model = $observer->getEvent()->getPage();
		$request = $observer->getEvent()->getRequest();
		$data = $request->getPost();
		$model->setHeaderCss($data['header_css']);
	} /* end headerCssFieldSave */

	public function addJavascriptBlock($observer)
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
		if( $layout->getBlock('js') ) {
			$layout->getBlock('js')->append($block);
		}
	}

} /* end TrueAction_CmsPageCss_Model_Observer */
