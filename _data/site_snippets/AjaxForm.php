id: 40
source: 1
name: AjaxForm
category: AjaxForm
properties: 'a:7:{s:4:"form";a:7:{s:4:"name";s:4:"form";s:4:"desc";s:18:"ajaxform_prop_form";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:20:"tpl.AjaxForm.example";s:7:"lexicon";s:19:"ajaxform:properties";s:4:"area";s:0:"";}s:7:"snippet";a:7:{s:4:"name";s:7:"snippet";s:4:"desc";s:21:"ajaxform_prop_snippet";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:6:"FormIt";s:7:"lexicon";s:19:"ajaxform:properties";s:4:"area";s:0:"";}s:12:"frontend_css";a:7:{s:4:"name";s:12:"frontend_css";s:4:"desc";s:26:"ajaxform_prop_frontend_css";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:29:"[[+assetsUrl]]css/default.css";s:7:"lexicon";s:19:"ajaxform:properties";s:4:"area";s:0:"";}s:11:"frontend_js";a:7:{s:4:"name";s:11:"frontend_js";s:4:"desc";s:25:"ajaxform_prop_frontend_js";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:27:"[[+assetsUrl]]js/default.js";s:7:"lexicon";s:19:"ajaxform:properties";s:4:"area";s:0:"";}s:9:"actionUrl";a:7:{s:4:"name";s:9:"actionUrl";s:4:"desc";s:23:"ajaxform_prop_actionUrl";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:24:"[[+assetsUrl]]action.php";s:7:"lexicon";s:19:"ajaxform:properties";s:4:"area";s:0:"";}s:12:"formSelector";a:7:{s:4:"name";s:12:"formSelector";s:4:"desc";s:26:"ajaxform_prop_formSelector";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:9:"ajax_form";s:7:"lexicon";s:19:"ajaxform:properties";s:4:"area";s:0:"";}s:10:"objectName";a:7:{s:4:"name";s:10:"objectName";s:4:"desc";s:24:"ajaxform_prop_objectName";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:8:"AjaxForm";s:7:"lexicon";s:19:"ajaxform:properties";s:4:"area";s:0:"";}}'
static_file: core/components/ajaxform/elements/snippets/snippet.ajaxform.php

-----

/** @var array $scriptProperties */
/** @var AjaxForm $AjaxForm */
if (!$modx->loadClass('ajaxform', MODX_CORE_PATH . 'components/ajaxform/model/ajaxform/', false, true)) {
    return false;
}
$AjaxForm = new AjaxForm($modx, $scriptProperties);

$snippet = $modx->getOption('snippet', $scriptProperties, 'FormIt', true);
$tpl = $modx->getOption('form', $scriptProperties, 'tpl.AjaxForm.example', true);
$formSelector = $modx->getOption('formSelector', $scriptProperties, 'ajax_form', true);
$objectName = $modx->getOption('objectName', $scriptProperties, 'AjaxForm', true);
$AjaxForm->loadJsCss($objectName);

/** @var pdoTools $pdo */
if (class_exists('pdoTools') && $pdo = $modx->getService('pdoTools')) {
    $content = $pdo->getChunk($tpl, $scriptProperties);
} else {
    $content = $modx->getChunk($tpl, $scriptProperties);
}
if (empty($content)) {
    return $modx->lexicon('af_err_chunk_nf', array('name' => $tpl));
}

// Add selector to tag form
if (preg_match('#<form.*?class=(?:"|\')(.*?)(?:"|\')#i', $content, $matches)) {
    $classes = explode(' ', $matches[1]);
    if (!in_array($formSelector, $classes)) {
        $classes[] = $formSelector;
        $classes = preg_replace(
            '#class=(?:"|\')' . $matches[1] . '(?:"|\')#i',
            'class="' . implode(' ', $classes) . '"',
            $matches[0]
        );
        $content = str_ireplace($matches[0], $classes, $content);
    }
} else {
    $content = str_ireplace('<form', '<form class="' . $formSelector . '"', $content);
}

// Add method = post
if (preg_match('#<form.*?method=(?:"|\')(.*?)(?:"|\')#i', $content)) {
    $content = preg_replace('#<form(.*?)method=(?:"|\')(.*?)(?:"|\')#i', '<form\\1method="post"', $content);
} else {
    $content = str_ireplace('<form', '<form method="post"', $content);
}

// Add action for form processing
$hash = md5(http_build_query($scriptProperties));
$action = '<input type="hidden" name="af_action" value="' . $hash . '" />';
if ((stripos($content, '</form>') !== false)) {
    if (preg_match('#<input.*?name=(?:"|\')af_action(?:"|\').*?>#i', $content, $matches)) {
        $content = str_ireplace($matches[0], '', $content);
    }
    $content = str_ireplace('</form>', "\n\t$action\n</form>", $content);
}

// Save settings to user`s session
$_SESSION['AjaxForm'][$hash] = $scriptProperties;

// Call snippet for preparation of form
$action = !empty($_REQUEST['af_action'])
    ? $_REQUEST['af_action']
    : $hash;

$AjaxForm->process($action, $_REQUEST);

// Return chunk
return $content;