id: 13
source: 1
name: modDevTools
category: modDevTools
properties: null
static_file: core/components/moddevtools/elements/plugins/plugin.moddevtools.php

-----

/**
 * modDevTools
 *
 * Copyright 2014 by Vitaly Kireev <kireevvit@gmail.com>
 *
 * @package moddevtools
 *
 * @var modX $modx
 * @var int $id
 * @var string $mode
 */

/**
 * @var modx $modx
 */
$path = $modx->getOption('moddevtools_core_path',null,$modx->getOption('core_path').'components/moddevtools/').'model/moddevtools/';
/**
 * @var modDevTools $devTools
 */
$devTools = $modx->getService('devTools','modDevTools',$path, array('debug' => false));
$eventName = $modx->event->name;

switch($eventName) {
    case 'OnDocFormSave':
        $devTools->debug('Start OnDocFormSave');
        $devTools->parseContent($resource);
        break;
    case 'OnTempFormSave':
        $devTools->debug('Start OnTempFormSave');
        $devTools->parseContent($template);
        break;
    case 'OnTVFormSave':

        break;
    case 'OnChunkFormSave':
        $devTools->debug('Start OnChunkFormSave');
        $devTools->parseContent($chunk);
        break;
    case 'OnSnipFormSave':

        break;
    /* Add tabs */
    case 'OnDocFormPrerender':
        if ($modx->event->name == 'OnDocFormPrerender') {
            $devTools->getBreadCrumbs($scriptProperties);
            return;
        }
        break;

    case 'OnTempFormPrerender':
        if ($mode == modSystemEvent::MODE_UPD) {
            $result = $devTools->outputTab('Template');
        }
        break;

    case 'OnTVFormPrerender':
        break;


    case 'OnChunkFormPrerender':
        if ($mode == modSystemEvent::MODE_UPD) {
            $result = $devTools->outputTab('Chunk');
        }
        break;

    case 'OnSnipFormPrerender':
        if ($mode == modSystemEvent::MODE_UPD) {
            $result = $devTools->outputTab('Snippet');
        }
        break;


}

if (isset($result) && $result === true)
    return;
elseif (isset($result)) {
    $modx->log(modX::LOG_LEVEL_ERROR,'[modDevTools] An error occured. Event: '.$eventName.' - Error: '.($result === false) ? 'undefined error' : $result);
    return;
}