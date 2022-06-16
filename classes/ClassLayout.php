<?php
namespace Classes;

class ClassLayout{

    public static function setHeadRestrito($permition){
        $session=new CLassSessions();
        $session->verifyInsideSession($permition);
    }
    
    #Setar as tags do head
    public static function setHead($title , $description , $author='Fábio Silva Dias')
    {
        $html="<!doctype html>\n";
        $html.="<html lang='pt-br'>\n";
        $html.="<head>\n";
        $html.="  <meta charset='UTF-8'>\n";
        $html.="  <meta name='viewport' content='width=device-width, initial-scale=1'>\n";
        $html.="  <meta name='author' content='$author'>\n";
        $html.="  <meta name='format-detection' content='telephone=no'>\n";
        $html.="  <meta name='description' content='$description'>\n";
        $html.="  <title>$title</title>\n";
        $html.="  <link rel='shortcut icon' href='".DIRIMG."favicon.ico' type='image/x-icon'>\n";
        $html.="  <link rel='stylesheet' href='".DIRCSS."style.css'>\n";
        $html.="</head>\n\n";
        $html.="<body>\n";
        echo $html;
    }

    #Setar as tags do footer
    public static function setFooter()
    {
        $html="  <script src='".DIRJS."zepto.min.js'></script>\n";
        $html.="  <script src='".DIRJS."vanilla-masker.min.js'></script>\n";
        $html.="  <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>\n";
        $html.="  <script src='https://www.google.com/recaptcha/api.js?render=".SITEKEY."'></script>\n";
        $html.="  <script src='".DIRJS."javascript.js'></script>\n";
        $html.="</body>\n";
        $html.="</html>";
        echo $html;
    }
}