<?php
function notification($title,$text,$type,$button){
    session(['notify' => true]);
    session(['notify_title' => $title]);
    session(['notify_text' => $text]);
    session(['notify_type' => $type]);
    session(['notify_button' => $button]);
}
function forgetNotification(){
    session()->forget('notify');
    return NULL;
}