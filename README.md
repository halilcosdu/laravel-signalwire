# Laravel SignalWire - Send Fax From Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/halilcosdu/laravel-signalwire.svg?style=flat-square)](https://packagist.org/packages/halilcosdu/laravel-signalwire)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/halilcosdu/laravel-signalwire/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/halilcosdu/laravel-signalwire/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/halilcosdu/laravel-signalwire/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/halilcosdu/laravel-signalwire/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/halilcosdu/laravel-signalwire.svg?style=flat-square)](https://packagist.org/packages/halilcosdu/laravel-signalwire)

Send Fax From Laravel package provides a Laravel-friendly interface for interacting with the SignalWire API, a cloud communication platform that offers services like voice, messaging, and video.

The package offers a variety of methods to interact with different aspects of the SignalWire services:

- Fax Operations: You can send, receive, update, and delete faxes. This includes methods like `faxes`, `sendFax`, `getFax`, `updateFax`, and `deleteFax`.

- Phone Numbers: You can list, create, update, and delete incoming phone numbers. This includes methods like `listIncomingPhoneNumbers`, `createIncomingPhoneNumbers`, `getIncomingPhoneNumber`, `updateIncomingPhoneNumber`, `deleteIncomingPhoneNumber`, and `getAvailablePhoneNumbers`.

- Fax Media: You can manage media related to faxes. This includes methods like `faxMedias`, `getFaxMedia`, and `deleteFaxMedia`.

The package uses the Facade pattern, which means you can access all these methods statically via the `SignalWire` facade. This makes it easy to use the SignalWire services in your Laravel application.

## Installation

You can install the package via composer:

```bash
composer require halilcosdu/laravel-signalwire
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="signalwire-config"
```

This is the contents of the published config file:

```php
return [
    'project_id' => env('SIGNALWIRE_PROJECT_ID'),
    'token' => env('SIGNALWIRE_TOKEN'),
    'space_url' => env('SIGNALWIRE_SPACE_URL'),
    'incoming_phone_number_status_callback_url' => env('SIGNALWIRE_INCOMING_PHONE_NUMBER_STATUS_CALLBACK_URL'), //create or update IncomingPhoneNumbers
    'incoming_phone_number_voice_url' => env('SIGNALWIRE_INCOMING_PHONE_NUMBER_VOICE_URL'),// create or update IncomingPhoneNumbers
];
```

## Usage

```php
use HalilCosdu\SignalWire\Facades\SignalWire;

// Fax Operations
SignalWire::faxes(?string $dateCreateAfter = null, ?string $dateCreatedOnOrBefore = null, ?string $from = null, ?string $to = null)

SignalWire::sendFax(string $mediaUrl, string $to, string $from, ?string $statusCallback = null, string $quality = 'standard')

SignalWire::getFax(string $sid)

SignalWire::updateFax(string $sid, string $status)

SignalWire::deleteFax(string $sid)

// Phone Number Operations
SignalWire::listIncomingPhoneNumbers(?string $beta = null, ?string $friendlyName = null, ?string $origin = null, ?string $phoneNumber = null)

SignalWire::createIncomingPhoneNumber(string $areaCode, string $phoneNumber, ?string $addressSid = null, ?string $friendlyName = null, ?string $identitySid = null, ?string $smsApplicationSid = null, ?string $smsFallbackMethod = null, ?string $smsFallbackUrl = null, ?string $smsMethod = null, ?string $smsUrl = null, ?string $statusCallback = null, ?string $statusCallbackMethod = null, ?string $trunkSid = null, ?string $voiceApplicationSid = null, bool $voiceCallerIdLookup = false, ?string $voiceFallbackMethod = null, ?string $voiceFallbackUrl = null, ?string $voiceMethod = null, string $voiceReceiveMode = 'fax', ?string $voiceUrl = null)

SignalWire::getIncomingPhoneNumber(string $phoneNumberSid)

SignalWire::updateIncomingPhoneNumber(string $phoneNumberSid, string $friendlyName, string $smsUrl, string $smsMethod, string $voiceUrl, string $voiceMethod)

SignalWire::deleteIncomingPhoneNumber(string $phoneNumberSid)

// Available Numbers to Buy
SignalWire::getAvailablePhoneNumbers(string $isoCountry, ?string $areaCode, bool $beta = false, ?string $contains = null, bool $excludeAllAddressRequired = false, bool $excludeLocalAddressRequired = false, bool $faxEnabled = false, string $inRegion = null, bool $mmsEnabled = false, bool $voiceEnabled = false)

// Fax Media
SignalWire::faxMedias(string $faxSid)

SignalWire::getFaxMedia(string $faxSid, string $mediaSid)

SignalWire::deleteFaxMedia(string $faxSid, string $mediaSid)


```

## Example

```php
use HalilCosdu\SignalWire\Facades\SignalWire;

// Send Fax
SignalWire::sendFax('https://www.example.com/fax.pdf', '+1234567890', '+0987654321', 'https://www.example.com/fax-status-callback', 'standard');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Halil Cosdu](https://github.com/halilcosdu)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
