<?php
namespace FortniteApi\Helper;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleHelper
{
    /**
     * @param $method
     * @param $url
     * @param $header
     * @param bool $formData
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */

    public static function httpRequest($method, $url, $header, $formData = false)
    {
        $client = new Client();
        $params = [
            'headers' => $header
        ];

        if($formData){
          $params['form_params'] = $formData;
        }
        try{
            $data = $client->request($method, $url, $params);
            return $data;

        }catch(GuzzleException $e){
            throw $e;
        }
    }
}