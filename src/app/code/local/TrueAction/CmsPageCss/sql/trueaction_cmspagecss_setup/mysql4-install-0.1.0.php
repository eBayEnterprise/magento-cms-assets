<?php
/**
 * TrueAction CSS Page CSS module
 *
 * @category    TrueAction
 * @package     TrueAction_CmsPageCss
 */

$installer = $this;
$installer->startSetup();

/* enterprise with revisions */
$installer
    ->getConnection()
    ->addColumn($installer->getTable('enterprise_cms/page_revision'), 'header_css', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
        'length'    => '2M',
        'nullable'  => true,
        'default'   => '',
        'comment'		=> 'Header CSS'
    ));

/* normal page no revisions */
$installer
    ->getConnection()
    ->addColumn($installer->getTable('cms/page'), 'header_css', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
        'length'    => '2M',
        'nullable'  => true,
        'default'   => '',
        'comment'		=> 'Header CSS'
    ));

$installer->endSetup();
