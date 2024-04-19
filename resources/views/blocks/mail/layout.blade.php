<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>

<table bgcolor="#efefef" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
    <tbody><tr>
        <td align="center" bgcolor="#efefef" style="background-color:#efefef" valign="top">
            <table border="0" cellpadding="0" cellspacing="0"  width="600">
                <tbody>
                    <tr>
                        <td style="padding:5px 0;line-height:1em">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="left" bgcolor="#"  style="background-color:#004099;background:linear-gradient(60deg,#4b5669 0%,#5e72e4 100%);border-top-left-radius:5px;border-top-right-radius:3px;text-align:left">
                            <center>
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody><tr>
                                        <td style="font-family:'Open sans',sans-serif;font-size:13px;line-height:1.5em;padding:20px 30px">
                                            <h3 style="color: white; font-size: 24px;" style="border:0" target="_blank" >
                                                <img src="https://devops-center.ch/img/logo/white_logo_transparent_background.png" style="height: 50px; width: auto;" alt="">
                                            </h3>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </center>
                        </td>
                    </tr>

                    <tr>
                        <td align="left" bgcolor="#ffffff" style="background-color:#ffffff;padding:30px;border-bottom:1px solid #dfdfe0;border-bottom-left-radius:3px;border-bottom-right-radius:3px;font-size:13px;font-family:'Helvetica Neue',Arial,sans-serif;line-height:1.5em;text-align:left">

                            <h3 style="font-size:20px;line-height:1.5em;font-family:'Open sans',sans-serif;font-weight:700;color:#393941;text-align:left;margin:0;padding:0">
                                <i class="fas fa-envelope-open-text"></i>
                                {{ $title }}
                            </h3>

                            @if($profile != [] || $name != '')
                            <p style="font-size:14px; opacity: 0.6; font-family:'Open sans',sans-serif;line-height:1.5em;color:#000000;margin:1em 0">
                                -----------
                            </p>
                            @endif

                            @if($profile != [])
                                <h4 style="font-size:14px;line-height:1.5em;font-family:'Open sans',sans-serif;font-weight:normal;color:#393941;text-align:left;margin:0;padding:0 0 0.9em 0">
                                    <i class="fas fa-id-card"></i> Profile Information: <br>
                                    <strong>#{{ $profile->item_profile_number }}</strong><br>
                                    <strong>{{ $profile->item_name }} {{ $profile->item_last_name }}</strong><br>
                                    <strong>{{ $profile->item_experience }} {{ $profile->item_profile_title }}</strong><br>
                                </h4>
                            

                                <h4 style="font-size:14px;line-height:1.5em;font-family:'Open sans',sans-serif;font-weight:normal;color:#393941;text-align:left;margin:0;padding:0 0 0.9em 0">
                                    Admin: <br>
                                    <a href="https://devops-center.ch/profile/edit/{{ $profile->id }}" style="color: #5e72e4; font-weight: 700; text-decoration: none; margin-right: 20px;">
                                    View Profile information as Admin
                                    </a>
                                </h4>

                                <h4 style="font-size:14px;line-height:1.5em;font-family:'Open sans',sans-serif;font-weight:normal;color:#393941;text-align:left;margin:0;padding:0 0 0.9em 0">
                                    Anonnymous Profile: <br>
                                    <a href="https://devops-center.ch/profile/item/{{ $profile->item_slug }}" style="color: #5e72e4; font-weight: 700; text-decoration: none; margin-right: 20px;">
                                    Click here 
                                    </a>
                                </h4>
                            @endif

                            @if($name == '' && $email == '')

                            @else
                            <p style="font-size:14px; opacity: 0.8;line-height:1.5em;font-family:'Open sans',sans-serif;font-weight:normal;color:#393941;text-align:left;margin:0;padding:0 0 0.9em 0">
                                E-mail recieved from: <br>
                                <strong>{{ $name }}</strong> <br>
                                <strong>{{ $email }}</strong>
                            </p>

                            <p style="font-size:14px; opacity: 0.6; font-family:'Open sans',sans-serif;line-height:1.5em;color:#000000;margin:1em 0">
                                ----------------------------------------
                            </p>
                            @endif                            

                            <p style="font-size:14px; white-space: pre-wrap; opacity: 0.6; font-family:'Open sans',sans-serif;line-height:1.5em;color:#000000;margin:1em 0">{!!$emailMessage!!}</p>

                        </td>
                    </tr>

                    <tr>
                        <td  style="padding:2px 0;line-height:1em">&nbsp;</td>
                    </tr>


                    <tr>
                        <td style="padding:2px 0;line-height:1em">&nbsp;</td>
                    </tr>
                    <tr>
                        <td  align="left" bgcolor="#f7f7f7" style="font-size:13px;font-family:'Open sans',sans-serif;border-radius:5px;background: linear-gradient(60deg,#4b5669 0%,#5e72e4 100%);text-align:left">

                            <table border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td align="left" style="padding-right:30px;padding-top:30px;padding-bottom:30px">
                                        <h3  style="font-size:18px;font-family:'Open sans',sans-serif;color:white;text-align:left;margin:0;margin-left:30px;padding:0 0 0.9em 0">
                                            DevOps-Center CH</h3>
                                        <h3  style="font-size:14px;font-family:'Open sans',sans-serif;color:white;text-align:left;margin:0;margin-left:30px;padding:0 0 0.9em 0">
                                            <i class="fas fa-map-marker"></i> Gewerbestrasse 9, 6330 Cham, Zug/Switzerland </h3>
                                        <h3  style="font-size:14px;font-family:'Open sans',sans-serif;color:white;text-align:left;margin:0;margin-left:30px;padding:0 0 0.9em 0">
                                            <i class="fas fa-mobile"></i> +41 43 589 67 69</h3>
                                        <h3  style="font-size:14px;font-family:'Open sans',sans-serif;color:white;text-align:left;margin:0;margin-left:30px;padding:0 0 0.9em 0">
                                            <i class="fas fa-envelope"></i>
                                            <a href="mailto:info@devops-center.ch" style="color: white; text-decoration: none;" target="_blank">info@devops-center.ch</a>
                                        </h3>
                                        <h3  style="font-size:14px;font-family:'Open sans',sans-serif;color:white;text-align:left;margin:0;margin-left:30px;padding:0 0 0.9em 0">
                                            ------------------------ </h3>
                                        <h3  style="font-size:14px;font-family:'Open sans',sans-serif;color:white;text-align:left;margin:0;margin-left:30px;padding:0 0 0.9em 0">
                                            <a href="https://www.linkedin.com" style="color: white; text-decoration: none; margin-right: 20px;">
                                                <i class="fab fa-linkedin"></i> LinkedIn 
                                            </a>
                                            <a href="https://www.xing.com" style="color: white; text-decoration: none;">
                                                <i class="fab fa-xing"></i> Xing 
                                            </a>
                                        </h3>
                                        <table cellspacing="0" cellpadding="0" style="margin-left:30px">
                                            <tbody>
                                            <tr>
                                                <td align="left" valign="top" style="font-size:13px;line-height:1.5em;font-family:'Open sans',sans-serif;color:white;padding-bottom:3px;text-align:left">
                                                 
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>



                    <tr>
                        <td align="center" style="padding:20px 30px 30px 30px;line-height:0.5em;text-align:center">


                            <div style="font-family:'Open sans',sans-serif;font-size:12px;color:#5f6062;line-height:1.5em">You got a message ? 
                                <u></u>
                                <a href="mailto:info@devops-center.ch" style="color:#0088cc;text-decoration:none" target="_blank">
                                    info@devops-center.ch
                                </a>

                                <u></u>
                            </div>
                            <br>

                            <div style="font-family:'Open sans',sans-serif;font-size:12px;color:#5f6062;line-height:1.5em">
                                <u></u>
                                © 2022 devops-center.ch.
                                <u></u>
                            </div>
                            <br>
                            <br>
                            <br>


                        </td>
                    </tr>


                </tbody>
            </table>


            <br>
            <br>
        </td>
    </tr>
    </tbody>
</table>


</body>
</html>
