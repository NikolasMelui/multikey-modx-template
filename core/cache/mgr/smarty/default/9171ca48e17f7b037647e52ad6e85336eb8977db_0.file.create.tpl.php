<?php /* Smarty version 3.1.27, created on 2018-02-15 19:38:40
         compiled from "/home/ubuntu/workspace/manager/templates/default/element/chunk/create.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17489821155a85e1c0b6d538_72762178%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9171ca48e17f7b037647e52ad6e85336eb8977db' => 
    array (
      0 => '/home/ubuntu/workspace/manager/templates/default/element/chunk/create.tpl',
      1 => 1518721475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17489821155a85e1c0b6d538_72762178',
  'variables' => 
  array (
    'onChunkFormPrerender' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a85e1c0b70fc1_82786043',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a85e1c0b70fc1_82786043')) {
function content_5a85e1c0b70fc1_82786043 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17489821155a85e1c0b6d538_72762178';
?>
<div id="modx-panel-chunk-div"></div>
<?php echo $_smarty_tpl->tpl_vars['onChunkFormPrerender']->value;

}
}
?>