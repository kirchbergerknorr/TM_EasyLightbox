<?php

class TM_EasyLightbox_Block_Adminhtml_Widget_Image 
    extends Mage_Adminhtml_Block_Template implements Varien_Data_Form_Element_Renderer_Interface
{

    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        return '<tr>
                    <td class="label"><label>Image</label></td>
                    <td class="value">
                        <script type="text/javascript" src="' . $this->getJsUrl('tm/easylightbox/ajaxUpload.js') . '"></script>
                        <input type="file" name="image" onchange="return AIM.submit($(this).up(\'form\'), {action: \'' . $this->getUrl('easylightbox/adminhtml_index/save') . '\'})">
                        <input type="hidden" name="imagepath">
                    </td>
                </tr>';
        return $this->toHtml();
    }
}
