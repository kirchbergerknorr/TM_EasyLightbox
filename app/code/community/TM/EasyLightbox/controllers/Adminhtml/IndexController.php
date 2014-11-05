<?php

class TM_EasyLightbox_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    public function saveAction()
    {
        $path = Mage::getBaseDir('media') . '/easylightbox/';
        if ($this->getRequest()->isPost()){
            try{
                $uploader = new Varien_File_Uploader('image');
                $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
                $uploader->setAllowRenameFiles(true);
                $result = $uploader->save($path);
            } catch (Exception $e) {
                $this->getResponse()->setBody(Mage::helper('core')->jsonEncode(array(
                    'success' => false,
                    'message' => $e->getMessage()
                )));
                return;
            }
            $this->getResponse()->setBody(Mage::helper('core')->jsonEncode(array(
                'success'   => true,
                'imagepath' => $result['file']
            )));
        }
    }
}
