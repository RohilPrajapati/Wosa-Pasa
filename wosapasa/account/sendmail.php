<?php
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:royalprajapati@gmail.com";
        echo "sending mail";
        if(mail("rohilprajapati@gmail.com","mail from less secured app","test the mail",$headers)) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
?>