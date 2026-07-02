<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayTextlocal\Drivers;

use Illuminate\Http\Client\PendingRequest;
use Misaf\LaravelSmsGateway\SmsGatewayDriver;

final class TextlocalDriver extends SmsGatewayDriver
{
    protected function driverName(): string
    {
        return 'textlocal';
    }

    protected function defaultGateway(): string
    {
        return 'https://api.txtlocal.com/';
    }

    protected function configureRequest(PendingRequest $request): PendingRequest
    {
        return $request
            ->asForm()
            ->withQueryParameters([
                'apikey' => $this->serviceConfigString('api_key'),
            ]);
    }
}
