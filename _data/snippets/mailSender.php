id: 65
source: 1
name: mailSender
properties: 'a:0:{}'

-----

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

function validMail($mail) {
	if(preg_match('/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i', $mail)) { return true; }
}
/* Проверка на значение аргумента name у поля.
Если name совпадает с одним из списка - в итоговом письме значение будет изменено на соответствующее.
*/
function renameField($fieldName) { 
	$fieldNames = [
		"name" => "Имя",
		"form" => "Форма",
		"city" => "Город",
		"email" => "E-mail",
		"phone" => "Телефон",
		"message" => "Сообщение"
	];
	$curValue = "Неизвестное поле"; // А если каким-то чудом у нас поле не было найдено - заменим его на НЕИЗВЕСТНОЕ ПОЛЕ
	foreach ($fieldNames as $key => $value) {
		$curValue = ($key == $fieldName) ? $value : $curValue;
	}
	return $curValue;
}
/* Такая же магия, что и в предыдущей функции, только определяется name со значением form (название формы).
Для определения необходимо в html код формы вставить:
<input type="hidden" name="form" value="form_3">
, где value - номер формы. В списке ниже присваиваем соответствующее номер нузвание и в итоговом письме заменяем номер формы на него.
*/
function definitionForm($formNumber) {
	$formNumbers = [
		"form_1" => "Обратный звонок",
		"form_2" => "Бесплатная консультация",
		"form_3" => "Мы всегда на связи"
  ];
	$curValue = "Неизвестная форма"; // Ну а если нет - значит нет
	foreach ($formNumbers as $key => $value) {
		$curValue = ($key == $formNumber) ? $value : $curValue;
	}
	return $curValue;
}
$form_subject = "Заявка с формы - \"" . definitionForm($_GET['form']) . "\"";
$form_mail = " ";
foreach ($_GET as $key => $value) {
	if ($value != ""  && $key != "form" && $key != "q" && $key != "admin") {
		if($key == "email") $form_mail = $value;
		$message .= '
		<tr style="background-color:#f8f8f8;"><td style="padding:10px;border:#e9e9e9 1px solid;">
		<b>' . renameField($key) . '</b></td><td style="padding:10px;border:#e9e9e9 1px solid;">' . $value . '</td></tr>
		';
	}
}
$admin = $modx->getOption('mailSenderEmail');
$message = "<table style='width: 100%;'>$message</table>";
$headers = "MIME-Version: 1.0" . PHP_EOL .
	"Content-Type: text/html; charset=utf-8" . PHP_EOL .
	'Reply-To: '.$admin.'' . PHP_EOL;

if($form_mail == " " || validMail($form_mail)) {
	if(mail($admin, adopt($form_subject), $message, $headers)) {
    /*
    При необходимости меняем почту админа и дублируем письмо n колличество раз
    */
		// $admin = 'newadmin@yandex.ru';
		// mail($admin, adopt($form_subject), $message, $headers);
	}
  
  /* И если у нас в форме был email обратной связи - высылаем на него письмо с подтверждением успешно оставленной на сайте заявки.
  */
		if ($form_mail != " ") {
			$form_subject = "Ваша заявка принята!";
      // Ещё можно красиво оформить письмо клиенту... это уже на своё усмотрение ;-)
			$message = '
				<span>Спасибо, что оставили заявку на нашем сайте. Специалист ответит Вам в ближайшее время.</span><br>
      ';
			mail($form_mail, adopt($form_subject), $message, $headers);
		}
}