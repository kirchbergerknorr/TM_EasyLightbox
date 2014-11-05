<?php
class TM_EasyLightbox_Block_Image
    extends Mage_Core_Block_Template
        implements Mage_Widget_Block_Interface
{

    protected function _toHtml()
    {
        $html = '';

        if ($this->getData('imagepath') == '') {
            return $html;
        }
        
        $this->imageAttributes = array(
            'imagepath'             => $this->getData('imagepath'),
            'imagetitle'            => $this->getData('imagetitle'),
            'imagepagewidth'        => $this->getData('imagepagewidth'),
            'imagepageheight'       => $this->getData('imagepageheight'),
            'imagelightboxwidth'    => $this->getData('imagelightboxwidth'),
            'imagelightboxheight'   => $this->getData('imagelightboxheight'),
            'imagegroup'            => $this->getData('imagegroup')
        );

        return parent::_toHtml();
    }

}