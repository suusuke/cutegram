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
      .container {width: 1080px; margin:15px auto 15px; padding:10px;}
      .thumb {float:left; margin:5px; padding: 10px 20px 10px 20px; background:#fff; -moz-box-shadow: 0px 1px 6px #666;
              -webkit-box-shadow: 0px 1px 6px #666;
              box-shadow: 0px 1px 6px #666;
      }
      img.mini {margin:0 4px 8px 0; vertical-align:top; float:left;}
      h1 {font-size:28px;}
      h2 {padding:20px; margin: 10px 0 0 0; font-size:24px; background-color: #443F41; padding: 20px; color:#fff; font-weight:normal;}
      .clear{clear:both;}
      .time {color:#888}
      #loading{ position:fixed; top:0; left:0; z-index:5000; padding:2px; background-color:red; color:#fff; font-size:150%; display:none; }
      #list {float: left}
      #pagenation { float: right; text-align: right;}
    </style>
 
  </head>

  <body>
  <div class="container">
    <h2><?php echo $tag; ?>gram</h2>
    <?php echo $content; ?>
    <br class="clear" />
  </div>

  </body>
</html>
