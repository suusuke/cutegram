<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title><?php echo $title; ?></title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <style type="text/css">
      * {margin:0px; padding: 0px;}
      body {color: #000; font-family: "lucida grande",tahoma,verdana,arial,sans-serif; font-size: 11px; margin:10px; background-color:#ffe;}
      img {border:0px; margin: 0;}
      .container {width: 970px; margin:15px auto 15px; padding:10px;}
      .social {float:right; padding: 5px 0px; }
      .thumb {float:left; margin:5px; padding: 10px 20px 10px 20px; background:#fff; -moz-box-shadow: 0px 1px 6px #666;
              -webkit-box-shadow: 0px 1px 6px #666;
              box-shadow: 0px 1px 6px #666;
      }
      img.mini {margin:0 4px 8px 0; vertical-align:top; float:left;}
      img.pic {height: 270px; width: 270px;}
      h1 {font-size:28px;}
      h2 {padding:20px; margin: 10px 0 0 0; font-size:24px; background-color: #443F41; padding: 20px; color:#fff; font-weight:normal;}
      .clear{clear:both;}
      .time {color:#888}
      #loading{ position:fixed; top:0; left:0; z-index:5000; padding:2px; background-color:red; color:#fff; font-size:150%; display:none; }
      #list {float: left}
      #pagenation { float:right; width: 100%; text-align:right;}
    </style>
 
  </head>

  <body>
  <div class="container">
    <h2><?php echo $tag; ?>gram</h2>
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
