<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title><?php echo $title; ?></title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <link charset="utf-8" media="screen" type="text/css" href="/cutegram/css/style.css" rel="stylesheet"></link>
  </head>

  <body>
  <div class="container">
    <h2><?php echo $tag; ?>gram</h2>
    <div id="account">
      <?php if (empty($_SESSION['username'])) :?>
      <a title="instagramにログイン" class="signin" href="<?php echo "https://api.instagram.com/oauth/authorize/?client_id=".CLIENT_ID."&redirect_uri=".urlencode(REDIRECT_URI)."&response_type=code&scope=comments+relationships+likes"; ?>">Sign In</a>
      <?php else :?>
      HELLO <?php echo $_SESSION['username'];?> <a href="/cutegram/signout/">Sign out</a>
      <?php endif;?>
    </div>
    <div class="social">
        <a href="http://b.hatena.ne.jp/entry/http://suusuke.info/cutegram/" class="hatena-bookmark-button" data-hatena-bookmark-title="CUTEGRAM" data-hatena-bookmark-layout="standard" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
        <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-lang="ja">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsuusuke.info%2Fcutegram%2F&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>
    </div>
    <?php echo $content; ?>
    <br class="clear" />
  </div>

  </body>
</html>
