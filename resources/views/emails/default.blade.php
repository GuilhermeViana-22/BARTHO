<!DOCTYPE html>
<html>
<head>
    <title>Equipe Barthô - Proteção Animal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            width: 100% !important;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        table {
            border-spacing: 0;
            border-collapse: collapse;
            table-layout: fixed;
            Margin: 0 auto;
        }
        img {
            display: block;
            border: 0;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }
        .container {
            width: 100%;
            max-width: 600px;
            background-color: #ffffff;
            Margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header, .footer {
            text-align: center;
        }
        .header h1 {
            color: #333333;
            Margin: 0;
        }
        .header h2 {
            color: #666666;
            font-weight: normal;
            Margin: 0;
        }
        .content {
            color: #333333;
            text-align: left;
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
        .icons img {
            width: 24px;
            height: 24px;
            margin: 0 5px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
<center>
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f4f4f4;">
        <tr>
            <td>
                <table class="container" cellpadding="0" cellspacing="0" border="0" align="center">
                    <tr>
                        <td class="header">
                            <h1>Barthô - Proteção Animal</h1>
                            <h2>Protegendo animais desde 2021</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 20px 0;">
                            <img src="{{ asset('img/ativo2.png') }}" alt="Logo" style="max-width: 200px; border-radius: 8px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="content" style="padding: 20px; background-color: #ffffff;">
                            @yield('conteudo')
                        </td>
                    </tr>
                    <tr>
                        <td class="footer" style="padding: 20px 0;">
                            <p>Atenciosamente,</p>
                            <p>Equipe Barthô - Proteção Animal</p>
                            <div class="icons">
                                <a href="https://www.facebook.com/barthoprotecaoanimal"><img src="https://img.icons8.com/ios-filled/50/000000/facebook-new.png" alt="Facebook"></a>
                                <a href="https://www.instagram.com/barthoprotecaoanimal/?img_index=1"><img src="https://img.icons8.com/ios-filled/50/000000/instagram-new.png" alt="Instagram"></a>
                                <a href="https://www.linkedin.com/company/barthoprotecaoanimal/"><img src="https://img.icons8.com/ios-filled/50/000000/linkedin.png" alt="LinkedIn"></a>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</center>
</body>
</html>
