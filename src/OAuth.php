<?php
namespace FortniteApi;

use FortniteApi\Exceptions\InvalidLoginCredentials;
use FortniteApi\Exceptions\InvalidTokenProperties;
use FortniteApi\Helper\GuzzleHelper;
use FortniteApi\Model\GameToken;
use GuzzleHttp\Exception\GuzzleException;

class OAuth
{
    const EXPECTED_EXCHANGE_TOKEN_PROPERTIES = ['code'];
    const EXPECTED_TOKEN_PROPERTIES =  array('access_token', 'expires_in', 'refresh_token', 'refresh_expires', 'token_type');

    private static $gameToken;
    private static $loginDetails;

    /**
     * @return GameToken
     * @throws GuzzleException
     * @throws InvalidTokenProperties
     */

    private static function login(): GameToken
    {
        $username = self::$loginDetails['login'];
        $password = self::$loginDetails['password'];
        $launcherId = self::$loginDetails['launcherId'];
        $gameId = self::$loginDetails['gameId'];

        $token = self::getTokenWithLauncherId($username, $password, $launcherId);
        $exchangeCode = self::getExchangeCode($token);
        $gameToken = self::getTokenWithGameId($exchangeCode, $gameId);

        $token = new GameToken();
        $date = new \DateTime();
        $token->getExpireAt()->setTimestamp($date->getTimestamp() + $gameToken->expires_in);
        $token->getRefreshTokenExpireAt()->setTimestamp($date->getTimestamp() + $gameToken->refresh_expires);
        $token->setToken($gameToken->access_token)
              ->setRefreshToken($gameToken->refresh_token)
              ->setTokenType($gameToken->token_type);
        self::$gameToken = $token;

        return self::$gameToken;

    }

    /**
     * @param \stdClass $token
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws InvalidTokenProperties
     * @throws GuzzleException
     */
    private static function getExchangeCode(\stdClass $token)
    {
        $header = [
            'Authorization' => 'bearer ' . $token->access_token
        ];
        $exchangeCode = GuzzleHelper::httpRequest('GET', EndPoint::OAUTH_EXCHANGE, $header);
        $exchangeCode = json_decode($exchangeCode->getBody()->getContents());

        if(!self::testExpectedProperties(self::EXPECTED_EXCHANGE_TOKEN_PROPERTIES, $exchangeCode)){
            throw new InvalidTokenProperties();
        }

        return $exchangeCode;
    }

    /**
     * @param \stdClass $exchangeCode
     * @param string $gameId
     * @return mixed
     * @throws InvalidTokenProperties
     * @throws \Exception
     * @throws GuzzleException
     */
    private static function getTokenWithGameId(\stdClass $exchangeCode, string $gameId)
    {
        //$content = 'grant_type=exchange_code&exchange_code='. $exchangeCode->code . '&includePerms=true&token_type=eg1';
        $header = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'basic ' . $gameId
        ];
        $formParams = [
            'grant_type' => 'exchange_code',
            'exchange_code' => $exchangeCode->code,
            'includePerms' => 'true',
            'token_type' => 'eg1'

        ];
        $gameToken = GuzzleHelper::httpRequest('POST', EndPoint::OAUTH, $header, $formParams);

        $gameToken = json_decode($gameToken->getBody()->getContents());

        if(!self::testExpectedProperties(self::EXPECTED_TOKEN_PROPERTIES, $gameToken)){
            throw new InvalidTokenProperties();
        }
        return $gameToken;

    }

    /**
     * @param string $username
     * @param string $password
     * @param string $launcherId
     * @return mixed
     * @throws InvalidTokenProperties
     * @throws \Exception
     * @throws GuzzleException
     */
    private static function getTokenWithLauncherId(string $username, string $password, string $launcherId)
    {
        $header = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'basic ' . $launcherId

        ];
        $formParams = [
            'grant_type' => 'password',
            'username' => $username,
            'password' => $password,
            'includePerms' => 'true'
        ];

        $token = GuzzleHelper::httpRequest('POST', EndPoint::OAUTH, $header,$formParams);

        $token = json_decode($token->getBody()->getContents());
        if(!self::testExpectedProperties(self::EXPECTED_TOKEN_PROPERTIES, $token)){
            throw new InvalidTokenProperties();
        }

        return $token;
    }

    /**
     * @param array $properties
     * @param \stdClass $class
     * @return bool
     */
    private static function testExpectedProperties(array $properties, \stdClass $class):bool
    {
        foreach($properties as $property){
            if(!property_exists($class, $property)){
                return false;
            }
        }
        return true;
    }

    /**
     * @return GameToken
     * @throws GuzzleException
     * @throws InvalidLoginCredentials
     * @throws InvalidTokenProperties
     */
    public static function checkToken()
    {
        if(self::$gameToken instanceof GameToken){
            $currentDate = new \DateTime();
            if (self::$gameToken->getExpireAt()->getTimestamp() - 5 > $currentDate->getTimestamp()) {
                return self::$gameToken;
            }
        }
        else {
            if(!self::$loginDetails){
                throw new InvalidLoginCredentials();
            }
            return self::login();
        }
    }

    /**
     * @return GameToken
     * @throws GuzzleException
     * @throws InvalidLoginCredentials
     * @throws InvalidTokenProperties
     */
    public static function getToken(): GameToken
    {
        return self::checkToken();
    }
    public static function setToken(GameToken $token)
    {
        self::$gameToken = $token;
    }

    /**
     * @param array $loginDetails
     * @return string
     * @throws InvalidLoginCredentials
     */
    public static function setLoginDetails(array $loginDetails)
    {
        $expectedKeys = ['login', 'password', 'launcherId', 'gameId'];
        foreach($expectedKeys as $expectedKey){
            if(!key_exists($expectedKey, $loginDetails)){
              throw new InvalidLoginCredentials('invalid ' . $expectedKey);
            }
        }
        self::$loginDetails = $loginDetails;
    }
}