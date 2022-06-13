<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <!--[if !mso]><!-- -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--<![endif]-->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <style type="text/css">
        #outlook a {
          padding: 0;
        }
    
        body {
          margin: 0;
          padding: 0;
          -webkit-text-size-adjust: 100%;
          -ms-text-size-adjust: 100%;
        }
    
        table,
        td {
          border-collapse: collapse;
        }
    
        img {
          border: 0;
          height: auto;
          line-height: 100%;
          outline: none;
          text-decoration: none;
          -ms-interpolation-mode: bicubic;
        }
    
        p {
          display: block;
          margin: 13px 0;
        }
      </style>
    <!--[if mso]>
        <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
  <!--[if lte mso 11]>
        <style type="text/css">
          .mj-outlook-group-fix { width:100% !important; }
        </style>
        <![endif]-->
    <style type="text/css">
        body{
            background-color: lightgray;
            font-family: Helvetica, sans-serif;
            font-size: 15px;
        }
        .container{
            margin : 0 auto;
            max-width: 600;;
            display: flex;
            flex-direction: column;
        }
        .banner,
        .logo,
        .content{
            margin : 0 auto;
            padding: 0;
        }
        .banner,
        .logo{
            width: 400px;
        }
        .content{
            width: 600px;
        }
        a{
          text-decoration: none;color: #218cae;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="banner">
            <img src="{{$banner}}" width="100%" height="auto" alt="gif">
        </div>
        <div class="logo">
            <img src="https://www.creactivecom.fr/wp-content/uploads/2019/04/Logo-Creactive-Quadri.png" width="100%" height="auto" alt="logo">
        </div>
        <div class="content">

            {!! $content !!}

        </div>
    </div>
</body>
</html>