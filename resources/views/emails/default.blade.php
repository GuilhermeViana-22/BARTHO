<!DOCTYPE html>
<html>
<head>
    <title>Equipe Barthô - Proteção Animal </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            align-items: center;
        }
        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            margin-bottom: 20px;
        }
        .header h1 {
            color: #333333;
        }
        .header h2 {
            color: #666666;
            font-weight: normal;
        }
        .image-container {
            margin: 20px 0;
            padding: 10px;
            background-color: #ebcd64;
            display: inline-block;
            border-radius: 8px;
        }
        .image-container img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 8px;
        }
        .content {
            color: #333333;
            text-align: left;
        }
        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #dddddd;
        }
        .button {
            display: inline-block;
            padding: 15px 25px;
            color: #ffffff;
            background-color: #6D5848;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        .button:hover {
            background-color: #5c4a3c;
        }
        .button-container {
            text-align: center;
        }
        .footer .icons img {
            width: 24px;
            height: 24px;
            margin: 0 5px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Barthô - Proteção Animal</h1>
    </div>
    <div class="image-container">
        <img style="margin-right: auto; margin-left: auto; display: block" src="{{ asset('img/ativo2.png') }}" alt="Logo">
    </div>
    <div class="content">
        @yield('conteudo')
     </div>
    <div class="footer">
        <p>Atenciosamente,</p>
        <p>Equipe Barthô - Proteção Animal</p>
        <div class="icons">
            <a href="https://www.facebook.com/barthoprotecaoanimal"><img src="https://img.icons8.com/ios-filled/50/000000/facebook-new.png" alt="Facebook"></a>
            <a href="https://www.instagram.com/barthoprotecaoanimal/?img_index=1"><img src="https://img.icons8.com/ios-filled/50/000000/instagram-new.png" alt="Instagram"></a>
            <a href="https://www.linkedin.com/company/barthoprotecaoanimal/"><img src="https://img.icons8.com/ios-filled/50/000000/linkedin.png" alt="Twitter"></a>
        </div>
    </div>
</div>
</body>
</html>
