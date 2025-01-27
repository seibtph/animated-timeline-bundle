<?php

/*
 * Animated timeline bundle for Contao Open Source CMS
 *
 * Copyright (c) 2019 pdir / digital agentur // pdir GmbH
 *
 * @package    animated-timeline-bundle
 * @link       https://pdir.de
 * @license    LGPL-3.0+
 * @author     Philipp Seibt <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['timelineSliderElement'] = '{type_legend},type,headline;{text_legend},text;{template_legend:hide},timelineElement_customTpl;{expert_legend:hide},cssID';

$GLOBALS['TL_DCA']['tl_content']['palettes']['timelineSliderStart'] = '{type_legend},type;{timeline_legend},timeline_orientation,timeline_eventsPerSlide;{template_legend:hide},timelineStart_customTpl;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['palettes']['timelineSliderStop'] = '{type_legend},type;{template_legend:hide},timelineStop_customTpl;{invisible_legend:hide},invisible,start,stop';

/*
 * Add fields to tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['fields']['timeline_orientation'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['timeline_orientation'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => $GLOBALS['TL_LANG']['tl_content']['timeline_orientation']['options'],
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['timeline_eventsPerSlide'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['timeline_eventsPerSlide'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 10, 'rgxp' => 'digit', 'tl_class' => 'w50'],
    'sql' => "int(10) unsigned NOT NULL default '0'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['timelineElement_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['timelineElement_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_content_timeline', 'getTimelineElementTemplates'],
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['timelineStart_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['timelineStart_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_content_timeline', 'getTimelineStartTemplates'],
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['timelineStop_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['timelineStop_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_content_timeline', 'getTimelineStopTemplates'],
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

class tl_content_timeline extends Backend
{
    /**
     * Return all content element templates as array.
     *
     * @param DataContainer $dc
     *
     * @return array
     */
    public function getTimelineElementTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('ce_timeline_element');
    }

    public function getTimelineStartTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('ce_timeline_start');
    }

    public function getTimelineStopTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('ce_timeline_stop');
    }
}
