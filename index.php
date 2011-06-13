<?php
date_default_timezone_set('Asia/Tokyo');
require_once dirname(dirname(dirname(__FILE__))) . '/lib/limonade.php';

define(CLIENT_ID, "398012b6465a4fd5b704621b9a99d3d2");
define(CLIENT_SECRET, "e67909e03fb54b05a5f75021cacbc549");
define(REDIRECT_URI, "http://suusuke.info/cutegram/callback/");
define(TOKEN_URI, "https://api.instagram.com/oauth/access_token");
define(TAGS_URI, "https://api.instagram.com/v1/tags/%s/media/recent?client_id=%s&max_id=%s");
define(USERS_SELF_URI, "https://api.instagram.com/v1/users/self/feed?access_token=%s");
define(LIKES_URI, "https://api.instagram.com/v1/media/%s/likes");
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
  //  $contents = file_get_contents("https://api.instagram.com/v1/tags/" . TAG . "/media/recent?client_id=" . CLIENT_ID . "&max_id=" . $max_tag_id);
  $contents = json_decode(file_get_contents(sprintf(TAGS_URI, TAG, CLIENT_ID, $max_tag_id)), true);

  if (!empty($_SESSION['access_token'])) {
    $user = json_decode(file_get_contents(sprintf(USERS_SELF_URI, $_SESSION['access_token'])), true);
  }

  $responce = "";
  if (!empty($contents['pagination']['next_max_tag_id'])) {
    $responce .= "<input type=\"hidden\" id=\"max_tag_id\" value=" . $contents['pagination']['next_max_tag_id'] . " />";
  }
  foreach ($contents['data'] as $value) {
    $responce .= responceimage($value);
  }
  //$responce .= more();
  
  header('Cache-Control: no-cache, must-revalidate');
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
  header('Content-type: text/plain; charset=utf-8');

  return $responce;

}

dispatch('/like/:media_id', 'like');
function like() {
  $like_link = sprintf(LIKES_URI, params('media_id'));
  $post = "access_token=" . $_SESSION[access_token];
  $json = curl_post_contents($like_link, $post);

  return redirect('/');
}

dispatch('/signout', 'signout');
function signout() {
  $_SESSION = array();
  session_destroy();
  return redirect('/');
}

dispatch('/callback', 'callback');
function callback() {

  $post = "client_id=" . CLIENT_ID . "&client_secret=" . CLIENT_SECRET . "&grant_type=authorization_code&redirect_uri=" . REDIRECT_URI . "&code=" . $_GET["code"];
  $json = curl_post_contents(TOKEN_URI, $post);

  $_SESSION['access_token'] = $json->access_token;
  $_SESSION['username'] = $json->user->username;
  $_SESSION['profile_picture'] = $json->user->profile_picture;
  $_SESSION['id'] = $json->user->id;
  $_SESSION['full_name'] = $json->user->full_name;

  return redirect('/');
}

run();

function responceimage($value) {

  $thumb = $value["images"]["low_resolution"]["url"];
  $link = $value["link"];
  $time = date("d/m/y", $value["created_time"]);
  $nick = $value["user"]["username"];
  $avatar = $value["user"]["profile_picture"];
  $media_id = $value['id'];

  $like = "";
  if (!empty($_SESSION['access_token'])) {
    $like = "<a href=\"/cutegram/like/$media_id\"><img src=\"/cutegram/img/like.gif\" width=\"\" /></a>";
  } else {
    $like = "<img src=\"/cutegram/img/like.gif\" width=\"\" />";
  }
  $like .= $value['likes']['count'];
  return "<div class=\"thumb\"><img src=\"$avatar\" width=\"32\" class=\"mini\"/> $nick <span class=\"like\">$like</span><br/> <span class=\"time\">$time</span><br/><a href=\"$link\"><img class=\"pic\" src=\"$thumb\"/></a></div>";

}

function more() {
  return "<div class=\"thumb\"><a href=\"#\" id=\"more_link\"><img class=\"pic\" src=\"/cutegram/img/next.jpg\"/></a></div>";

}


function curl_get_contents($url, $timeout = 60) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

function curl_post_contents($url, $post, $timeout = 60) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
  
  $json = json_decode(curl_exec($ch));
  curl_close($ch);

  return $json;
}
?>
