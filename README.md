<h1>Hemmy Send Sms (nextsms.co.tz) PHP</h1>
</br>
<h3>This package enable to send sms using nextsms.co.tz</h3>

<p>Support Laravel 11</p>
<br>

<code> composer require hemmy/hemmy_send_sms </code>

</br>
<code> php artisan vendor:publish --provider="Hemmy\SendSms\SendSmsServiceProvider" </code>

<br>
<br>
<br>
For single sms to multiple recepient
<code> 
    use Hemmy\SendSms\Controllers\HemmySendSms;
    <br>
    <br>
    ...
    <br>
    HemmySendSms::send($to,$message)
    <br>
    ...
    <br>
</code>

<br>
<code>
    <table>
        <tr>
            <td>Variable</td>
            <td>Description</td>
            <td>Example</td>
        </tr>
        <br />
        <tr>
            <td>$to</td>
            <td>This carries all user phone numbers</td>
            <td>[25568563965*,255XXXXXXXXX]</td>
        </tr>
        <br />
        <tr>
            <td>$message</td>
            <td>This carries message</td>
            <td>Hollow how are you??</td>
        </tr>
    </table>
</code>

<br>
<br>
<br>
Now you can send multiple sms to multiple recepient
<code> 
    use Hemmy\SendSms\Controllers\HemmySendSms;
    <br>
    <br>
    ...
    <br>
    HemmySendSms::sendMultiple($to,$message)
    <br>
    ...
    <br>
</code>

<br>
<code>
    <table>
        <tr>
            <td>Variable</td>
            <td>Description</td>
            <td>Example</td>
        </tr>
        <br />
        <tr>
            <td>$to</td>
            <td>This carries all user phone numbers</td>
            <td>[25568563965*,255XXXXXXXXX]</td>
        </tr>
        <br />
        <tr>
            <td>$message</td>
            <td>This carries message</td>
            <td>["Hollow how are you??","Habari yako mzima??"]</td>
        </tr>
    </table>
</code>