<?php
class TM_EasyLightbox_Helper_Image extends Mage_Catalog_Helper_Image
{
    public function init($image)
    {
        $this->_reset();
        $this->_setModel(Mage::getModel('easylightbox/image'));
        $this->_getModel()->setDestinationSubdir('cache');
        $this->setImageFile($image);
        return $this;
    }
}