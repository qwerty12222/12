<?php
$admin = "ADMIN_ID";
$token = 'API_TOKEN';
function bot($method,$datas=[]){
global $token;
    $url = "https://api.telegram.org/bot".$token."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

//DASTURCHI: @Otabek_Avazov_1
//Manba: @WebCoder_Team

function del($nomi){
   array_map('unlink', glob("$nomi"));
   }


$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$type = $message->chat->type;
$text = $message->text;
$cid = $message->chat->id;
$uid= $message->from->id;
$name = $message->from->first_name;
$username = $message->from->username;
$data = $update->callback_query->data;
$qid = $update->callback_query->id;
$callcid = $update->callback_query->message->chat->id;
$calltext = $update->callback_query->message->text;$edit = $message->edit_date->text;
$clid = $update->callback_query->from->id;
$callmid = $update->callback_query->message->message_id;
$gid = $update->callback_query->message->chat->id;
$photo = $update->message->photo;
$data = $update->callback_query->data;
$cmid = $update->callback_query->message->message_id;
$ccid = $update->callback_query->message->chat->id;
$cuid = $update->callback_query->message->from->id;
$qid = $update->callback_query->id; 
$ctext = $update->callback_query->message->text; 
$callfrid = $update->callback_query->from->id; 
$callfname = $update->callback_query->from->first_name;  
$calltitle = $update->callback_query->message->chat->title; 
$calluser = $update->callback_query->message->chat->username; 
$query = $update->inline_query->query; 
$infid = $update->inline_query->from->id;
$inid = $update->inline_query->id;
$incid = $update->inline_query->chat->id;
$inmid = $update->inline_query->message->id;
$botim = "@$mybot";
$qid = $update->callback_query->id; 
$mybot = bot('getme',['bot'])->result->username;
mkdir("step");
mkdir("step/$cid");
mkdir("tests");
mkdir("tests/azolar");
mkdir("ismlar");
mkdir("ismlar/aktivlik");
mkdir("testlar");
mkdir("testlar/$cid");
mkdir("idlar");
mkdir("orinlar");
mkdir("orinlar/orin_1");
mkdir("orinlar/orin_2");
mkdir("orinlar/orin_3");
mkdir("orinlar/orin");
mkdir("orinlar/orin_id1");
mkdir("orinlar/orin_id2");
mkdir("orinlar/orin_id3");
mkdir("orinlar/orin_id");
mkdir("idlar/ismlar");
mkdir("natija");
mkdir("stat");
$step=file_get_contents("step/$cid.txt");
$step2=file_get_contents("step/$callcid.txt");
$kodi=file_get_contents("step/code.txt");
$id=file_get_contents("step/codes.txt");
$ism=file_get_contents("ismlar/$cid.txt");
$ism1=file_get_contents("ismlar/$callcid.txt");
$vaqt = date('H:i:s', strtotime('5 hour'));
$sana = date('d.m.Y', strtotime('5 hour'));
$fannomi=file_get_contents("step/$kodi.txt");
$tests=file_get_contents("tests/$kodi.txt");
$testadmin=file_get_contents("testlar/$kodi.txt");

if($text and $type=="private"){
$userlar = file_get_contents("stat/users.txt");
if(mb_stripos($userlar,"$cid")!==false){
}else{
file_put_contents("stat/users.txt","n".$cid,FILE_APPEND);
}
}

//DASTURCHI: @Otabek_Avazov_1
//Manba: @WebCoder_Team

if($text=="/start@$botim" or $text=="/start" or mb_stripos($text,"qwertyuiop")!==false){
if($ism==false){
file_put_contents("step/$cid.txt","ism");
        bot('SendMessage',[
   'chat_id'=>$cid,
        'text'=>"<b>🔰 Siz botimizga birinchi bor tashrif buyurdingiz! ✅
📝 Ismingizni kiriting!
📚 Namuna: Komilov Muhammadakbarxon</b>", 
        'parse_mode'=>'html', 
        'reply_markup'=>json_encode([
'remove_keyboard'=>true,
]),
]);
}else{
bot('SendMessage',[
   'chat_id'=>$cid,
   'text'=>"👋 <b>Salom</b> <a href='tg://user?id=$cid'>$ism</a>, <b>botimizga xush kelibsiz!
🔰 Quyidagi menyular orqali botdan foydalaning 👇</b>",
'parse_mode' => 'html',
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
'inline_keyboard'=>[        
[['text'=>"📝 Test yaratish", 'callback_data'=>"new"],['text'=>"Javoblar tekshirish ✅", 'callback_data'=>"tek"]],
]
])
]);
}}

//DASTURCHI: @Komilov_Dev
//Manba: @Otabek_Avazov_1

 if($step=="ism"){
$w = str_replace(["ʻ","ʼ"],["",""], $text);
if(str_word_count($w)=="2" and strlen($text)<"50"){
file_put_contents("ismlar/$cid.txt",$text);
file_put_contents("step/$cid.txt","");
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$mid-1,
]);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"🔥 <b>Ism saqlandi.</b>", 
'parse_mode'=>'html', 
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
]),
]);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"👋 <b>Salom</b> <a href='tg://user?id=$cid'>$ism</a>, <b>botimizga xush kelibsiz!
🔰 Quyidagi menyular orqali botdan foydalaning 👇</b>",
'parse_mode' => 'html',
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
'inline_keyboard'=>[ 
[['text'=>"📝 Test yaratish", 'callback_data'=>"new"],['text'=>"Javoblar tekshirish ✅", 'callback_data'=>"tek"]],
]
        ])
  ]);
}else{
        bot('sendMessage',[
   'chat_id'=>$cid,
        'text'=>"<b>❌ Xatolik</b>

<b>📚 Namuna: Komilov Muhammadakbarxon</b>", 
        'parse_mode'=>'html', 
]);
}}

//DASTURCHI: @Komilov_Dev
//Manba: @WebCoder_Team

if($data=="new"){
	file_put_contents("step/$callcid.txt","new");
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b>Yaratish uchun quyidagi amallarni bajaring</b>
        
<b>📒 Misol: fan_nomi*javob_lar</b>

<b>📚 Namuna: Biologiya*abacdcbac</b>

<b>🔰 Shu koʻrinishda yozing.</b>",
        'parse_mode'=>'html',
        'reply_markup'=>json_encode([
 'inline_keyboard'=>[
                [['text'=>"Bosh menyu", 'callback_data'=>"bosh"]]
           ]
        ])
    ]);
}

//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

if($data=="tek"){
	file_put_contents("step/$callcid.txt","tek");
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b>🔰 Javoblarni tekshirish uchun quyidagi amallarni bajaring ✅</b>

<b>📒 Misol: test_kodi*javob_lar</b>

<b>📚 Namuna: 123*abacdcbac</b>

<b>🔰 Shu ko'rinishda yuboring.</b>",
        'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Bosh menyu", 'callback_data'=>"bosh"]]
           ]
        ])
    ]);
}


//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

if($data=="bosh"){
	file_put_contents("step/$callcid.txt"," ");
    bot('editMessageReplyMarkup',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'inline_query_id'=>$qid, 
       ]);
    bot('sendMessage',[
        'chat_id'=>$callcid,
        'text'=>"👋 <b>Salom</b> <a href='tg://user?id=$cid'>$ism</a>, <b>botimizga xush kelibsiz!</b>
🔰 Quyidagi menyular orqali botdan foydalaning 👇",
        'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
 [['text'=>"📝 Test yaratish", 'callback_data'=>"new"],['text'=>"Javoblar tekshirish ✅", 'callback_data'=>"tek"]],
           ]
        ])
    ]);
}

//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

if($step=="new" and isset($text)){
	$ex = explode("*",$text);
	$fan = strtoupper("$ex[0]"); 
	$var = strtolower("$ex[1]"); 
file_put_contents('step/code.txt',file_get_contents('step/code.txt') + 1);
	file_put_contents("tests/$kodi.txt",$var);
	file_put_contents("step/$kodi.txt",$fan);
	$soni=strlen("$var"); 
file_put_contents('step/codes.txt',"$idn$kodi");
file_put_contents("testlar/$kodi.txt",$cid."_$ism");
bot('deleteMessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid-1,
       ]);
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>🔥 Test bazaga qushildi</b>
	
<b>📚 Fan nomi: $fan</b>

<b>🔢 Testlar soni: $soni ta</b>
	
<b>🔰 Test kodi:</b> <code>$kodi</code>
	
<b>♻️ Test ishlanishga tayyor!</b>",
	'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Bosh menyu", 'callback_data'=>"bosh"]],
           ]
        ])
	]);
file_put_contents("step/$cid.txt"," ");
	}
	
	//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

if($step=="tek"){
$ex=explode("*",$text);
$idlar=file_get_contents("idlar/$ex[0].txt");
if(mb_stripos($idlar,"$cid") !== false){
bot('deleteMessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid-1,
       ]);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>🔰 Bu testga siz javob berib boʻlgansiz!</b>",
'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Bosh menyu", 'callback_data'=>"bosh"]],
           ]
        ])
]);
}}

//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

	if($step=="tek" and isset($text)){
		$ex = explode("*",$text);
$idlar=file_get_contents("idlar/$ex[0].txt");
if(mb_stripos($idlar,$cid) !== false){
}else{
   if(mb_stripos($id,"$ex[0]")!==false){
$ev = explode("$ex[0]",$id);
	$var = strtolower("$ex[1]"); 
	$varsoni = strlen("$var"); 
	$teslar=file_get_contents("tests/$ex[0].txt");
file_put_contents("step/$cid.txt","");
$to=0;
  $a = 1;
$b=1;
$vars = strlen("$teslar"); 
for($i = 0; $i <= $vars - 1; $i++){ 
if(substr(strtolower($ex[1]),$i,1)==substr($teslar,$i,1)){ 
file_put_contents("testlar/$cid/$ex[0].txt",$b++.".   Toʻgʻri   ".substr($ex[1],$i,1)."   ✅n");
file_put_contents("natija/$ex[0].txt",$a++.".   Toʻgʻri   ".substr($ex[1],$i,1)."|[".substr($teslar,$i,1)."] ✅n");
$to = $to + 1;
$ste.=file_get_contents("natija/$ex[0].txt");
$tex.=file_get_contents("testlar/$cid/$ex[0].txt");
}else{
file_put_contents("testlar/$cid/$ex[0].txt",$b++.".   Xato      ".substr($ex[1],$i,1)."   ❌n");
file_put_contents("natija/$ex[0].txt",$a++.".   Xato      ".substr($ex[1],$i,1)."|[".substr($teslar,$i,1)."] ❌n");
$ste.=file_get_contents("natija/$ex[0].txt");
$tex.=file_get_contents("testlar/$cid/$ex[0].txt");
} }
file_put_contents("step/$cid/$ex[0].txt",$ste);
$testadminid=file_get_contents("testlar/$ex[0].txt");
$x=$to/$vars;
$m=$x*100;
$e=substr($m,0,4);
if($e>"79" and $e<"101"){
$orins = file_get_contents("orinlar/orin_1/$ex[0].txt");
file_put_contents("orinlar/orin_1/$ex[0].txt","$orinsn<a href='tg://user?id=$cid'>$ism</a> $to ta 🥇");

$id = file_get_contents("orinlar/orin_id1/$ex[0].txt");
file_put_contents("orinlar/orin_id1/$ex[0].txt","$idn$cid*$ism*$to ta $e%");
}elseif($e>"59" and $e<"80"){
	$orins = file_get_contents("orinlar/orin_2/$ex[0].txt");
file_put_contents("orinlar/orin_2/$ex[0].txt","$orinsn<a href='tg://user?id=$cid'>$ism</a> $to ta 🥈");

//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1
$id = file_get_contents("orinlar/orin_id2/$ex[0].txt");
file_put_contents("orinlar/orin_id2/$ex[0].txt","$idn$cid*$ism*$to ta $e%");
}elseif($e>"39" and $e<"60"){
	$orins = file_get_contents("orinlar/orin_3/$ex[0].txt");
file_put_contents("orinlar/orin_3/$ex[0].txt","$orinsn<a href='tg://user?id=$cid'>$ism</a> $to ta 🥉");


$id = file_get_contents("orinlar/orin_id3/$ex[0].txt");
file_put_contents("orinlar/orin_id3/$ex[0].txt","$idn$cid*$ism*$to ta $e%");
}elseif($e>"-1" and $e<40){
	$orins = file_get_contents("orinlar/orin/$ex[0].txt");
file_put_contents("orinlar/orin/$ex[0].txt","$orinsn<a href='tg://user?id=$cid'>$ism</a> $to ta 🎗️");
$id = file_get_contents("orinlar/orin_id/$ex[0].txt");
file_put_contents("orinlar/orin_id/$ex[0].txt","$idn$cid*$ism*$to ta $e%");
}

	$ad = explode("_",$testadminid);
$fannomi=file_get_contents("step/$ex[0].txt");
$natijalar=file_get_contents("testlar/$cid/$ex[0].txt");
$idlar=file_get_contents("idlar/$ex[0].txt");
file_put_contents("idlar/$ex[0].txt","$idlar
$cid*$ism*$to ta $e%");
$azo=file_get_contents("tests/azolar/$ex[0].txt");
$x=$to/$vars;
$m=$x*100;
$e=substr($m,0,4);
file_put_contents("tests/azolar/$ex[0].txt","$azon<a href='tg://user?id=$cid'>$ism</a>  $to ta $e%");
bot('deleteMessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid-1,
       ]);
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Test tekshirildi ✅</b>

<b>📚 Fan nomi: $fannomi
⚙️ Test yaratuvchisi:</b> <a href='tg://user?id=$ad[0]'>$ad[1]</a>
<b>🔢 Savollar soni: $vars ta</b>	
<b>🔰 Test kodi:</b> <code>$ex[0]</code>
	
<b>😎 Sizning natijalaringiz
$tex

✅ To'g'ri javob soni: $to ta</b>",
	'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Bosh menyu", 'callback_data'=>"bosh"]],
           ]
        ])
	]);
	bot('sendMessage',[
	'chat_id'=>$ad[0],
	'text'=>"<b>Test tekshirildi ✅</b>

<b>📚 Fan nomi: $fannomi
⚙️ Test yaratuvchisi:</b> <a href='tg://user?id=$ad[0]'>$ad[1]</a>
<b>🔢 Savollar soni: $vars ta</b>	
<b>🔰 Test kodi:</b> <code>$ex[0]</code>
        
<b>😎 Sizning natijalaringiz
$ste
    
✅ To'g'ri javob soni: $to ta 
Testga javob berildi</b>",
	'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"❎ Testni yakunlash", 'callback_data'=>"yak_$ex[0]"]],
[['text'=>"📋 Test maʼlumoti", 'callback_data'=>"info_$ex[0]"]]
]
])
]);
file_put_contents("step/$cid.txt"," ");
}else{
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$mid-1,
]);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>❎ Bunday kodli test mavjud emas!</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Bosh menyu", 'callback_data'=>"bosh"]],
]
])
]);
}}
}


//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

if (mb_stripos($data,"yak") !== false){
$ex = explode("_",$data);
$fan=file_get_contents("step/$ex[1].txt");
$yakun=str_replace("$ex[1]", "yakun", $id);
file_put_contents("step/codes.txt",$yakun);
	$teslar=file_get_contents("tests/$ex[1].txt");
$vars = strlen($teslar); 
$testadminid=file_get_contents("testlar/$ex[1].txt");
$azo=file_get_contents("tests/azolar/$ex[1].txt");
$orin1 = file_get_contents("orinlar/orin_1/$ex[1].txt");
$orin2 = file_get_contents("orinlar/orin_2/$ex[1].txt");
$orin3 = file_get_contents("orinlar/orin_3/$ex[1].txt");
$orin = file_get_contents("orinlar/orin/$ex[1].txt");
$soni=substr_count($azo,"n");
	$ad = explode("_",$testadminid);
    bot('deleteMessage',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
    ]);
$idlar=file_get_contents("orinlar/orin_id1/$ex[1].txt");
$dlar=explode("n",$idlar);
if (mb_stripos($data,"yak") !== false){
foreach($dlar as $ismi){
$id=explode("*",$ismi);
$tex=file_get_contents("step/$id[0]/$ex[1].txt");
$ok1=bot('sendmessage',[
'chat_id'=>$id[0],
'text'=>"<b>🔥 Hurmatli $id[1] $ex[1] kodli test yakunlandi

📗 Fan nomi: $fan fani
👮‍♂️ Test yaratuvchisi:</b> <a href='tg://user?id=$ad[0]'>$ad[1]</a>
<b>🔑 Test kodi: $ex[1]
🔢 Savollar soni: $vars ta

🔰 Bu testga siz $id[2] toʻgʻri javob berdingiz
1- oʻrinni egalladingiz

Sizning natijalaringiz:
$tex</b>",
        'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                 [['text'=>"Bosh menyu", 'callback_data'=>"bosh"]],
           ]
        ])
]);}}
$idlar=file_get_contents("orinlar/orin_id2/$ex[1].txt");
$dlar=explode("n",$idlar);
if (mb_stripos($data,"yak") !== false){
foreach($dlar as $ismi){
$id=explode("*",$ismi);
$tex=file_get_contents("step/$id[0]/$ex[1].txt");
 $ok2=bot('sendmessage',[
    'chat_id'=>$id[0],
'text'=>"<b><b>🔥 Hurmatli $id[1] $ex[1] kodli test yakunlandi

📗 Fan nomi: $fan fani
👮‍♂️ Test yaratuvchisi:</b> <a href='tg://user?id=$ad[0]'>$ad[1]</a>
<b>🔑 Test kodi: $ex[1]
🔢 Savollar soni: $vars ta

🔰 Bu testga siz $id[2] toʻgʻri javob berdingiz
1- oʻrinni egalladingiz

Sizning natijalaringiz:
$tex</b>",
        'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                 [['text'=>"Bosh menyu", 'callback_data'=>"bosh"]],
           ]
        ])
]);}}
$idlar=file_get_contents("orinlar/orin_id3/$ex[1].txt");
$dlar=explode("n",$idlar);
if (mb_stripos($data,"yak") !== false){
foreach($dlar as $ismi){
$id=explode("*",$ismi);
$tex=file_get_contents("step/$id[0]/$ex[1].txt");
 $ok3=bot('sendmessage',[
    'chat_id'=>$id[0],
'text'=>"<b>🔥 Hurmatli $id[1] $ex[1] kodli test yakunlandi

📗 Fan nomi: $fan fani
👮‍♂️ Test yaratuvchisi:</b> <a href='tg://user?id=$ad[0]'>$ad[1]</a>
<b>🔑 Test kodi: $ex[1]
🔢 Savollar soni: $vars ta

🔰 Bu testga siz $id[2] toʻgʻri javob berdingiz
1- oʻrinni egalladingiz

Sizning natijalaringiz:
$tex</b>",
        'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                 [['text'=>"Bosh menyu", 'callback_data'=>"bosh"]],
           ]
        ])
]);
}}
//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1
$idlar=file_get_contents("orinlar/orin_id/$ex[1].txt");
$dlar=explode("n",$idlar);
if (mb_stripos($data,"yak") !== false){
foreach($dlar as $ismi){
$id=explode("*",$ismi);
$tex=file_get_contents("step/$id[0]/$ex[1].txt");
$ok4=bot('sendmessage',[
'chat_id'=>$id[0],
'text'=>"<b>🔥 Hurmatli $id[1] $ex[1] kodli test yakunlandi

📗 Fan nomi: $fan fani
👮‍♂️ Test yaratuvchisi:</b> <a href='tg://user?id=$ad[0]'>$ad[1]</a>
<b>🔑 Test kodi: $ex[1]
🔢 Savollar soni: $vars ta

🔰 Bu testga siz $id[2] toʻgʻri javob berdingiz

Sizning natijalaringiz:
$tex</b>",
        'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                 [['text'=>"Bosh menyu", 'callback_data'=>"bosh"]],
           ]
        ])
]);
del("idlar/$ex[1].txt");
del("tests/$ex[1].txt");
del("testlar/$ex[1].txt");
del("step/$ex[1].txt");
del("tests/azolar/$ex[1].txt");
del("testlar/$id[0]/$ex[1].txt");
del("step/$id[0]/$ex[1].txt");
del("natija/$ex[1].txt");
del("orinlar/orin_1/$ex[1].txt");
del("orinlar/orin_2/$ex[1].txt");
del("orinlar/orin_3/$ex[1].txt");
del("orinlar/orin/$ex[1].txt");
del("orinlar/orin_id1/$ex[1].txt");
del("orinlar/orin_id2/$ex[1].txt");
del("orinlar/orin_id3/$ex[1].txt");
del("orinlar/orin_id/$ex[1].txt");
}}
$ok5 = $ok1->ok;
$ok6 = $ok2->ok;
$ok7 = $ok3->ok;
$ok8 = $ok4->ok;
if($ok5 or $ok6 or $ok7 or $ok8){
bot('sendMessage',[
'chat_id'=>$callcid,
'text'=>"<b>Test yakunlandi

Fan nomi: $fan fani
Test kodi: $ex[1]
Savollar soni: $vars ta
Ishtirokchilar soni: $soni ta

Testda qatnashganlar: 
$orin1 
$orin2 
$orin3 
$orin
//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

Hammaga omad!</b>",
        'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Bosh menyu", 'callback_data'=>"bosh"]],
           ]
        ])
]);}}

//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

if (mb_stripos($data,"info") !== false){
$ex = explode("_",$data);
$azo=file_get_contents("tests/azolar/$ex[1].txt");
$orin1 = file_get_contents("orinlar/orin_1/$ex[1].txt");
$orin2 = file_get_contents("orinlar/orin_2/$ex[1].txt");
$orin3 = file_get_contents("orinlar/orin_3/$ex[1].txt");
$orin = file_get_contents("orinlar/orin/$ex[1].txt");
  $soni = substr_count($azo,"n");
$fan=file_get_contents("step/$ex[1].txt");
	$teslar=file_get_contents("tests/$ex[1].txt");
$vars = strlen("$teslar"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b>$ex[1] kodli test haqida maʼlumotlar</b>

<i>Fan nomi: $fan 
Test kodi: $ex[1]
Savollar soni: $vars ta
Testda qatnashganlar soni: $soni</i>

<b>Test ishtirokchilari:</b>
$orin1 
$orin2 
$orin3 
$orin",
        'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Bosh menyu", 'callback_data'=>"bosh"]],
[['text'=>"Testni yakunlash", 'callback_data'=>"yak_$ex[1]"]],
[['text'=>"Test maʼlumoti", 'callback_data'=>"info_$ex[1]"]]
           ]
        ])
    ]);
}

if($text=="📊 Statistika" and $cid==$admin or $cid == $adminlar){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Bot azolari ".substr_count($userlar,"\n")." ta ",
'reply_markup'=>$panel,
]);
}

//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

if($text == '/panel' and $cid == $admin){
$lich = substr_count($userlar,"n");
unlink("step.txt");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>Admin panelga xush kelibsiz</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📊 Statistika"]],
[['text'=>"Panelni yopish"]],
]
])
]);
}

//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

if($text == '⚒ Kanallarni sozlash' and $cid == $admin or $cid == $adminlar){
$lich = substr_count($userlar,"n");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>Kanallarni sozlash menyudasiz!</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📢 Kanal qoʻshish"],['text'=>"📢 Kanalni oʻchirish"]],
[['text'=>"Panelni yopish"]],
]
])
]);
}

//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

$boshiga = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"/panel"]],
]
]);

//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

$st=file_get_contents("step/$cid.step");
if($text == "📢 Kanal qoʻshish" and $cid == $admin or $cid==$adminlar){
file_put_contents("step/$cid.step","kanal");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>📡 Kanal qo‘shish uchun kanal havolasini yuboring!
🔰 Masalan: @UzBotsBuilders</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshiga,
]);
}
//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1
if($st == "kanal"){
if(mb_stripos($kanal,"$text")){
}else{
file_put_contents("kanal.txt","$kanaln$text");
file_put_contents("channel.txt","true");
unlink("step/$cid.step");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>📡 Kanalingiz botga muvaffaqiyatli qo‘shildi!
🤖 Endi botni kanalingizga admin qiling!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
}
}
//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1
$s=file_get_contents("step/$cid.step");
if($text == "⚙️ Admin qo'shish" and $cid == $admin or $cid == $adminlar){
file_put_contents("step/$cid.step","addadmin");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>Admin qo‘shish uchun foydalanuvchini id raqamini yuboring!
🔰 Masalan: 12345678</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
}
//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1
if($s == "addadmin"){
if(mb_stripos($adminlar,"$text")!==false){
}else{
file_put_contents("adminlar.txt","$adminlarn$text");
unlink("step/$cid.step");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>Admin qilindi</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
}
}
//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

if($text=="Panelni yopish"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>📂 Panel yopildi!
Bosh menyu uchun: /start bosing.
Panelga qaytish uchun /panel bosing</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
]),
]);
}

//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1

if($text=="✉️ Xabar yuborish" and $cid==$admin or $cid == $adminlar){ 
file_put_contents("step/$cid.txt","sendpost");
  bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"<b>Yuboradigan matini kiriting!</b>",
"parse_mode"=>"html",
    'reply_markup'=>$bekor,
    ]);
}
if($step =="sendpost" and $cid==$admin or $cid == $adminlar){
  unlink("step/$cid.txt");
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Xabar yuborish boshlandi!</b>",
"parse_mode"=>"html",
  ]);
$x=0;
$y=0;
$idszs=explode("n",$userlar);
foreach($idszs as $idlat){
$ok=bot('SendMessage',[
 'chat_id'=>$idlat,
 'text'=>"<b>$tx</b>",
'parse_mode'=>'html',
    ])->ok;
if($ok==true){
$y=$y+1;
bot('editmessagetext',[
'chat_id'=>$cid,
'text'=>"<b>☑️ Yuborildi $y

❎ Yuborilmadi $x</b>",
'message_id'=>$mid+1,
'parse_mode'=>'html',
]);
}else{
//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1
$x=$x+1;
bot('editmessagetext',[
'chat_id'=>$cid,
'text'=>"<b>☑️ Yuborildi $y

❎ Yuborilmadi $x</b>",
'message_id'=>$mid+1,
'parse_mode'=>'html',
]);
}
}
//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1
bot('deletemessage',[
'chat_id'=>$cid,
'message_id'=>$mid+1,
]);
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>☑️ Yuborildi $y

❎ Yuborilmadi $x</b>",
'parse_mode'=>'html',
  ]);
}

//DASTURCHI: @Komilov_Dev
//Manba: @MASTER_PHP_1
?>