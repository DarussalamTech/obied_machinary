<?php

/**
 * @author Ali Abbas
 * @abstract use for 
 *  setting extra param
 *  
 */
$params = array(
    // this is used in contact page
    'adminEmail' => 'ali.abbas@darussalampk.com', //Should be same component->email->user, use for sending emails to customer (sign up conformation, sending activation link, sending new password)
    'replyTo' => 'admin@csv.com',
    'cc' => 'admin@csv.com',
    'bcc' => 'admin@csv.com',
    'supportEmail' => 'admin@csv.com', //receiveing customer emails
    'dateformat' => 'y/m/d1',

    'default_admin' => 'webmaster@csv.com',
    'dateformat' => 'm/d/y',
    'mailHost' => 'smtp.gmail.com',
    'smtp' => true,
    //'mailPort' => 587,
    'mailPort' => 465,
    'mailUsername' => 'testservice733@gmail.com',
    'mailPassword' => 'abc123AB1',
    'mailSecuity' => 'ssl',

);
?>
