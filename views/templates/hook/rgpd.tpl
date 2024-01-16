

<!DOCTYPE html>
<html>
<head>
{*<link rel="stylesheet" href="../../css/sorep_rgpd.css" />*}
<title>Catalog Slider</title>
</head>
<body>
<form action="{$urls.pages.index}#footer" method="post">
               <div class="row">
                   <input class="btn btn-primary float-xs-right hidden-xs-down" name="submitNewsletter" type="submit" value="{l s='Subscribe' d='Shop.Theme.Actions'}">
                   <div class="input-wrapper">
                       <input name="email" type="text" value="{$value}" placeholder="{l s='Your email address' d='Shop.Forms.Labels'}" aria-labelledby="block-newsletter-label">
                   </div>
               </div>
               {hook h='displayGDPRConsent' mod='psgdpr' id_module=$id_module}
           </form>
</body>
</html>
















