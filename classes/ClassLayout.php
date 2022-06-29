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
        $html.="  <link rel='stylesheet' href='".DIRJS."FullCalendar/main.min.css'>\n";
        $html.="  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor' crossorigin='anonymous'>\n";
        $html.="  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>\n";
        $html.="  <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css' rel='stylesheet'>\n";
        $html.="</head>\n\n";
        $html.="<body>\n";
        echo $html;
    }

    public static function setMenu()
    {
        $html  = "<div class='container'>";
        $html .= "<nav class='navbar navbar-expand-lg navbar-light bg-light'>";
        $html .= "  <div class='container-fluid'>";
        $html .= "    <a class='navbar-brand' href='#'>Agendamento de Consultas</a>";
        $html .= "    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>";
        $html .= "      <span class='navbar-toggler-icon'></span>";
        $html .= "    </button>";
        $html .= "    <div class='collapse navbar-collapse' id='navbarSupportedContent'>";
        $html .= "     <ul class='navbar-nav me-auto mb-2 mb-lg-0'>";
        $html .= "        <li class='nav-item dropdown'>";
        $html .= "          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
        $html .= "            Menu";
        $html .= "          </a>";
        $html .= "          <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
        $html .= "            <li><a class='dropdown-item' href='".DIRPAGE."cadastro'>Cadastro</a></li>";
        $html .= "            <li><a class='dropdown-item' href='".DIRPAGE."cadastroComplementar'>Cadastro Complementar</a></li>";
        $html .= "            <li><hr class='dropdown-divider'></li>";
        $html .= "            <li><a class='dropdown-item' href='".DIRPAGE."controllers/controllerLogout'>Sair</a></li>";
        $html .= "          </ul>";
        $html .= "        </li>";
        $html .= "      </ul>";
        $html .= "    </div>";
        $html .= "  </div>";
        $html .= "</nav>";
        $html .= "</div>";
        echo $html;
    }

    #Setar as tags do footer
    public static function setFooter()
    {
        $html ="  <script src='".DIRJS."zepto.min.js'></script>\n";
        $html.="  <script src='".DIRJS."FullCalendar/main.min.js'></script>\n";
        $html.="  <script src='".DIRJS."vanilla-masker.min.js'></script>\n";
        $html.="  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js' integrity='sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2' crossorigin='anonymous'></script>\n";
        $html.="  <script src='".DIRJS."sweetalert2.all.min.js'></script>\n";
        $html.="  <script src='https://www.google.com/recaptcha/api.js?render=".SITEKEY."'></script>\n";
        $html.="  <script src='".DIRJS."javascript.js'></script>\n";
        $html.="<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>\n";
        $html.="<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>\n";
        $html.="<script src='http://localhost/agendamento/lib/js/custom.js'></script>\n";
        $html.="</body>\n";
        $html.="</html>";
        echo $html;
    }
}