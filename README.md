# Hemmy Send SMS (nextsms.co.tz) PHP

## This package enables sending SMS using nextsms.co.tz

### Supports Laravel 12

```bash
composer require hemmy/hemmy_send_sms
```

```bash
php artisan vendor:publish --tag=hemmy_next_sms
```

### Sending a Single SMS to Multiple Recipients
```php
use Hemmy\SendSms\Controllers\HemmySendSms;

HemmySendSms::send($to, $message);

```

#### Parameters
| Variable | Description                         | Example                           |
|----------|-------------------------------------|-----------------------------------|
| `$to`    | Contains all user phone numbers     | `[25568563965*, 255XXXXXXXXX]`   |
| `$message` | Contains the message to be sent     | `"Hello, how are you?"`           |

### Sending Multiple SMS to Multiple Recipients
```php
use Hemmy\SendSms\Controllers\HemmySendSms;

HemmySendSms::sendMultiple($to, $message);

```

#### Parameters
| Variable | Description                         | Example                                            |
|----------|-------------------------------------|----------------------------------------------------|
| `$to`    | Contains all user phone numbers     | `[25568563965*, 255XXXXXXXXX]`                    |
| `$message` | Contains the messages to be sent     | `["Hello, how are you?", "Habari yako mzima?"]`    |

