<?php
/**
 * eBay Enterprise CMS Assets module
 *
 * @category	EbayEnterprise
 * @package     EbayEnterprise_CmsAssets
 */

/**
 * CMS Pages
 */

$installer = $this;
$installer->startSetup();

// Versioned pages
$installer
	->getConnection()
	->addColumn($installer->getTable('enterprise_cms/page_revision'), 'head_assets', array(
		'type'     => Varien_Db_Ddl_Table::TYPE_TEXT,
		'length'   => '2M',
		'nullable' => true,
		'default'  => '',
		'comment'  => 'Head CMS Assets'
	));
$installer
	->getConnection()
	->addColumn($installer->getTable('enterprise_cms/page_revision'), 'end_body_assets', array(
		'type'     => Varien_Db_Ddl_Table::TYPE_TEXT,
		'length'   => '2M',
		'nullable' => true,
		'default'  => '',
		'comment'  => 'End of Body CMS Assets'
	));

// Unversioned pages
$installer
	->getConnection()
	->addColumn($installer->getTable('cms/page'), 'head_assets', array(
		'type'     => Varien_Db_Ddl_Table::TYPE_TEXT,
		'length'   => '2M',
		'nullable' => true,
		'default'  => '',
		'comment'  => 'Head CMS Assets'
	));
$installer
	->getConnection()
	->addColumn($installer->getTable('cms/page'), 'end_body_assets', array(
		'type'     => Varien_Db_Ddl_Table::TYPE_TEXT,
		'length'   => '2M',
		'nullable' => true,
		'default'  => '',
		'comment'  => 'End of Body CMS Assets'
	));

$installer->endSetup();

/**
 * Category pages
 */

$categoryInstaller = Mage::getResourceModel('catalog/setup', 'core_setup');
$categoryInstaller->startSetup();

$categoryInstaller->addAttribute(Mage_Catalog_Model_Category::ENTITY, 'head_assets', array(
	'group'      => 'Display Settings',
	'input'      => 'textarea',
	'type'       => 'text',
	'label'      => 'Head CMS Assets',
	'visible'    => true,
	'required'   => false,
	'sort_order' => 21,
	'global'     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));
$categoryInstaller->addAttribute(Mage_Catalog_Model_Category::ENTITY, 'end_body_assets', array(
	'group'      => 'Display Settings',
	'input'      => 'textarea',
	'type'       => 'text',
	'label'      => 'End of Body CMS Assets',
	'visible'    => true,
	'required'   => false,
	'sort_order' => 22,
	'global'     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$categoryInstaller->endSetup();
