id: 18
source: 1
name: tagElementPlugin
category: tagElementPlugin
properties: null
static_file: core/components/tagelementplugin/elements/plugins/plugin.tagelementplugin.php

-----

switch ($modx->event->name) {
    case 'OnDocFormPrerender':
        $field = 'ta';
        $panel = '';
        break;
    case 'OnTempFormPrerender':
        $field = 'modx-template-content';
        $panel = 'modx-panel-template';
        break;
    case 'OnChunkFormPrerender':
        $field = 'modx-chunk-snippet';
        $panel = 'modx-panel-chunk';
        break;
    case 'OnSnipFormPrerender':
        $field = 'modx-snippet-snippet';
        $panel = 'modx-panel-snippet';
        break;
    case 'OnPluginFormPrerender':
        $field = 'modx-plugin-plugincode';
        $panel = 'modx-panel-plugin';
        break;
    default:
        return;
}
if (!empty($field)) {
    $modx->controller->addLexiconTopic('core:chunk');
    $modx->controller->addLexiconTopic('core:snippet');
    $modx->controller->addLexiconTopic('tagelementplugin:default');
    $jsUrl = $modx->getOption('tagelementplugin_assets_url', null, $modx->getOption('assets_url') . 'components/tagelementplugin/').'js/mgr/';
    /** @var modManagerController */
    $modx->controller->addLastJavascript($jsUrl.'tagelementplugin.js');
    $modx->controller->addLastJavascript($jsUrl.'dialogs.js');
    $usingFenon = $modx->getOption('pdotools_fenom_parser',null,false) ? 'true' : 'false';
    $_html = "<script type=\"text/javascript\">\n";
    $_html .= "\tvar tagElPlugin = {};\n";
    $_html .= "\ttagElPlugin.config = {\n";
    $_html .= "\t\tpanel : '{$panel}',\n" ;
    $_html .= "\t\tfield : '{$field}',\n" ;
    $_html .= "\t\tparent : [],\n" ;
    $_html .= "\t\tkeys : {\n\t\t\tquickEditor :". $modx->getOption('tagelementplugin_quick_editor_keys',null,'') . ",\n" ;
    $_html .= "\t\t\telementEditor :". $modx->getOption('tagelementplugin_element_editor_keys',null,'') . ",\n" ;
    $_html .= "\t\t\tchunkEditor :". $modx->getOption('tagelementplugin_chunk_editor_keys',null,'') . ",\n" ;
    $_html .= "\t\t\tquickChunkEditor :". $modx->getOption('tagelementplugin_quick_chunk_editor_keys',null,'') . ",\n" ;
    $_html .= "\t\t\telementProperties :". $modx->getOption('tagelementplugin_element_prop_keys',null,'') . "\n\t\t},\n" ;
    $_html .= "\t\tusing_fenom : {$usingFenon},\n" ;
    $_html .= "\t\telementEditor : '".$modx->getOption('which_element_editor')."',\n" ;
    $_html .= "\t\tconnector_url : '". $modx->getOption('tagelementplugin_assets_url', null, $modx->getOption('assets_url') . "components/tagelementplugin/")."connector.php'\n";
    $_html .= "\t};\n";
    $_html .= "</script>";
    $modx->controller->addHtml($_html);
}