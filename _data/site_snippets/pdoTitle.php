id: 9
source: 1
name: pdoTitle
category: pdoTools
properties: 'a:13:{s:2:"id";a:7:{s:4:"name";s:2:"id";s:4:"desc";s:16:"pdotools_prop_id";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:0;s:7:"lexicon";s:19:"pdotools:properties";s:4:"area";s:0:"";}s:7:"exclude";a:7:{s:4:"name";s:7:"exclude";s:4:"desc";s:21:"pdotools_prop_exclude";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"pdotools:properties";s:4:"area";s:0:"";}s:5:"limit";a:7:{s:4:"name";s:5:"limit";s:4:"desc";s:25:"pdotools_prop_title_limit";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:3;s:7:"lexicon";s:19:"pdotools:properties";s:4:"area";s:0:"";}s:10:"titleField";a:7:{s:4:"name";s:10:"titleField";s:4:"desc";s:24:"pdotools_prop_titleField";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:9:"longtitle";s:7:"lexicon";s:19:"pdotools:properties";s:4:"area";s:0:"";}s:5:"cache";a:7:{s:4:"name";s:5:"cache";s:4:"desc";s:25:"pdotools_prop_title_cache";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"pdotools:properties";s:4:"area";s:0:"";}s:9:"cacheTime";a:7:{s:4:"name";s:9:"cacheTime";s:4:"desc";s:23:"pdotools_prop_cacheTime";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:0;s:7:"lexicon";s:19:"pdotools:properties";s:4:"area";s:0:"";}s:8:"tplPages";a:7:{s:4:"name";s:8:"tplPages";s:4:"desc";s:22:"pdotools_prop_tplPages";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:68:"@INLINE [[%pdopage_page]] [[+page]] [[%pdopage_from]] [[+pageCount]]";s:7:"lexicon";s:19:"pdotools:properties";s:4:"area";s:0:"";}s:10:"pageVarKey";a:7:{s:4:"name";s:10:"pageVarKey";s:4:"desc";s:24:"pdotools_prop_pageVarKey";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:4:"page";s:7:"lexicon";s:19:"pdotools:properties";s:4:"area";s:0:"";}s:9:"tplSearch";a:7:{s:4:"name";s:9:"tplSearch";s:4:"desc";s:23:"pdotools_prop_tplSearch";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:27:"@INLINE «[[+mse2_query]]»";s:7:"lexicon";s:19:"pdotools:properties";s:4:"area";s:0:"";}s:11:"queryVarKey";a:7:{s:4:"name";s:11:"queryVarKey";s:4:"desc";s:25:"pdotools_prop_queryVarKey";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:5:"query";s:7:"lexicon";s:19:"pdotools:properties";s:4:"area";s:0:"";}s:8:"minQuery";a:7:{s:4:"name";s:8:"minQuery";s:4:"desc";s:22:"pdotools_prop_minQuery";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:3;s:7:"lexicon";s:19:"pdotools:properties";s:4:"area";s:0:"";}s:15:"outputSeparator";a:7:{s:4:"name";s:15:"outputSeparator";s:4:"desc";s:35:"pdotools_prop_title_outputSeparator";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:3:" / ";s:7:"lexicon";s:19:"pdotools:properties";s:4:"area";s:0:"";}s:10:"registerJs";a:7:{s:4:"name";s:10:"registerJs";s:4:"desc";s:24:"pdotools_prop_registerJs";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"pdotools:properties";s:4:"area";s:0:"";}}'
static_file: core/components/pdotools/elements/snippets/snippet.pdotitle.php

-----

/** @var array $scriptProperties */
if (empty($outputSeparator)) {
    $outputSeparator = ' / ';
}
if (empty($titleField)) {
    $titleField = 'longtitle';
}
if (!isset($pageVarKey)) {
    $pageVarKey = 'page';
}
if (!isset($queryVarKey)) {
    $queryVarKey = 'query';
}
if (empty($tplPages)) {
    $tplPages = '@INLINE [[%pdopage_page]] [[+page]] [[%pdopage_from]] [[+pageCount]]';
}
if (empty($tplSearch)) {
    $tplSearch = '@INLINE «[[+mse2_query]]»';
}
if (empty($minQuery)) {
    $minQuery = 3;
}
if (empty($id)) {
    $id = $modx->resource->id;
}
if (empty($cacheKey)) {
    $cacheKey = 'title_crumbs';
}
if (!isset($cacheTime)) {
    $cacheTime = 0;
}
/** @var pdoTools $pdoTools */
$fqn = $modx->getOption('pdoTools.class', null, 'pdotools.pdotools', true);
$path = $modx->getOption('pdotools_class_path', null, MODX_CORE_PATH . 'components/pdotools/model/', true);
if ($pdoClass = $modx->loadClass($fqn, $path, false, true)) {
    $pdoTools = new $pdoClass($modx, $scriptProperties);
} else {
    return false;
}
$modx->lexicon->load('pdotools:pdopage');

/** @var modResource $resource */
$resource = ($id == $modx->resource->id)
    ? $modx->resource
    : $modx->getObject('modResource', $id);
if (!$resource) {
    return '';
}

$title = array();
$pagetitle = trim($resource->get($titleField));
if (empty($pagetitle)) {
    $pagetitle = $resource->get('pagetitle');
}

// Add search request if exists
if (!empty($_GET[$queryVarKey]) && strlen($_GET[$queryVarKey]) >= $minQuery && !empty($tplSearch)) {
    $pagetitle .= ' ' . $pdoTools->getChunk($tplSearch, array(
            $queryVarKey => $modx->stripTags($_GET[$queryVarKey]),
        ));
}
$title[] = $pagetitle;

// Add pagination if exists
if (!empty($_GET[$pageVarKey]) && !empty($tplPages)) {
    $title[] = $pdoTools->getChunk($tplPages, array(
        'page' => intval($_GET[$pageVarKey]),
    ));
}

// Add parents
$cacheKey = $resource->getCacheKey() . '/' . $cacheKey;
$cacheOptions = array('cache_key' => $modx->getOption('cache_resource_key', null, 'resource'));
$crumbs = '';
if (empty($cache) || !$crumbs = $modx->cacheManager->get($cacheKey, $cacheOptions)) {
    $crumbs = $pdoTools->runSnippet('pdoCrumbs', array_merge(
        array(
            'to' => $resource->id,
            'outputSeparator' => $outputSeparator,
            'showHome' => 0,
            'showAtHome' => 0,
            'showCurrent' => 0,
            'direction' => 'rtl',
            'tpl' => '@INLINE [[+menutitle]]',
            'tplCurrent' => '@INLINE [[+menutitle]]',
            'tplWrapper' => '@INLINE [[+output]]',
            'tplMax' => '',
            'tplHome' => '',
        ), $scriptProperties
    ));
}
if (!empty($crumbs)) {
    if (!empty($cache)) {
        $modx->cacheManager->set($cacheKey, $crumbs, $cacheTime, $cacheOptions);
    }
    $title[] = $crumbs;
}

if (!empty($registerJs)) {
    $config = array(
        'separator' => $outputSeparator,
        'tpl' => str_replace(array('[[+', ']]'), array('{', '}'), $pdoTools->getChunk($tplPages)),
    );
    /** @noinspection Annotator */
    $modx->regClientStartupScript('<script type="text/javascript">pdoTitle = ' . json_encode($config) . ';</script>',
        true);
}

return implode($outputSeparator, $title);