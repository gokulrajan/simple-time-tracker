<?php /* Smarty version 3.0rc1, created on 2010-07-28 15:35:17
         compiled from "./view/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3608179674c5032154e5680-20263773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebfcf0d26d98f396008dbcba2a6c4ed225e0dcf0' => 
    array (
      0 => './view/header.tpl',
      1 => 1274984530,
    ),
  ),
  'nocache_hash' => '3608179674c5032154e5680-20263773',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $_smarty_tpl->getVariable('APP_NAME')->value;?>
</title>
    </head>
    <body>
		<div id="header">
        	<h1><?php echo $_smarty_tpl->getVariable('APP_NAME')->value;?>
</h1>
            <?php if ($_smarty_tpl->getVariable('APP_DESCRIPTION')->value){?><h2><?php echo $_smarty_tpl->getVariable('APP_DESCRIPTION')->value;?>
</h2><?php }?>
        </div>
        <ul id="menu">
        	<li>
            	<a href="index.php" title="Manage time entries and projects">
                	Time entries
                </a>
            </li>
        	<li>
            	<a href="users.php" title="Manage users">
                	Users
                </a>
            </li>
        </ul>
		<div id="content">

