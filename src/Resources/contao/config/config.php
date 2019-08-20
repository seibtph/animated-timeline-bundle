<?php

use Pdir\AnimatedTimelineBundle\Element\TimelineSliderElement;
use Pdir\AnimatedTimelineBundle\Element\TimelineStartElement;
use Pdir\AnimatedTimelineBundle\Element\TimelineStopElement;

// Insert the mate theme category
array_insert($GLOBALS['TL_CTE'], 1, array('pdirTimelineSlider' => array()));

/**
 * Add content element
 */
$GLOBALS['TL_CTE']['pdirTimelineSlider']['timelineSliderElement'] = TimelineSliderElement::class;
$GLOBALS['TL_CTE']['pdirTimelineSlider']['timelineSliderStart'] = TimelineStartElement::class;
$GLOBALS['TL_CTE']['pdirTimelineSlider']['timelineSliderStop'] = TimelineStopElement::class;

/**
 * Wrapper elements
 */
$GLOBALS['TL_WRAPPERS']['start'][] = 'timelineSliderStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'timelineSliderStop';
