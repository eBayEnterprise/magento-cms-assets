<?php
/**
 * eBay Enterprise CMS Assets module
 *
 * @category    EbayEnterprise
 * @package     EbayEnterprise_CmsAssets
 */

class EbayEnterprise_CmsAssets_Model_Cms_Config extends Enterprise_Cms_Model_Config
{
	protected $_revisionControlledAttributes = array(
		'page' => array(
			'root_template',
			'meta_keywords',
			'meta_description',
			'content_heading',
			'content',
			'layout_update_xml',
			'custom_theme',
			'custom_root_template',
			'custom_layout_update_xml',
			'custom_theme_from',
			'custom_theme_to',
			'head_assets',
			'end_body_assets'
		));
}
