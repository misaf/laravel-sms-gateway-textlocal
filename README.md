# Laravel SMS Gateway Textlocal Driver

Textlocal SMS gateway driver for [`misaf/laravel-sms-gateway`](https://github.com/misaf/laravel-sms-gateway).

## Installation

```bash
composer require misaf/laravel-sms-gateway-textlocal
```

Laravel package discovery registers the driver service provider automatically.

## Configuration

```env
SMS_GATEWAY_DRIVER=textlocal
SMS_GATEWAY_TEXTLOCAL_APIKEY=your-api-key
```

```php
// config/services.php
'textlocal' => [
    'api_key' => env('SMS_GATEWAY_TEXTLOCAL_APIKEY'),
    'base_url' => env('SMS_GATEWAY_TEXTLOCAL_BASE_URL', 'https://api.txtlocal.com/'),
],
```

## Driver Behavior

| Option | Value |
| --- | --- |
| Driver name | `textlocal` |
| Default base URL | `https://api.txtlocal.com/` |
| `send()` endpoint | `POST send/` |
| Authentication | `apikey` query parameter from `services.textlocal.api_key` |
| Payload | Form data sent directly to Textlocal |

## Usage

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

$response = SmsGateway::driver('textlocal')->send([
    'numbers' => '447123456789',
    'sender'  => 'Laravel',
    'message' => 'Hello from Textlocal',
]);
```

The payload is passed directly to Textlocal, so use the fields expected by the Textlocal API.

Use `request()` when you need direct access to Laravel's HTTP client:

```php
$request = SmsGateway::driver('textlocal')->request();
```

## Testing

```bash
composer test
composer analyse
```

## License

MIT
