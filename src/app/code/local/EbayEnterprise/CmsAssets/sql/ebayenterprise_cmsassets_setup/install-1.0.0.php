<?php
/**
 * eBay Enterprise CMS Assets module
 *
 * @category	EbayEnterprise
 * @package     EbayEnterprise_CmsAssets
 */

$installer = $this;
$installer->startSetup();

/* enterprise with revisions */
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

/* normal page no revisions */
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
