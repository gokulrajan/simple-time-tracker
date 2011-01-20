<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>{$APP_NAME} - {translate var="sign_in"}</title>
    </head>
    <body>
    	<h1>{translate var="sign_in"}</h1>
        <div id="errors"><p>
	        {if $flash_error}
	        	{translate var=$flash_error[0]['value']}
	        {/if}
        </p></div>
        <form id="logInForm" action="{url_for module='login' action='validateForm'}" method="post">
        	<p>
            	<label for="signInMail">{translate var="mail"}</label>
                <input type="text" id="signInMail" name="signInMail" />
            </p>
        	<p>
            	<label for="signInPassword">{translate var="password"}</label>
                <input type="password" id="signInPassword" name="signInPassword" />
            </p>
            <p>
            	<input type="submit" id="signInSubmit" name="signInSubmit" value="{translate var='sign_in'}" />
            </p>
        </form>
    </body>
</html>