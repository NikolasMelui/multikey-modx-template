<?php /* Smarty version 3.1.27, created on 2018-02-15 19:37:47
         compiled from "/home/ubuntu/workspace/manager/templates/default/resource/sections/tvs.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:14366059175a85e18b6b3799_66381617%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd09d88c8231700b8c1634ae425fe32d245425ff1' => 
    array (
      0 => '/home/ubuntu/workspace/manager/templates/default/resource/sections/tvs.tpl',
      1 => 1518721475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14366059175a85e18b6b3799_66381617',
  'variables' => 
  array (
    'OnResourceTVFormPrerender' => 0,
    'categories' => 0,
    'category' => 0,
    'tv' => 0,
    'showCheckbox' => 0,
    '_lang' => 0,
    'tvcount' => 0,
    'tvCounts' => 0,
    'tvMap' => 0,
    'OnResourceTVFormRender' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a85e18b73bd98_62805541',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a85e18b73bd98_62805541')) {
function content_5a85e18b73bd98_62805541 ($_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/home/ubuntu/workspace/core/model/smarty/plugins/function.cycle.php';

$_smarty_tpl->properties['nocache_hash'] = '14366059175a85e18b6b3799_66381617';
echo $_smarty_tpl->tpl_vars['OnResourceTVFormPrerender']->value;?>


<input type="hidden" name="tvs" value="1" />
<div id="modx-tv-tabs" class="x-form-label-top">
<?php
$_from = $_smarty_tpl->tpl_vars['categories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['category']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
$foreach_category_Sav = $_smarty_tpl->tpl_vars['category'];
?>
<?php if (count($_smarty_tpl->tpl_vars['category']->value['tvs']) > 0) {?>

    <div id="modx-tv-tab<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" class="x-tab<?php if ($_smarty_tpl->tpl_vars['category']->value['hidden']) {?>-hidden<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['category']->value['category'];?>
">
    <?php
$_from = $_smarty_tpl->tpl_vars['category']->value['tvs'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['tv'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['tv']->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_tv'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars['tv']->value) {
$_smarty_tpl->tpl_vars['tv']->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_tv']->value['iteration']++;
$_smarty_tpl->tpl_vars['__foreach_tv']->value['first'] = $_smarty_tpl->tpl_vars['__foreach_tv']->value['iteration'] == 1;
$_smarty_tpl->tpl_vars['__foreach_tv']->value['last'] = $_smarty_tpl->tpl_vars['__foreach_tv']->value['iteration'] == $_smarty_tpl->tpl_vars['__foreach_tv']->value['total'];
$foreach_tv_Sav = $_smarty_tpl->tpl_vars['tv'];
?>
<?php if ($_smarty_tpl->tpl_vars['tv']->value->type != "hidden") {?>
    <div class="modx-tv-type-<?php echo $_smarty_tpl->tpl_vars['tv']->value->type;?>
 x-form-item x-tab-item <?php echo smarty_function_cycle(array('values'=>",alt"),$_smarty_tpl);?>
 modx-tv<?php if ((isset($_smarty_tpl->tpl_vars['__foreach_tv']->value['first']) ? $_smarty_tpl->tpl_vars['__foreach_tv']->value['first'] : null)) {?> tv-first<?php }
if ((isset($_smarty_tpl->tpl_vars['__foreach_tv']->value['last']) ? $_smarty_tpl->tpl_vars['__foreach_tv']->value['last'] : null)) {?> tv-last<?php }?>" id="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
-tr">
        <label for="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
" class="x-form-item-label modx-tv-label">
            <div class="modx-tv-label-title">
                <?php if ((($tmp = @$_smarty_tpl->tpl_vars['showCheckbox']->value)===null||$tmp==='' ? '' : $tmp)) {?><input type="checkbox" name="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
-checkbox" class="modx-tv-checkbox" value="1" /><?php }?>
                <span class="modx-tv-caption" id="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
-caption"><?php if ($_smarty_tpl->tpl_vars['tv']->value->caption) {
echo $_smarty_tpl->tpl_vars['tv']->value->caption;
} else {
echo $_smarty_tpl->tpl_vars['tv']->value->name;
}?></span>
            </div>
            <a class="modx-tv-reset" id="modx-tv-reset-<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
" title="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['set_to_default'];?>
"></a>
            <?php if ($_smarty_tpl->tpl_vars['tv']->value->description) {?>
            <span class="modx-tv-label-description"><?php echo $_smarty_tpl->tpl_vars['tv']->value->description;?>
</span>
            <?php }?>
        </label>
        <?php if ($_smarty_tpl->tpl_vars['tv']->value->inherited) {?><span class="modx-tv-inherited"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['tv_value_inherited'];?>
</span><?php }?>
        <div class="x-form-element modx-tv-form-element">
            <input type="hidden" id="tvdef<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tv']->value->default_text, ENT_QUOTES, 'UTF-8', true);?>
" />
            <?php echo $_smarty_tpl->tpl_vars['tv']->value->get('formElement');?>

        </div>
    </div>
    <?php echo '<script'; ?>
 type="text/javascript">Ext.onReady(function() { new Ext.ToolTip({target: 'tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
-caption',html: '[[*<?php echo $_smarty_tpl->tpl_vars['tv']->value->name;?>
]]'});});<?php echo '</script'; ?>
>
<?php } else { ?>
    <input type="hidden" id="tvdef<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tv']->value->default_text, ENT_QUOTES, 'UTF-8', true);?>
" />
    <?php echo $_smarty_tpl->tpl_vars['tv']->value->get('formElement');?>

<?php }?>
    <?php
$_smarty_tpl->tpl_vars['tv'] = $foreach_tv_Sav;
}
?>

    <div class="clear"></div>

    </div>
<?php }?>
<?php
$_smarty_tpl->tpl_vars['category'] = $foreach_category_Sav;
}
?>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
// <![CDATA[
Ext.onReady(function() {
    MODx.resetTV = function(id) {
        var i = Ext.get('tv'+id);
        var d = Ext.get('tvdef'+id);

        if (i) {
            i.dom.value = d.dom.value;
            i.dom.checked = d.dom.value ? true : false;
        }
        var c = Ext.getCmp('tv'+id);
        if (c) {
            if (c.xtype == 'checkboxgroup' || c.xtype == 'radiogroup') {
                var cbs = d.dom.value.split(',');
                for (var i=0;i<c.items.length;i++) {
                    if (c.items.items[i]) {
                        c.items.items[i].setValue(cbs.indexOf(c.items.items[i].id) != -1);
                    }
                }
            } else {
                c.setValue(d.dom.value);
            }
        }
        var p = Ext.getCmp('modx-panel-resource');
        if (p) {
            p.markDirty();
            p.fireEvent('tv-reset',{id:id});
        }
    };

    Ext.select('.modx-tv-reset').on('click',function(e,t,o) {
        var id = t.id.split('-');
        id = id[3];
        MODx.resetTV(id);
    });
    MODx.refreshTVs = function() {
        if (MODx.unloadTVRTE) { MODx.unloadTVRTE(); }
        Ext.getCmp('modx-panel-resource-tv').refreshTVs();
    };
    <?php if ($_smarty_tpl->tpl_vars['tvcount']->value > 0) {?>
    MODx.load({
        xtype: 'modx-vtabs'
        ,applyTo: 'modx-tv-tabs'
        ,autoTabs: true
        ,border: false
        ,plain: true
        ,deferredRender: false
        ,id: 'modx-resource-vtabs'
        ,headerCfg: {
            tag: 'div'
            ,cls: 'x-tab-panel-header vertical-tabs-header'
            ,id: 'modx-resource-vtabs-header'
            ,html: MODx.config.show_tv_categories_header === true ? '<h4 id="modx-resource-vtabs-header-title">'+_('categories')+'</h4>' : ''
        }
        ,listeners: {
            beforeadd: function (tabpanel, comp) {
                if (comp.contentEl && (Ext.get(comp.contentEl).child('.modx-tv') === null)) {
                    return false;
                }
            }
            ,afterrender: function (tabpanel) {
                if (tabpanel.items.length === 0) {
                    Ext.getCmp('modx-resource-tabs').hideTabStripItem('modx-panel-resource-tv');
                }
            }
        }
    });
    <?php }?>

    MODx.tvCounts = <?php echo $_smarty_tpl->tpl_vars['tvCounts']->value;?>
;
    MODx.tvMap = <?php echo $_smarty_tpl->tpl_vars['tvMap']->value;?>
;
    
});
// ]]>
<?php echo '</script'; ?>
>


<?php echo $_smarty_tpl->tpl_vars['OnResourceTVFormRender']->value;?>


    <div class="clear"></div>
<?php }
}
?>