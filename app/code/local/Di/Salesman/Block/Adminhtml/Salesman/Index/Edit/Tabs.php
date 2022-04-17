<?php

class Di_Salesman_Block_Adminhtml_Salesman_Index_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
	public function __construct()
    {
        parent::__construct();
        $this->setId('salesman_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('salesman')->__('salesman Info.'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('form_section', array(
         'label'     => Mage::helper('salesman')->__('Salesman Information'),
        'title'     => Mage::helper('salesman')->__('Salesman Information'),
        'content' => $this->getLayout()->createBlock('salesman/adminhtml_salesman_index_edit_tab_form')->toHtml(),));

        return parent::_beforeToHtml();
    }
}