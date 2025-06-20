<html>

<head>
    <title> Mgsaws Contact </title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            color: #373737;
        }
    </style>
</head>

<body>

    <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#f5f5f5">
        <tbody>
            <tr>
                <td align="center">
                    <table border="0" cellpadding="0" cellspacing="0" style="width:640px;max-width:640px;padding-right:20px;padding-left:20px; background-color: #fff !important; padding-top:20px;padding-bottom:20px;margin: 20px 0;">
                        <tbody>
                            <tr>
                                <td>

                                    <table class="table" style="width:600px!important; margin:0 auto; padding-bottom: 15px; background: #fbfbfb;">
                                        <tbody>
                                            <tr style="width:100% !important; border-spacing: 0;">
                                                <td>

                                                    <img class="logo" src="https://mgsaws.com/frontend/img/mg-logo.png" alt="Logo" style="max-width:130;">
                                                </td>
                                                <td style="text-align:right;padding: 10px 10px 10px 0;font-size:14px;">
                                                    <a style="margin:0 0 5px; ">
                                                        <img src="https://mgsaws.com/frontend/img/mail.png" alt="mail" style="padding: 0 2px 0 0; width: 25px; margin-bottom: -8px;" alt="mail"> sales@yesmachinery.ae</a>
                                                    <p style="margin:0 0 5px; ">
                                                        <img src="https://mgsaws.com/frontend/img/phoe.png" alt="phone" style="padding: 0 2px 0 0; width: 25px; margin-bottom: -8px;" alt="phone"> <b> +971 65 26 43 82 </b>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <!-- Content Start -->
                                    <div class="spacer">&nbsp;</div>

                                    <table class="main center" width="602" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td class="column">
                                                    <div class="column-top">&nbsp;</div>
                                                    <table class="content" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="padded">
                                                                    <h1>Hi MG Team</h1>


                                                                    <p>You recieved an enquiry from website:</p>
                                                                    <table style="width:100%">

                                                                        <tr>
                                                                            <td><strong>Name</strong></td>
                                                                            <td><?php echo e($data['name']); ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Phone<strong></td>
                                                                            <td><?php echo e($data['phone']); ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Email</strong></td>
                                                                            <td><?php echo e($data['email']); ?></td>
                                                                        </tr>
                                                                        <?php if(isset($data['company'] )): ?>
                                                                        <tr>
                                                                            <td><strong>Company</strong></td>
                                                                            <td> <?php echo e($data['company']); ?></td>
                                                                        </tr>
                                                                        <?php endif; ?>
                                                                        <?php if(isset($data['country'] )): ?>
                                                                        <tr>
                                                                            <td><strong>Country</strong></td>
                                                                            <td><?php echo e($data['country']); ?></td>
                                                                        </tr>
                                                                        <?php endif; ?>
                                                                        <?php if(isset($data['message'] )): ?>
                                                                        <tr>
                                                                            <td><strong>Message</strong></td>
                                                                            <td><?php echo e($data['message']); ?></td>
                                                                        </tr>
                                                                        <?php endif; ?>
                                                                    </table><br>

                                                                    <p>
                                                                        <a>Thanks & Regards</a>
                                                                    </p>
                                                                    <p class="caption"><?php echo e($data['name']); ?></p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="column-bottom">&nbsp;</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="spacer">&nbsp;</div>
                                    <!--// Content End -->

                                    <!-- footer start -->

                                    <!-- connect with us start -->
                                    <table style="width: 100%; border-spacing: 0;">
                                        <tr>
                                            <td style="width: 100%;   padding: 15px; text-align: center; background: #252525; color: #fff;">
                                                <p> Connect With US </p>
                                                <img src="https://mgsaws.com/frontend/img/facebook.png" style="width: 25px;" alt="">
                                                <img src="https://mgsaws.com/frontend/img/whatsapp.png" style="width: 25px;" alt="">
                                                <img src="https://mgsaws.com/frontend/img/linked.png" style="width: 25px;" alt="">
                                            </td>
                                        </tr>
                                    </table>
                                    <!--// connect with us end -->


                                    <!-- footer logo start -->
                                    <table style="width: 100%; border-spacing: 0;">
                                        <tr>
                                            <td style="width:100%; text-align: center;">
                                                <img src="https://mgsaws.com/frontend/img/mg-fooetr-logo.png" alt="logo" style="width: 50px; max-width: 50px; margin-top: 30px; margin-bottom: 20px;">
                                            </td>
                                        </tr>
                                    </table>
                                    <!--// footer logo end -->


                                    <!-- footer address start -->
                                    <table style="width: 100%; border-spacing: 0;">
                                        <tr>
                                            <td style="width:100%; text-align: center;">
                                                <p> York Engineering Solution FZC </p>
                                                <a> OFFICE NO. LV-27D </a>
                                                <a> -- </a>
                                                <a> PO BOX 42167 </a>
                                                <p>
                                                    <a> HAMRIYAH FREE ZONE PHASE 2 </a>
                                                    <a> -- </a>
                                                    <a> SHARJAH, UAE </a>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>


                                    <table style="width: 100%; border-spacing: 0; padding: 15px  0;">
                                        <tr>
                                            <td style="text-align: center; width: 100%;">
                                                <p>
                                                    <a> Tel: + 971 547 91 88 58 </a>
                                                    <a> -- </a>
                                                    <a> Tel: + 971 547 91 88 58 </a>
                                                </p>


                                            </td>
                                        </tr>

                                    </table>



                                    <table style="width: 100%; border-spacing: 0; padding: 6px 0; background: #c42414; letter-spacing: 2px; font-size: 13px;">
                                        <tr>
                                            <td style="width: 100%; text-align: center;">
                                                <a style="text-decoration: none; color: #fff; margin: 0;"> www.mgsaws.com </a>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--// footer address end -->

                                    <!--// footer End -->



                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html><?php /**PATH /homepages/27/d886905960/htdocs/resources/views/emails/contactMailNotification.blade.php ENDPATH**/ ?>