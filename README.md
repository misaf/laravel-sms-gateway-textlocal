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
],
```

## Usage

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

$response = SmsGateway::driver('textlocal')->send([
    'numbers' => '09123456789',
    'message' => 'Hello',
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
