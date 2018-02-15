<?php /* Smarty version 3.1.27, created on 2018-02-15 19:14:38
         compiled from "/home/ubuntu/workspace/manager/templates/default/security/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9765821775a85dc1eb0d946_13125714%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ed75b114a5bc5dfb922cb0079ba86c647ce9b12' => 
    array (
      0 => '/home/ubuntu/workspace/manager/templates/default/security/login.tpl',
      1 => 1518721475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9765821775a85dc1eb0d946_13125714',
  'variables' => 
  array (
    '_config' => 0,
    '_lang' => 0,
    'onManagerLoginFormPrerender' => 0,
    'modahsh' => 0,
    'returnUrl' => 0,
    'error_message' => 0,
    '_post' => 0,
    'allow_forgot_password' => 0,
    'onManagerLoginFormRender' => 0,
    'language_str' => 0,
    'languages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a85dc1ec0cc59_93828338',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a85dc1ec0cc59_93828338')) {
function content_5a85dc1ec0cc59_93828338 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/ubuntu/workspace/core/model/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '9765821775a85dc1eb0d946_13125714';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php if ($_smarty_tpl->tpl_vars['_config']->value['manager_direction'] == 'rtl') {?>dir="rtl"<?php }?> lang="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_lang_attribute'];?>
" xml:lang="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_lang_attribute'];?>
">
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['_lang']->value['login_title'];?>
 | <?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['_config']->value['site_name']), ENT_QUOTES, 'UTF-8', true);?>
</title>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['_config']->value['modx_charset'];?>
" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php if ($_smarty_tpl->tpl_vars['_config']->value['manager_favicon_url']) {?><link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_favicon_url'];?>
" /><?php }?>

    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/resources/css/ext-all-notheme-min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
templates/default/css/index<?php if ($_smarty_tpl->tpl_vars['_config']->value['compress_css']) {?>-min<?php }?>.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
templates/default/css/login<?php if ($_smarty_tpl->tpl_vars['_config']->value['compress_css']) {?>-min<?php }?>.css" />

<?php if (isset($_smarty_tpl->tpl_vars['_config']->value['ext_debug']) && $_smarty_tpl->tpl_vars['_config']->value['ext_debug']) {?>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/adapter/ext/ext-base-debug.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/ext-all-debug.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php } else { ?>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/adapter/ext/ext-base.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/ext-all.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php }?>
    <?php echo '<script'; ?>
 src="assets/modext/core/modx.js" type="text/javascript"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="assets/modext/core/modx.component.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/modext/util/utilities.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/modext/widgets/core/modx.panel.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/modext/widgets/core/modx.window.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/modext/sections/login.js" type="text/javascript"><?php echo '</script'; ?>
>

    <meta name="robots" content="noindex, nofollow" />
</head>

<body id="login">
<?php echo $_smarty_tpl->tpl_vars['onManagerLoginFormPrerender']->value;?>

<br />

<div id="container">
    <div id="modx-login-logo">
        <!--[if gte IE 9]><!--><img alt="MODX CMS/CMF" src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
templates/default/images/modx-logo-color.svg" data-fallback="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
templates/default/images/modx-logo-color.png" onerror="this.src=this.getAttribute('data-fallback');this.onerror=null;" /><!--<![endif]-->
        <!--[if lt IE 9]><img alt="MODX CMS/CMF" src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
templates/default/images/modx-logo-color.png" /><![endif]-->
    </div>

    <div id="modx-panel-login-div" class="x-panel modx-form x-form-label-right">
        <form id="modx-login-form" action="" method="post">
            <input type="hidden" name="login_context" value="mgr" />
            <input type="hidden" name="modahsh" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['modahsh']->value)===null||$tmp==='' ? '' : $tmp);?>
" />
            <input type="hidden" name="returnUrl" value="<?php echo $_smarty_tpl->tpl_vars['returnUrl']->value;?>
" />

            <div class="x-panel x-panel-noborder">
                <div class="x-panel-bwrap">
                    <div class="x-panel-body x-panel-body-noheader">
                        <h2><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['_config']->value['site_name']), ENT_QUOTES, 'UTF-8', true);?>
</h2>
                        <br class="clear" />
<?php if ((($tmp = @$_smarty_tpl->tpl_vars['error_message']->value)===null||$tmp==='' ? '' : $tmp)) {?>
                        <p class="error"><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</p>
<?php }?>
                    </div>
                </div>
            </div>

            <div class="x-form-item login-form-item login-form-item-first">
                <label for="modx-login-username"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['login_username'];?>
</label>
                <div class="x-form-element login-form-element">
                    <input type="text" id="modx-login-username" name="username" autocomplete="on" autofocus value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['_post']->value['username'])===null||$tmp==='' ? '' : $tmp);?>
" class="x-form-text x-form-field" aria-required="true" required />
                </div>
            </div>

            <div class="x-form-item login-form-item">
                <label for="modx-login-password"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['login_password'];?>
</label>
                <div class="x-form-element login-form-element">
                    <input type="password" id="modx-login-password" name="password" autocomplete="on" class="x-form-text x-form-field" aria-required="true" required />
                </div>
            </div>

            <div class="login-cb-row">
                <div class="login-cb-col one">
                    <div class="modx-login-fl-link">
<?php if ((($tmp = @$_smarty_tpl->tpl_vars['allow_forgot_password']->value)===null||$tmp==='' ? '' : $tmp)) {?>
                        <a href="javascript:void(0);" id="modx-fl-link" style="<?php if ((($tmp = @$_smarty_tpl->tpl_vars['_post']->value['username_reset'])===null||$tmp==='' ? '' : $tmp)) {?>display:none;<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['login_forget_your_login'];?>
</a>
<?php }?>
                    </div>
                </div>
                <div class="login-cb-col two">
                    <div class="x-form-check-wrap modx-login-rm-cb">
                        <input type="checkbox" id="modx-login-rememberme" name="rememberme" autocomplete="on" <?php if ((($tmp = @$_smarty_tpl->tpl_vars['_post']->value['rememberme'])===null||$tmp==='' ? '' : $tmp)) {?>checked="checked"<?php }?> class="x-form-checkbox x-form-field" value="1" />
                        <label for="modx-login-rememberme" class="x-form-cb-label"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['login_remember'];?>
</label>
                    </div>
                    <button class="x-btn x-btn-small x-btn-icon-small-left primary-button x-btn-noicon login-form-btn" name="login" type="submit" value="1" id="modx-login-btn"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['login_button'];?>
</button>
                </div>
            </div>

            <?php echo $_smarty_tpl->tpl_vars['onManagerLoginFormRender']->value;?>

        </form>

<?php if ((($tmp = @$_smarty_tpl->tpl_vars['allow_forgot_password']->value)===null||$tmp==='' ? '' : $tmp)) {?>
        <div class="modx-forgot-login">
            <form id="modx-fl-form" action="" method="post">
                <div id="modx-forgot-login-form" style="<?php if (!(($tmp = @$_smarty_tpl->tpl_vars['_post']->value['username_reset'])===null||$tmp==='' ? '' : $tmp)) {?>display: none;<?php }?>">
                    <div class="x-form-item login-form-item">
                        <div class="x-form-element login-form-element">
                            <input type="text" id="modx-login-username-reset" name="username_reset" class="x-form-text x-form-field" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['_post']->value['username_reset'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['login_username_or_email'];?>
" />
                        </div>
                        <div class="x-form-clear-left"></div>
                    </div>

                    <button class="x-btn x-btn-small x-btn-icon-small-left primary-button x-btn-noicon login-form-btn" name="forgotlogin" type="submit" value="1" id="modx-fl-btn"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['login_send_activation_email'];?>
</button>
                </div>
            </form>
        </div>
<?php }?>
        <br class="clear" />
    </div>

    <p class="loginLicense"><?php ob_start();
echo date('Y');
$_tmp1=ob_get_clean();
echo smarty_modifier_replace($_smarty_tpl->tpl_vars['_lang']->value['login_copyright'],'[[+current_year]]',$_tmp1);?>
</p>
</div>

<div id="modx-login-language-select-div">
    <label id="modx-login-language-select-label"><?php echo $_smarty_tpl->tpl_vars['language_str']->value;?>
:
        <select name="cultureKey" id="modx-login-language-select" aria-labeled-by="modx-login-language-select-label">
<?php echo preg_replace('!^!m',str_repeat(' ',12),$_smarty_tpl->tpl_vars['languages']->value);?>

        </select>
    </label>
</div>
</body>
</html>
<?php }
}
?>