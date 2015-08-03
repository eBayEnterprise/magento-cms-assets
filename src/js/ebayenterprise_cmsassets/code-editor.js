/**
 * eBay Enterprise CMS Assets module
 *
 * @category    EbayEnterprise
 * @package     EbayEnterprise_CmsAssets
 */

$(document).observe('dom:loaded', function () {
	document.body.on('keydown', '.code-editor', function (e) {
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
	});
});
