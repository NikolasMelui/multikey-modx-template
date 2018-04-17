id: 22
source: 1
name: mailSenderPlugin
properties: 'a:0:{}'

-----

switch($_GET['q']){     
  case 'mail':
    $modx->runSnippet('mailSender');
  break;
}
die();