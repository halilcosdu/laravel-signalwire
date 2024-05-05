<?php

namespace HalilCosdu\SignalWire;

use HalilCosdu\SignalWire\Services\FaxService;
use HalilCosdu\SignalWire\Services\PhoneNumberService;

class SignalWire
{
    public function __construct(protected FaxService $faxService, protected PhoneNumberService $phoneNumberService)
    {
        //
    }

    public function faxes(?string $dateCreateAfter = null, ?string $dateCreatedOnOrBefore = null, ?string $from = null, ?string $to = null)
    {
        return $this->faxService->faxes($dateCreateAfter, $dateCreatedOnOrBefore, $from, $to);
    }

    public function sendFax(string $mediaUrl, string $to, string $from, ?string $statusCallback = null, string $quality = 'standard')
    {
        return $this->faxService->sendFax($mediaUrl, $to, $from, $statusCallback, $quality);
    }

    public function getFax(string $sid)
    {
        return $this->faxService->getFax($sid);
    }

    public function updateFax(string $sid, string $status)
    {
        return $this->faxService->updateFax($sid, $status);
    }

    public function deleteFax(string $sid)
    {
        return $this->faxService->deleteFax($sid);
    }

    public function listIncomingPhoneNumbers(?string $beta = null, ?string $friendlyName = null, ?string $origin = null, ?string $phoneNumber = null)
    {
        return $this->phoneNumberService->listIncomingPhoneNumbers($beta, $friendlyName, $origin, $phoneNumber);
    }

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
        return $this->phoneNumberService->createIncomingPhoneNumbers(
            $areaCode,
            $phoneNumber,
            $addressSid,
            $friendlyName,
            $identitySid,
            $smsApplicationSid,
            $smsFallbackMethod,
            $smsFallbackUrl,
            $smsMethod,
            $smsUrl,
            $statusCallback,
            $statusCallbackMethod,
            $trunkSid,
            $voiceApplicationSid,
            $voiceCallerIdLookup,
            $voiceFallbackMethod,
            $voiceFallbackUrl,
            $voiceMethod,
            $voiceReceiveMode,
            $voiceUrl
        );
    }

    public function getIncomingPhoneNumber(string $phoneNumberSid)
    {
        return $this->phoneNumberService->getIncomingPhoneNumber($phoneNumberSid);
    }

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
        ?string $voiceUrl = null)
    {
        return $this->phoneNumberService->updateIncomingPhoneNumber(
            $phoneNumberSid,
            $accountSid,
            $addressSid,
            $emergencyAddressSid,
            $friendlyName,
            $identitySid,
            $smsApplicationSid,
            $smsFallbackMethod,
            $smsFallbackUrl,
            $smsMethod,
            $smsUrl,
            $statusCallback,
            $statusCallbackMethod,
            $trunkSid,
            $voiceApplicationSid,
            $voiceCallerIdLookup,
            $voiceFallbackMethod,
            $voiceFallbackUrl,
            $voiceMethod,
            $voiceReceiveMode,
            $voiceUrl
        );
    }

    public function deleteIncomingPhoneNumber(string $phoneNumberSid)
    {
        return $this->phoneNumberService->deleteIncomingPhoneNumber($phoneNumberSid);
    }

    public function getAvailablePhoneNumbers(string $isoCountry, ?string $areaCode, bool $beta = false, ?string $contains = null, bool $excludeAllAddressRequired = false, bool $excludeLocalAddressRequired = false, bool $faxEnabled = false, ?string $inRegion = null, bool $mmsEnabled = false, bool $voiceEnabled = false)
    {
        return $this->phoneNumberService->getAvailablePhoneNumbers(
            $isoCountry,
            $areaCode,
            $beta,
            $contains,
            $excludeAllAddressRequired,
            $excludeLocalAddressRequired,
            $faxEnabled,
            $inRegion,
            $mmsEnabled,
            $voiceEnabled
        );
    }

    public function faxMedias(string $faxSid)
    {
        return $this->faxService->faxMedias($faxSid);
    }

    public function getFaxMedia(string $faxSid, string $mediaSid)
    {
        return $this->faxService->getFaxMedia($faxSid, $mediaSid);
    }

    public function deleteFaxMedia(string $faxSid, string $mediaSid)
    {
        return $this->faxService->deleteFaxMedia($faxSid, $mediaSid);
    }
}
