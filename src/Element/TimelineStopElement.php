<?php

namespace Pdir\AnimatedTimelineBundle\Element;

class TimelineStopElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_timeline_stop';

    /**
     * Generate the content element
     */
    protected function compile()
    {
        if (TL_MODE == 'BE')
        {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
        }

        if (TL_MODE == 'BE')
        {
            $this->strTemplate = 'be_wildcard';
            /** @var BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate($this->strTemplate);
            $this->Template = $objTemplate;
            $this->Template->wildcard = "### TIMELINE SLIDER START ###";
        }
    }
}
