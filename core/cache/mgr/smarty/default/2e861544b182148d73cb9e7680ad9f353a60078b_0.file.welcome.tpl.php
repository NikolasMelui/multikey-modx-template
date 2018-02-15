<?php /* Smarty version 3.1.27, created on 2018-02-15 19:15:12
         compiled from "/home/ubuntu/workspace/manager/templates/default/welcome.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:340173585a85dc401e7982_76415286%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e861544b182148d73cb9e7680ad9f353a60078b' => 
    array (
      0 => '/home/ubuntu/workspace/manager/templates/default/welcome.tpl',
      1 => 1518721475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '340173585a85dc401e7982_76415286',
  'variables' => 
  array (
    'dashboard' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a85dc401eb560_12412815',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a85dc401eb560_12412815')) {
function content_5a85dc401eb560_12412815 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '340173585a85dc401e7982_76415286';
?>
<div id="modx-panel-welcome-div"></div>

<div id="modx-dashboard" class="dashboard">
<?php echo $_smarty_tpl->tpl_vars['dashboard']->value;?>

</div><?php }
}
?>