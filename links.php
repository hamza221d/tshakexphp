<?php
ob_start();
define('API_KEY', '797319011:AAH92S5x37pL-_cPHYD5IuDMgDkS0Y0tBu0');
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);

function bot($method, $datas = [])
  {
  $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
  $res = curl_exec($ch);
  if (curl_error($ch))
    {
    var_dump(curl_error($ch));
    }
    else
    {
    return json_decode($res);
    }
  }

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$from_id = $message->from->id;
$name = $update->message->from->first_name;
$from_id = $message->from->id;
$u = explode("\n",file_get_contents("memb.txt"));
$c = count($u)-1;
$modxe = file_get_contents("usr.txt");
$admin = 594690680;
$username = $update->message->from->username;
$reply = $message->reply_to_message->message_id;
$list = file_get_contents("blocklist.txt");
$rep = $message->reply_to_message->forward_from; 
$id = $rep->id; 
$ch = "@eshk_mawt_mp3";
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"يجـب عليك الاشتراك في قناة البـوت؛◾️
ليتم تشغيل البـوت القناة » $ch ؛💕
ثمه ارسل /start مجددا؛ 😋🌜",
]);
  bot("sendmessage",[
    "chat_id"=>$admin,
    "text"=>"- العضو قام بألاشتراك في قناة البوت ، 📌
- معلومات العضو الذي قام بألاشتراك ؛

• الاسم ؛ $name 
• الايدي ؛ $from_id
• المعرف ؛ @$username
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎	",
    ]);
    die('مشيولي');
}

$ebu = explode("\n",$list);
if(in_array($from_id,$ebu)){
    bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"▪️ انت محظور من قبل صاحب البوت ،
▫️ لا يمكنك استخدام البوت ، 🚫
 ﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[• اضغط هنا وتابع جديدنا 🌐؛](https://t.me/$ch)
 ",
 'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
      ]);
    
}


if($text && $from_id !== $admin){
bot('forwardMessage',[
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
'message_id'=>$update->message->message_id,
'text'=>$text,
]);
}

if ($text and $message->reply_to_message && $text!="/info" && $text!="/ban" && $text!="/unban" && $text!="/forward") {
  bot('sendMessage',[
'chat_id'=>$message->reply_to_message->forward_from->id,
    'text'=>$text,
    ]);
}

if ($text == '/start' && $chat_id != $list){
  bot('sendMessage', [
  'chat_id' => $chat_id, 
  'text' => "اهـلا بك في بوت استخراج رابط؛📎
القناة المحذوف منشئها وبسهوله؛📤

طريقة الاستخدام : ارفع لبوت ادمن,القناة ومن ثمة ارسل معرف قناتط،

ملاحظه : اذا نزلت البوت من الادمنيه راح,يوكف الرابط نهائيا ✔️",
'parse_mode' => "MarkDown", 'disable_web_page_preview' => true, 'reply_markup' => json_encode(['inline_keyboard' => [
[['text' => "طريقة الاستخدام؛⚙", 'callback_data' => "kk"]],
[['text' => "تابع جديدنا؛🎉", 'url' => "https://t.me/joinchat/AAAAAEtw8AWW7RUpuA3Z1A"]],
 ]]) ]);
  if ($update && !in_array($chat_id, $u)) {
    file_put_contents("memb.txt", $chat_id."\n",FILE_APPEND);
  }
  }
  

if ($text == "/start" and $chat_id == $admin ) {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
      'text'=>"اهـلا بـك مديري : » ◾️
أليك الاوامر الخاصه : »🔻",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'رسالةه للكل؛🍃🌜','callback_data'=>'ce']],[['text'=>'عـدد الاعضاء؛🍃🌛','callback_data'=>'co']],
[['text'=>'معلومات اضافيه','callback_data'=>'cr']],
            ]
            ])
        ]);
}

if ($message->reply_to_message && $text== "حظر") {
			$myfile2 = fopen("blocklist.txt", "a") or die("Unable to open file!");	
			fwrite($myfile2, "$id\n");
			fclose($myfile2);
			bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📌┇تم حظر العضو من البوت ،
📃┇ايدي العضو ؛ $id .",
]);
			bot('sendmessage',[
'chat_id'=>$id,
'text'=>"⚠️┇عذرا عزيزي تم حظرك من هذا البوت ،
📮┇تابع قناة البوت ؛ @$ch .",
]);
		}
		if($data == "kk" ){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"اولآ : قم برفع البوت ادمن في القناة»©
ثانيآ : قم بأرسال معرف قناتك الى البوت» 🤖
ملاحظه: يتم اعطائك الرابط الحقيقي للقناة وليس رابط مؤقت مما جعل البوت افظل بوت في التليجرام 😻",
        'show_alert'=>true,
]);
}
		if($message->reply_to_message && $text=="الغاء الحظر"){
			$newlist = str_replace($id,"",$list);
			file_put_contents("blocklist.txt",$newlist);
			bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📌┇تم الغاء حظر العضو ،
📃┇ايدي العضو ؛ $id .",
]);
			bot('sendmessage',[
'chat_id'=>$id,
'text'=>"⚠️┇ عزيزي تم الغاء حظرك من هذا البوت ،
📮┇تابع قناة البوت ؛ @$ch .",
]);
}


if($data == "co" and $update->callback_query->message->chat->id == $admin ){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
        عدد مشتركين البوت📢 :- [ $c ] .
        ",
        'show_alert'=>true,
]);
}
if($data == "cr" and $update->callback_query->message->chat->id == $admin ){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"حـظر » لحظر الشخص
الغاء الحظر » الغاء حذر الشخص
جمـيع الحقوق محفوظه ©
للاستفسار » @k5ot9",
        'show_alert'=>true,
]);
}
if($data == "ce" and $update->callback_query->message->chat->id == $admin){ 
    file_put_contents("usr.txt","yas");
    bot('EditMessageText',[
    'chat_id'=>$update->callback_query->message->chat->id,
    'message_id'=>$update->callback_query->message->message_id,
    'text'=>"▪️ ارسل رسالتك الان 📩 وسيتم نشرها لـ [ $c ] مشترك . 
   ",
    'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>' الغاء 🚫 •','callback_data'=>'off']]    
        ]
    ])
    ]);
}
if($data == "off" and $update->callback_query->message->chat->id == $admin){ 
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
      'text'=>"اهـلا بـك مديري : » ◾️
أليك الاوامر الخاصه : »🔻",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'رسالةه للكل؛🍃🌜','callback_data'=>'ce']],[['text'=>'عـدد الاعضاء؛🍃🌛','callback_data'=>'co']],
            ]
            ])
]);
file_put_contents('usr.txt', '');
}

if($text and $modxe == "yas" and $chat_id == $admin ){
    for ($i=0; $i < count($u); $i++) { 
        bot('sendMessage',[
          'chat_id'=>$u[$i],
          'text'=>"
          $text
▪️﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎▪️",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,

]);
    file_put_contents("usr.txt","no");

} 
}


if ($text != '/start' && $text != '/admin' && $text != '.' && $text != '/'  && $chat_id != $list) {
	if(preg_match('/([a-z])|([A-Z])/i',$text)){
    $export = json_decode(file_get_contents("https://api.telegram.org/bot797319011:AAH92S5x37pL-_cPHYD5IuDMgDkS0Y0tBu0/exportChatInviteLink?chat_id=$text"));
    $linkchannel = $export->result;
    bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"رابط القناة هوة » 🍕🍿
$linkchannel",
      'disable_web_page_preview'=>true,
      'reply_to_message_id'=>$message->message_id,
      ]);
  }else 
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>'عذرا يجب أرسال معرف قناتك »🔻
قبل ذلك ارفع البوت ادمن ومن ثمه »🚀
ارسل معرف القناة لكي يتم استخراج الرابط »🌐',
  ]);
  }