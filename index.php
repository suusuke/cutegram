<?php
date_default_timezone_set('Asia/Tokyo');
require_once dirname(dirname(dirname(__FILE__))) . '/lib/limonade.php';

define(CLIENT_ID, "51a8415b3e3b4a998e4d195ff0d7035b");
define(TAG, "cute");

function configure() {
  option('env', ENV_DEVELOPMENT);
  option('base_uri', '/cutegram');
}

function before($route) {
  //header("X-LIM-route-function: " . $route['function']);
  set('title', 'CUTEGRAM');
  layout('layout.html.php');
}

dispatch('/', 'index');
function index() {
  set('tag', TAG);
  return html('index.html.php');
}

dispatch_post('/ajax/:max_tag_id', 'ajax');
function ajax() {
  
  $max_tag_id = params('max_tag_id');
  $contents = file_get_contents("https://api.instagram.com/v1/tags/" . TAG . "/media/recent?client_id=" . CLIENT_ID. "&max_id=".$max_tag_id);

  $json = json_decode($contents, true);

  $responce = "";
  if (!empty($json['pagination']['next_max_tag_id'])) {
    $responce .= "<input type=\"hidden\" id=\"max_tag_id\" value=".$json['pagination']['next_max_tag_id']." />";
  }
  foreach ($json['data'] as $value) {
      $responce .= responceimage($value);
  }
  
  header('Cache-Control: no-cache, must-revalidate');
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
  header('Content-type: text/plain; charset=utf-8'); 

  return $responce;
  

}

run();


function responceimage($value) {

  $thumb = $value["images"]["low_resolution"]["url"];
  $link = $value["link"];
  $time = date("d/m/y", $value["created_time"]);
  $nick = $value["user"]["username"];
  $avatar = $value["user"]["profile_picture"];

  return "<div class=\"thumb\"><img src=\"$avatar\" width=\"32\" class=\"mini\"/> $nick<br/> <span class=\"time\">$time</span><br/><a href=\"$link\"><img class=\"pic\" src=\"$thumb\"/></a></div>";

}
?>
