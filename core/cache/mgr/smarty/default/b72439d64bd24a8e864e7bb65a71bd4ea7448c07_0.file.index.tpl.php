<?php /* Smarty version 3.1.27, created on 2018-02-15 19:15:25
         compiled from "/home/ubuntu/workspace/manager/templates/default/workspaces/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9366140545a85dc4daf6fa9_55182312%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b72439d64bd24a8e864e7bb65a71bd4ea7448c07' => 
    array (
      0 => '/home/ubuntu/workspace/manager/templates/default/workspaces/index.tpl',
      1 => 1518721475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9366140545a85dc4daf6fa9_55182312',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a85dc4dafc059_63566566',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a85dc4dafc059_63566566')) {
function content_5a85dc4dafc059_63566566 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '9366140545a85dc4daf6fa9_55182312';
echo (($tmp = @$_smarty_tpl->tpl_vars['error']->value)===null||$tmp==='' ? '' : $tmp);?>

<div id="modx-panel-workspace-div"></div>
<?php }
}
?>