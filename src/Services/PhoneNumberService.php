<?php

namespace HalilCosdu\SignalWire\Services;

use Illuminate\Support\Facades\Http;

class PhoneNumberService
{
    /*
     * https://developer.signalwire.com/compatibility-api/rest/list-all-incoming-phone-numbers
     */
    public function listIncomingPhoneNumbers(?string $beta = null, ?string $friendlyName = null, ?string $origin = null, ?string $phoneNumber = null)
    {
        $data = array_filter([
            'Beta' => $beta,
            'FriendlyName' => $friendlyName,
            'Origin' => $origin,
            'PhoneNumber' => $phoneNumber,
        ]);

        return Http::signalWire()->get('/IncomingPhoneNumbers', $data);
    }

    /*
     * https://developer.signalwire.com/compatibility-api/rest/create-an-incoming-phone-number
     */
    public function createIncomingPhoneNumbers(
        string $areaCode,
        string $phoneNumber,
        ?string $addressSid = null,
        ?string $friendlyName = null,
        ?string $identitySid = null,
        ?string $smsApplicationSid = null,
        ?string $smsFallbackMethod = null,
        ?string $smsFallbackUrl = null,
        ?string $smsMethod = null,
        ?string $smsUrl = null,
        ?string $statusCallback = null,
        ?string $statusCallbackMethod = null,
        ?string $trunkSid = null,
        ?string $voiceApplicationSid = null,
        bool $voiceCallerIdLookup = false,
        ?string $voiceFallbackMethod = null,
        ?string $voiceFallbackUrl = null,
        ?string $voiceMethod = null,
        string $voiceReceiveMode = 'fax',
        ?string $voiceUrl = null
    ) {

        $data = array_filter([
            'AreaCode' => $areaCode,
            'PhoneNumber' => $phoneNumber,
            'AddressSid' => $addressSid,
            'FriendlyName' => $friendlyName,
            'IdentitySid' => $identitySid,
            'SmsApplicationSid' => $smsApplicationSid,
            'SmsFallbackMethod' => $smsFallbackMethod,
            'SmsFallbackUrl' => $smsFallbackUrl,
            'SmsMethod' => $smsMethod,
            'SmsUrl' => $smsUrl,
            'StatusCallback' => $statusCallback,
            'StatusCallbackMethod' => $statusCallbackMethod,
            'TrunkSid' => $trunkSid,
            'VoiceApplicationSid' => $voiceApplicationSid,
            'VoiceCallerIdLookup' => $voiceCallerIdLookup,
            'VoiceFallbackMethod' => $voiceFallbackMethod,
            'VoiceFallbackUrl' => $voiceFallbackUrl,
            'VoiceMethod' => $voiceMethod,
            'VoiceReceiveMode' => $voiceReceiveMode,
            'VoiceUrl' => $voiceUrl,
        ]);

        $data['VoiceUrl'] = $data['VoiceUrl'] ?? config('signalwire.incoming_phone_number_voice_url');
        $data['StatusCallback'] = $data['StatusCallback'] ?? config('signalwire.incoming_phone_number_status_callback_url');

        return Http::signalWire()->post('/IncomingPhoneNumbers', $data);
    }

    /*
     * https://developer.signalwire.com/compatibility-api/rest/retrieve-an-incoming-phone-number
     */
    public function getIncomingPhoneNumber(string $phoneNumberSid)
    {
        return Http::signalWire()->get("/IncomingPhoneNumbers/$phoneNumberSid");
    }

    /*
     * https://developer.signalwire.com/compatibility-api/rest/update-an-incoming-phone-number
     */
    public function updateIncomingPhoneNumber(
        string $phoneNumberSid,
        ?string $accountSid = null,
        ?string $addressSid = null,
        ?string $emergencyAddressSid = null,
        ?string $friendlyName = null,
        ?string $identitySid = null,
        ?string $smsApplicationSid = null,
        ?string $smsFallbackMethod = null,
        ?string $smsFallbackUrl = null,
        ?string $smsMethod = null,
        ?string $smsUrl = null,
        ?string $statusCallback = null,
        ?string $statusCallbackMethod = null,
        ?string $trunkSid = null,
        ?string $voiceApplicationSid = null,
        bool $voiceCallerIdLookup = false,
        ?string $voiceFallbackMethod = null,
        ?string $voiceFallbackUrl = null,
        ?string $voiceMethod = null,
        string $voiceReceiveMode = 'fax',
        ?string $voiceUrl = null
    ) {
        $data = array_filter([
            'AccountSid' => $accountSid,
            'AddressSid' => $addressSid,
            'EmergencyAddressSid' => $emergencyAddressSid,
            'FriendlyName' => $friendlyName,
            'IdentitySid' => $identitySid,
            'SmsApplicationSid' => $smsApplicationSid,
            'SmsFallbackMethod' => $smsFallbackMethod,
            'SmsFallbackUrl' => $smsFallbackUrl,
            'SmsMethod' => $smsMethod,
            'SmsUrl' => $smsUrl,
            'StatusCallback' => $statusCallback,
            'StatusCallbackMethod' => $statusCallbackMethod,
            'TrunkSid' => $trunkSid,
            'VoiceApplicationSid' => $voiceApplicationSid,
            'VoiceCallerIdLookup' => $voiceCallerIdLookup,
            'VoiceFallbackMethod' => $voiceFallbackMethod,
            'VoiceFallbackUrl' => $voiceFallbackUrl,
            'VoiceMethod' => $voiceMethod,
            'VoiceReceiveMode' => $voiceReceiveMode,
            'VoiceUrl' => $voiceUrl,
        ]);

        $data['VoiceUrl'] = $data['VoiceUrl'] ?? config('signalwire.incoming_phone_number_voice_url');
        $data['StatusCallback'] = $data['StatusCallback'] ?? config('signalwire.incoming_phone_number_status_callback_url');

        return Http::signalWire()->post("/IncomingPhoneNumbers/$phoneNumberSid", $data);

    }

    /*
     * https://developer.signalwire.com/compatibility-api/rest/delete-an-incoming-phone-number
     */
    public function deleteIncomingPhoneNumber(string $phoneNumberSid)
    {
        return Http::signalWire()->delete("/IncomingPhoneNumbers/$phoneNumberSid");
    }

    /*
     * https://developer.signalwire.com/compatibility-api/rest/search-for-available-phone-numbers-that-match-your-criteria
     */
    public function getAvailablePhoneNumbers(
        string $isoCountry,
        ?string $areaCode,
        bool $beta = false,
        ?string $contains = null,
        bool $excludeAllAddressRequired = false,
        bool $excludeLocalAddressRequired = false,
        bool $faxEnabled = false,
        ?string $inRegion = null,
        bool $mmsEnabled = false,
        bool $voiceEnabled = false

    ) {
        $data = array_filter([
            'AreaCode' => $areaCode,
            'Beta' => $beta,
            'Contains' => $contains,
            'ExcludeAllAddressRequired' => $excludeAllAddressRequired,
            'ExcludeLocalAddressRequired' => $excludeLocalAddressRequired,
            'FaxEnabled' => $faxEnabled,
            'InRegion' => $inRegion,
            'MmsEnabled' => $mmsEnabled,
            'VoiceEnabled' => $voiceEnabled,
        ]);

        return Http::signalWire()->get("/AvailablePhoneNumbers/$isoCountry/Local", $data);
    }
}
