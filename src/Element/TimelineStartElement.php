<?php

namespace Pdir\AnimatedTimelineBundle\Element;

class TimelineStartElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_timeline_start';


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
            $this->Template->wildcard = $GLOBALS['TL_LANG']['tl_content']['timeline_orientation'][0] . ": " . $GLOBALS['TL_LANG']['tl_content']['timeline_orientation']['options'][$this->timeline_orientation] . " / " . $GLOBALS['TL_LANG']['tl_content']['timeline_eventsPerSlide'][0] . ": " . $this->timeline_eventsPerSlide;
        } else {
            $this->Template->orientation = $this->timeline_orientation;
            $this->Template->eventsPerSlide = $this->timeline_eventsPerSlide;
        }
    }
}
