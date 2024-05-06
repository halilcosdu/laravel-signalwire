<?php

namespace HalilCosdu\SignalWire\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed faxes(?string $dateCreateAfter = null, ?string $dateCreatedOnOrBefore = null, ?string $from = null, ?string $to = null)
 * @method static mixed sendFax(string $mediaUrl, string $to, string $from, ?string $statusCallback = null, string $quality = 'standard')
 * @method static mixed getFax(string $sid)
 * @method static mixed updateFax(string $sid, string $status)
 * @method static mixed deleteFax(string $sid)
 * @method static mixed listIncomingPhoneNumbers(?string $beta = null, ?string $friendlyName = null, ?string $origin = null, ?string $phoneNumber = null)
 * @method static mixed createIncomingPhoneNumber(string $areaCode, string $phoneNumber, ?string $addressSid = null, ?string $friendlyName = null, ?string $identitySid = null, ?string $smsApplicationSid = null, ?string $smsFallbackMethod = null, ?string $smsFallbackUrl = null, ?string $smsMethod = null, ?string $smsUrl = null, ?string $statusCallback = null, ?string $statusCallbackMethod = null, ?string $trunkSid = null, ?string $voiceApplicationSid = null, bool $voiceCallerIdLookup = false, ?string $voiceFallbackMethod = null, ?string $voiceFallbackUrl = null, ?string $voiceMethod = null, string $voiceReceiveMode = 'fax', ?string $voiceUrl = null)
 * @method static mixed getIncomingPhoneNumber(string $phoneNumberSid)
 * @method static mixed updateIncomingPhoneNumber(string $phoneNumberSid, string $friendlyName, string $smsUrl, string $smsMethod, string $voiceUrl, string $voiceMethod)
 * @method static mixed deleteIncomingPhoneNumber(string $phoneNumberSid)
 * @method static mixed getAvailablePhoneNumbers(string $isoCountry, ?string $areaCode, bool $beta = false, ?string $contains = null, bool $excludeAllAddressRequired = false, bool $excludeLocalAddressRequired = false, bool $faxEnabled = false, string $inRegion = null, bool $mmsEnabled = false, bool $voiceEnabled = false)
 * @method static mixed faxMedias(string $faxSid)
 * @method static mixed getFaxMedia(string $faxSid, string $mediaSid)
 * @method static mixed deleteFaxMedia(string $faxSid, string $mediaSid)
 *
 * @see \HalilCosdu\SignalWire\SignalWire
 */
class SignalWire extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \HalilCosdu\SignalWire\SignalWire::class;
    }
}
