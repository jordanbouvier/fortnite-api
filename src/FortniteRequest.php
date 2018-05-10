<?php
namespace FortniteApi;

use FortniteApi\Exceptions\InvalidPlateformException;
use FortniteApi\Exceptions\InvalidStatException;
use FortniteApi\Exceptions\InvalidWindowException;
use FortniteApi\Exceptions\PlayerNotFoundException;
use FortniteApi\Exceptions\StatNotFoundException;
use FortniteApi\Helper\GuzzleHelper;
use FortniteApi\Model\Stat;
use FortniteApi\Model\Status;
use FortniteApi\Model\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


class FortniteRequest
{

    /**
     * @param string $username
     * @return User
     * @throws Exceptions\InvalidLoginCredentials
     * @throws Exceptions\InvalidTokenProperties
     * @throws GuzzleException
     * @throws PlayerNotFoundException
     */

    public function lookup(string $username): User
    {

        $username = trim(str_replace(' ', '', $username));
        $header = [
            "Authorization" => "bearer " . OAuth::getToken()->getToken()
        ];
        $client = new Client();
        try{
            $data = $client->request('GET', EndPoint::FORTNITE_LOOKUP . $username, [
               'headers' => $header
            ]);
        }catch(GuzzleException $e){
            switch($e->getResponse()->getStatusCode()){
                case 404:
                    throw new PlayerNotFoundException();
                    break;
                default:
                    throw $e;
            }
        }
        $data = json_decode($data->getBody()->getContents());
        $user = new User();
        $user->setId($data->id)
            ->setUsername($data->displayName);
        return $user;
    }

    /**
     * @param User $user
     * @param string $plateform
     * @param string $window
     * @return bool|Stat
     * @throws Exceptions\InvalidLoginCredentials
     * @throws Exceptions\InvalidTokenProperties
     * @throws GuzzleException
     * @throws InvalidPlateformException
     * @throws InvalidStatException
     * @throws InvalidWindowException
     * @throws StatNotFoundException
     */
    public function stats(User $user, string $plateform, string $window = 'alltime')
    {
        $token = OAuth::getToken();
        if(!$token){
            return false;
        }

        $plateform = strtolower($plateform);
        if($plateform !== 'pc' && $plateform !== 'ps4' && $plateform !== 'xb1'){
            throw new InvalidPlateformException('invalid plateform name');
        }
        if($window !== 'alltime' && $window !== 'weekly'){
            throw new InvalidWindowException('invalid window name');
        }

        $url = EndPoint::FORTNITE_STATS . '/' . $user->getId() . '/bulk/window/' . $window;
        $header = [
            "Authorization" => "bearer {$token->getToken()}"
        ];

        $client = new Client();
        try{
            $data = $client->request('GET', $url, [
               'headers' => $header
            ]);
        }catch(GuzzleException $e){
            switch ($e->getResponse()->getStatusCode()){
                case 404:
                    throw new StatNotFoundException();
                    break;
                default:
                    throw $e;
                    break;
            }
        }
        $stats = Stat::convertStatsFromApi($data->getBody()->getContents(), $plateform);
        return $stats;

    }


    /**
     * @return string
     * @throws Exceptions\InvalidLoginCredentials
     * @throws Exceptions\InvalidTokenProperties
     * @throws GuzzleException
     */
    public function store()
    {
        $headers = [
          'Authorization' => 'bearer ' . OAuth::getToken()->getToken()
        ];
        $data = GuzzleHelper::httpRequest('GET', EndPoint::FORTNITE_STORE, $headers);
        return $data->getBody()->getContents();

    }

    /**
     * @return Status
     * @throws Exceptions\InvalidLoginCredentials
     * @throws Exceptions\InvalidTokenProperties
     * @throws GuzzleException
     */
    public function status()
    {
        $headers = [
            "Authorization" => 'bearer ' . OAuth::getToken()->getToken()
        ];
        $data = GuzzleHelper::httpRequest('GET', EndPoint::FORTNITE_STATUS, $headers);

        $data = json_decode($data->getBody()->getContents());
        $status = new Status();
        $status->setStatus($data[0]->status)
            ->setMessage($data[0]->message)
            ->setServiceInstanceId($data[0]->serviceInstanceId)
            ->setMaintenanceUri($data[0]->maintenanceUri);

        return $status;
    }

    /**
     * @param string $language
     * @return string
     * @throws Exceptions\InvalidLoginCredentials
     * @throws Exceptions\InvalidTokenProperties
     * @throws GuzzleException
     */
    public function news($language = 'english')
    {
        $languages = [
            'english' => 'en',
            'french'  => 'fr',
            'russian' => 'ru',
            'italian' => 'it',
            'spanish' => 'es',
            'polish' => 'pl',
            'portuguese' => 'pt',
            'german' => 'de',
            'japanese' => 'ja'

        ];

        if(key_exists($language, $languages)){
            $language = $languages[$language];
        }
        else{
            $language = $languages['english'];
        }

        $headers = [
            "Authorization" => 'bearer ' . OAuth::getToken()->getToken(),
            "Accept-Language" => $language
        ];
        $data = GuzzleHelper::httpRequest('GET', EndPoint::FORTNITE_NEWS, $headers);

        return $data->getBody()->getContents();
    }

}