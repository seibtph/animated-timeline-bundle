<?php

namespace Pdir\AnimatedTimelineBundle\Element;

class TimelineSliderElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_timeline_element';

    /**
     * Generate the content element
     */
    protected function compile()
    {
        if (TL_MODE == 'BE')
        {
            $this->strTemplate = 'be_wildcard';
            /** @var BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate($this->strTemplate);
            $this->Template = $objTemplate;
            $this->Template->title = $this->headline;
            $this->Template->text = $this->text;
        }
    }

}
