id: 6
name: seoPro
description: 'SEO optimizing plugin for MODx Revolution.'
category: seoPro
properties: 'a:0:{}'

-----

/**
 * The base seoPro snippet.
 *
 * @package seopro
 */
$seoPro = $modx->getService('seopro', 'seoPro', $modx->getOption('seopro.core_path', null, $modx->getOption('core_path') . 'components/seopro/') . 'model/seopro/', $scriptProperties);
if (!($seoPro instanceof seoPro)) {
    return '';
}

$disabledTemplates = explode(',', $modx->getOption('seopro.disabledtemplates', null, '0'));

switch ($modx->event->name) {
    case 'OnMODXInit':
        $version = $modx->getVersionData();
        $version = (int)($version['version'] . $version['major_version']);
        if ($version < 27) {
            $modx->loadClass('modResource');
            $modx->map['modResource']['fieldMeta']['description'] = array(
                'dbtype' => 'text',
                'phptype' => 'string',
                'index' => 'fulltext',
                'indexgrp' => 'content_ft_idx',
            );
        }
        break;

    case 'OnDocFormRender':
        $template = (string)$resource->get('template');
        $override = false;
        if (isset($_REQUEST['template'])) {
            $template = (string)$_REQUEST['template'];
            $override = true;
        }
        if (($override && $template === '0') || (!empty($template) && in_array($template, $disabledTemplates))) {
            break;
        }
        
        $currClassKey = $resource->get('class_key');
        $strFields = $modx->getOption('seopro.fields', null, 'pagetitle:70,longtitle:70,description:320,alias:2023,menutitle:2023');
        $arrFields = array();
        if (is_array(explode(',', $strFields))) {
            foreach (explode(',', $strFields) as $field) {
                list($fieldName, $fieldCount) = explode(':', $field);
                $arrFields[$fieldName] = $fieldCount;
            }
        } else {
            return '';
        }

        $keywords = '';
        $modx->controller->addLexiconTopic('seopro:default');
        $ctxKey = !empty($resource) ? $resource->get('context_key') : $modx->getOption('default_context');
        $ctx = $modx->getContext($ctxKey);
        if ($ctx) {
            $url = $ctx->getOption('site_url', '', $modx->getOption('site_url'));
        } else {
            $url = $modx->getOption('site_url');
        }
        if ($mode == 'upd') {
            if ($ctx) {
                if ($resource->get('id') != $ctx->getOption('site_start', '', $modx->getOption('site_start'))) {
                    $url .= $resource->get('uri');
                }
            } else {
                $url = $modx->makeUrl($resource->get('id'), '', '', 'full');
            }
            $url = str_replace(
                $resource->get('alias'),
                '<span id=\"seopro-replace-alias\">' . $resource->get('alias') . '</span>',
                $url
            );
            $seoKeywords = $modx->getObject('seoKeywords', array('resource' => $resource->get('id')));
            if ($seoKeywords) {
                $keywords = $seoKeywords->get('keywords');
            }
        }

        if ($_REQUEST['id'] == $modx->getOption('site_start')) {
            unset($arrFields['alias']);
            unset($arrFields['menutitle']);
        }


        $config = $seoPro->config;
        unset($config['resource']);
        $modx->regClientStartupHTMLBlock('<script type="text/javascript">
        Ext.onReady(function() {
            seoPro.config = ' . $modx->toJSON($config) . ';
            seoPro.config.record = "' . $keywords . '";
            seoPro.config.values = {};
            seoPro.config.fields = "' . implode(",", array_keys($arrFields)) . '";
            seoPro.config.chars = ' . $modx->toJSON($arrFields) . '
            seoPro.config.url = "' . $url . '";
        });</script>');

        /* include CSS and JS*/
        $version = $modx->getVersionData();
        if($version['version'] == 2 && $version['major_version'] == 2){
            $modx->regClientCSS($seoPro->config['assetsUrl'] . 'css/mgr.css');
        }else{
            $modx->regClientCSS($seoPro->config['assetsUrl'] . 'css/mgr23.css');
        }
        $modx->regClientStartupScript($seoPro->config['assetsUrl'] . 'js/mgr/seopro.js??v=' . $modx->getOption('seopro.version', null, 'v1.0.0'));
        $modx->regClientStartupScript($seoPro->config['assetsUrl'] . 'js/mgr/resource.js?v=' . $modx->getOption('seopro.version', null, 'v1.0.0'));

        break;

    case 'OnDocFormSave':
        $template = (string)$resource->get('template');
        $override = false;
        if (isset($_REQUEST['template'])) {
            $template = (string)$_REQUEST['template'];
            $override = true;
        }
        if (($override && $template === '0') || (!empty($template) && in_array($template, $disabledTemplates))) {
            break;
        }
        $seoKeywords = $modx->getObject('seoKeywords', array('resource' => $resource->get('id')));
        if (!$seoKeywords && isset($resource)) {
            $seoKeywords = $modx->newObject('seoKeywords', array('resource' => $resource->get('id')));
        }
        if($seoKeywords){
            if (isset($_POST['keywords'])){
                $seoKeywords->set('keywords', trim($_POST['keywords'], ','));
            } else {
                $seoKeywords->set('keywords', '');
            }
            $seoKeywords->save();
        }
        break;

    case 'onResourceDuplicate':
        $template = (string)$resource->get('template');
        $override = false;
        if (isset($_REQUEST['template'])) {
            $template = (string)$_REQUEST['template'];
            $override = true;
        }
        if (($override && $template === '0') || (!empty($template) && in_array($template, $disabledTemplates))) {
            break;
        }

        $seoKeywords = $modx->getObject('seoKeywords', array('resource' => $resource->get('id')));
        if (!$seoKeywords) {
            $seoKeywords = $modx->newObject('seoKeywords', array('resource' => $resource->get('id')));
        }
        $newSeoKeywords = $modx->newObject('seoKeywords');
        $newSeoKeywords->fromArray($seoKeywords->toArray());
        $newSeoKeywords->set('resource', $newResource->get('id'));
        $newSeoKeywords->save();
        break;

    case 'OnLoadWebDocument':
        if ($modx->context->get('key') == "mgr") {
            break;
        }
        $template = ($modx->resource->get('template')) ? (string)$modx->resource->get('template') : '';
        if (in_array($template, $disabledTemplates)) {
            break;
        }
        $seoKeywords = $modx->getObject('seoKeywords', array('resource' => $modx->resource->get('id')));
        if ($seoKeywords) {
            $keyWords = $seoKeywords->get('keywords');
            $modx->setPlaceholder('seoPro.keywords', $keyWords);
        }
        // Render the meta title, based on system settings
        $titleFormat = $modx->getOption('seopro.title_format');
        if (empty($titleFormat)) {
            $siteDelimiter = $modx->getOption('seopro.delimiter', null, '/');
            $siteUseSitename = (boolean)$modx->getOption('seopro.usesitename', null, true);
            $siteID = $modx->resource->get('id');
            $siteName = $modx->getOption('site_name');
            $longtitle = $modx->resource->get('longtitle');
            $pagetitle = $modx->resource->get('pagetitle');
            $seoProTitle = array();
            if ($siteID == $modx->getOption('site_start')) {
                $seoProTitle['pagetitle'] = !empty($longtitle) ? $longtitle : $siteName;
            } else {
                $seoProTitle['pagetitle'] = !empty($longtitle) ? $longtitle : $pagetitle;
                if ($siteUseSitename) {
                    $seoProTitle['delimiter'] = $siteDelimiter;
                    $seoProTitle['sitename'] = $siteName;
                }
            }
            $title = implode(' ', $seoProTitle);
        } else {
            $title = $modx->getOption('seopro.title_format');
        }
        $modx->setPlaceholder('seoPro.title', $title);
        break;
}