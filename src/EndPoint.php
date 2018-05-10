<?php namespace FortniteApi;

class EndPoint
{
    const OAUTH = 'https://account-public-service-prod03.ol.epicgames.com/account/api/oauth/token';
    const OAUTH_EXCHANGE = 'https://account-public-service-prod03.ol.epicgames.com/account/api/oauth/exchange';
    const OAUTH_KILL =  'https://account-public-service-prod03.ol.epicgames.com/account/api/oauth/sessions/kill/';
    const FORTNITE_LOOKUP = 'https://persona-public-service-prod06.ol.epicgames.com/persona/api/public/account/lookup?q=';
    const FORTNITE_STATS = 'https://fortnite-public-service-prod11.ol.epicgames.com/fortnite/api/stats/accountId';
    const FORTNITE_STORE = 'https://fortnite-public-service-prod11.ol.epicgames.com/fortnite/api/storefront/v2/catalog';
    const FORTNITE_STATUS = 'https://lightswitch-public-service-prod06.ol.epicgames.com/lightswitch/api/service/bulk/status?serviceId=Fortnite';
    const FORTNITE_NEWS = 'https://fortnitecontent-website-prod07.ol.epicgames.com/content/api/pages/fortnite-game';

}