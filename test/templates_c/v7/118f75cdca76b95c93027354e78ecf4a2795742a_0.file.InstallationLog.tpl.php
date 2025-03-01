<?php
/* Smarty version 3.1.39, created on 2023-10-26 12:32:27
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Settings\ITS4YouInstaller\InstallationLog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_653a5c5bcb9327_47353070',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '118f75cdca76b95c93027354e78ecf4a2795742a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Settings\\ITS4YouInstaller\\InstallationLog.tpl',
      1 => 1698323491,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_653a5c5bcb9327_47353070 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-dialog modal-lg installationLog"><div class='modal-content'><div class="modal-header" style="background: #596875;color:white;"><div class="pull-right " ><button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true" class='fa fa-close'></span></button></div><div class="row"><div class="col-lg-11 col-md-11"><?php if ($_smarty_tpl->tpl_vars['ERROR']->value) {?><input type="hidden" name="installationStatus" value="error" /><h3 class="modal-title" style="color: red"><?php if ($_smarty_tpl->tpl_vars['MODULE_ACTION']->value == "Upgrade") {
echo vtranslate('LBL_UPGRADE_FAILED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
} else {
echo vtranslate('LBL_INSTALLATION_FAILED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
}?></h3><?php } else { ?><input type="hidden" name="installationStatus" value="success" /><h3 class="modal-title"><?php if ('Upgrade' == $_smarty_tpl->tpl_vars['MODULE_ACTION']->value) {
echo vtranslate('LBL_UPGRADE_INFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
} else {
echo vtranslate('LBL_INSTALL_INFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
}?></h3><?php }?></div></div></div><div class="modal-body" id="installationLog"><h3><?php if ($_smarty_tpl->tpl_vars['MODULE_ACTION']->value == "Upgrade") {
echo vtranslate('LBL_UPGRADE_LOG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
} else {
echo vtranslate('LBL_INSTALLATION_LOG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
}?></h3><div id="extensionInstallationInfo" class="backgroundImageNone" style="background-color: white;"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ERRORS']->value, 'ERROR');
$_smarty_tpl->tpl_vars['ERROR']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ERROR']->value) {
$_smarty_tpl->tpl_vars['ERROR']->do_else = false;
?><h4><?php echo vtranslate($_smarty_tpl->tpl_vars['ERROR']->value['EXTENSION'],$_smarty_tpl->tpl_vars['ERROR']->value['EXTENSION']);?>
</h4><p style="color:red;"><?php echo vtranslate($_smarty_tpl->tpl_vars['ERROR']->value['message'],$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</p><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['EXTENSIONS']->value, 'EXTENSION');
$_smarty_tpl->tpl_vars['EXTENSION']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['EXTENSION']->value) {
$_smarty_tpl->tpl_vars['EXTENSION']->do_else = false;
?><h4><?php echo vtranslate($_smarty_tpl->tpl_vars['EXTENSION']->value->getName(),$_smarty_tpl->tpl_vars['EXTENSION']->value->getName());?>
</h4><?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->installExtension();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div><div class="modal-footer"><span class="pull-right"><button class="btn btn-success" id="importCompleted" onclick="location.reload()"><?php echo vtranslate('LBL_OK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></span></div></div></div><?php }
}
