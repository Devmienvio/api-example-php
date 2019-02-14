<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Log;

class MainController extends Controller
{
    const CREATE_SHIPMENT_ENDPOINT = 'http://sandbox.mienvio.mx/api/shipments';
    const UPDATE_SHIPMENT_ENDPOINT = 'http://sandbox.mienvio.mx/api/shipments/{id}';
    const CREATE_ADDRESS_ENDPOINT = 'http://sandbox.mienvio.mx/api/addresses';
    const CREATE_PURCHASE_ENDPOINT = 'http://sandbox.mienvio.mx/api/purchases';
    const GET_RATES_ENDPOINT = 'http://sandbox.mienvio.mx/api/shipments/{id}/rates';

    protected $apiToken;

    /**
     * Set $apiToken value
     */
    public function __construct()
    {
        $this->apiToken = env('API_TOKEN');
    }

    private function createAddressFrom($request)
    {
        $addressFrom = [
            'object_type' => 'PURCHASE',
            'name'        => $request->name_from,
            'street'      => $request->street_from,
            'street2'     => $request->street2_from,
            'reference'   => $request->reference_from,
            'zipcode'     => $request->zipcode_from,
            'email'       => $request->email_from,
            'phone'       => $request->phone_from
        ];

        return $this->makeRequest(
            'addressFrom',
            'POST',
            self::CREATE_ADDRESS_ENDPOINT,
            $addressFrom
        );
    }

    private function createAddressTo($request)
    {
        $addressTo = [
            'object_type' => 'PURCHASE',
            'name'        => $request->name_to,
            'street'      => $request->street_to,
            'street2'     => $request->street2_to,
            'reference'   => $request->reference_to,
            'zipcode'     => $request->zipcode_to,
            'email'       => $request->email_to,
            'phone'       => $request->phone_to
        ];

        return $this->makeRequest(
            'addressTo',
            'POST',
            self::CREATE_ADDRESS_ENDPOINT,
            $addressTo
        );
    }

    public function createShipment(Request $request)
    {
        $addressFromResponse = $this->createAddressFrom($request);
        $addressToResponse = $this->createAddressTo($request);

        $shipment = [
            'object_purpose' => 'QUOTE',
            'address_from'   => $addressFromResponse['address']['object_id'],
            'address_to'     => $addressToResponse['address']['object_id'],
            'width'  => $request->width,
            'length' => $request->length,
            'height' => $request->height,
            'weight' => $request->weight,
            'description' => $request->description
        ];

        $shipmentResponse = $this->makeRequest(
            'shipment',
            'POST',
            self::CREATE_SHIPMENT_ENDPOINT,
            $shipment
        );

        $shipmentId = $shipmentResponse['shipment']['object_id'];

        $ratesResponse = $this->makeRequest(
            'rates',
            'GET',
            str_replace('{id}', $shipmentId, self::GET_RATES_ENDPOINT),
            null
        );

        return view('rates', [
            'from'  => $addressFromResponse['address'],
            'to'    => $addressToResponse['address'],
            'rates' => $ratesResponse['results'],
            'shipment_id' => $shipmentId
        ]);
    }

    public function purchaseShipment(Request $request)
    {
        $shipmentResponse = $this->makeRequest(
            'shipments',
            'PUT',
            str_replace('{id}', $request->shipment_id, self::UPDATE_SHIPMENT_ENDPOINT),
            [
                'object_purpose' => 'PURCHASE',
                'rate' => $request->rate_id
            ]
        );

        $purchaseResponse = $this->makeRequest(
            'purchase',
            'POST',
            self::CREATE_PURCHASE_ENDPOINT,
            [
                'shipments' => [$request->shipment_id]
            ]
        );

        return view('purchase', [
            'purchase' => $purchaseResponse['purchase'],
            'shipment' => $purchaseResponse['purchase']['shipments'][0]
        ]);
    }

    /**
     * Makes request to given service via Curl
     *
     * @param  string $type
     * @param  string $object
     * @param  array  $endpoint
     * @param  array  $data
     * @return json
     */
    private function makeRequest($object, $type, $endpoint, $data = null)
    {
        \Log::error('$data', ['$data' =>$data]);
        $info = [];
        $errorData = [];

        $request = curl_init($endpoint);

        if ($type === 'POST') {
            curl_setopt($request, CURLOPT_POST, true);
            curl_setopt($request, CURLOPT_POSTFIELDS, http_build_query($data));
        } elseif ($type === 'PUT') {
            curl_setopt($request, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($request, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        curl_setopt($request, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $this->apiToken]);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_HEADER, 0);
        curl_setopt($request, CURLINFO_HEADER_OUT, true);

        $curlResponse = curl_exec($request);
        $info = curl_getinfo($request);
        curl_close($request);
        $jsonresponse = json_decode($curlResponse, true);

        if ($info['http_code'] === 200 || $info['http_code'] === 201) {
            return $jsonresponse;
        }

        $errorData = $jsonresponse;
        throw new \Exception($object . serialize($curlResponse), 1);
    }
}
