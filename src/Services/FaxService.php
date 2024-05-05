<?php

namespace HalilCosdu\SignalWire\Services;

use Illuminate\Support\Facades\Http;

class FaxService
{
    /*
     * https://developer.signalwire.com/compatibility-api/rest/list-all-faxes/
     */
    public function faxes(?string $dateCreateAfter = null, ?string $dateCreatedOnOrBefore = null, ?string $from = null, ?string $to = null)
    {
        $data = array_filter([
            'DateCreateAfter' => $dateCreateAfter,
            'DateCreatedOnOrBefore' => $dateCreatedOnOrBefore,
            'From' => $from,
            'To' => $to,
        ]);

        return Http::signalWire()->get('/Faxes', $data);
    }

    /*
     * https://developer.signalwire.com/compatibility-api/rest/send-a-fax
     */
    public function sendFax(string $mediaUrl, string $to, string $from, ?string $statusCallback = null, string $quality = 'standard')
    {
        $data = array_filter([
            'MediaUrl' => $mediaUrl,
            'To' => $to,
            'From' => $from,
            'Quality' => $quality,
            'StatusCallback' => $statusCallback,
        ]);

        return Http::signalWire()->post('/Faxes', $data);
    }

    /*
     * https://developer.signalwire.com/compatibility-api/rest/get-a-fax
     */
    public function getFax(string $sid)
    {
        return Http::signalWire()->get("/Faxes/$sid");
    }

    /*
     * https://developer.signalwire.com/compatibility-api/rest/update-a-fax
     */
    public function updateFax(string $sid, string $status)
    {
        return Http::signalWire()->post("/Faxes/$sid", [
            'Status' => $status,
        ]);
    }

    /*
     * https://developer.signalwire.com/compatibility-api/rest/delete-a-fax
     */
    public function deleteFax(string $sid)
    {
        return Http::signalWire()->delete("/Faxes/$sid");
    }

    /*
     * https://developer.signalwire.com/compatibility-api/rest/list-all-fax-media
     */
    public function faxMedias(string $faxSid)
    {
        return Http::signalWire()->get("/Faxes/$faxSid/Media");
    }

    /*
     * https://developer.signalwire.com/compatibility-api/rest/retrieve-a-fax-media-instance
     */
    public function getFaxMedia(string $faxSid, string $mediaSid)
    {
        return Http::signalWire()->get("/Faxes/$faxSid/Media/$mediaSid");
    }

    /*
     * https://developer.signalwire.com/compatibility-api/rest/delete-fax-media
     */
    public function deleteFaxMedia(string $faxSid, string $mediaSid)
    {
        return Http::signalWire()->delete("/Faxes/$faxSid/Media/$mediaSid");
    }
}
