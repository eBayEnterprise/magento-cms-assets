<?php
/**
 * eBay Enterprise CMS Assets module
 *
 * @category    EbayEnterprise
 * @package     EbayEnterprise_CmsAssets
 */

/**
 * Category pages
 */

$categoryInstaller = Mage::getResourceModel('catalog/setup', 'core_setup');
$categoryInstaller->startSetup();

$categoryInstaller->updateAttribute(
	Mage_Catalog_Model_Category::ENTITY,
	'head_assets',
	'frontend_label',
	'HTML for <head>'
);
$categoryInstaller->updateAttribute(
	Mage_Catalog_Model_Category::ENTITY,
	'end_body_assets',
	'frontend_label',
	'HTML for end of <body>'
);

$categoryInstaller->endSetup();
