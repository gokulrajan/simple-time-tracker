<?php /* Smarty version 3.0rc1, created on 2011-01-05 15:54:11
         compiled from "./view\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:259474d249423561e17-49050733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55177558d68084be465531fb8fac3d4d153b8ae1' => 
    array (
      0 => './view\\login.tpl',
      1 => 1280403670,
    ),
  ),
  'nocache_hash' => '259474d249423561e17-49050733',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_translate')) include 'plugins/smarty\function.translate.php';
if (!is_callable('smarty_function_url_for')) include 'plugins/smarty\function.url_for.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $_smarty_tpl->getVariable('APP_NAME')->value;?>
 - <?php echo smarty_function_translate(array('var'=>"sign_in"),$_smarty_tpl->smarty,$_smarty_tpl);?>
</title>
    </head>
    <body>
    	<h1><?php echo smarty_function_translate(array('var'=>"sign_in"),$_smarty_tpl->smarty,$_smarty_tpl);?>
</h1>
        <div id="errors"><p>
	        <?php if ($_smarty_tpl->getVariable('flash_error')->value){?>
	        	<?php echo smarty_function_translate(array('var'=>$_smarty_tpl->getVariable('flash_error')->value[0]['value']),$_smarty_tpl->smarty,$_smarty_tpl);?>

	        <?php }?>
        </p></div>
        <form id="logInForm" action="<?php echo smarty_function_url_for(array('module'=>'login','action'=>'validateForm'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
        	<p>
            	<label for="signInMail"><?php echo smarty_function_translate(array('var'=>"mail"),$_smarty_tpl->smarty,$_smarty_tpl);?>
</label>
                <input type="text" id="signInMail" name="signInMail" />
            </p>
        	<p>
            	<label for="signInPassword"><?php echo smarty_function_translate(array('var'=>"password"),$_smarty_tpl->smarty,$_smarty_tpl);?>
</label>
                <input type="password" id="signInPassword" name="signInPassword" />
            </p>
            <p>
            	<input type="submit" id="signInSubmit" name="signInSubmit" value="<?php echo smarty_function_translate(array('var'=>'sign_in'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" />
            </p>
        </form>
    </body>
</html>