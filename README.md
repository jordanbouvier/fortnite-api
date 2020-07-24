# Fortnite API (doesn't work anymore)

My personal PHP "library" to access Fortnite api

## Basic usage

```php

use FortniteApi\FortniteRequest;
use FortniteApi\OAuth;

$login = [
            "login" => "username",
            "password" => "password",
            "launcherId" => "launcher_id",
            "gameId" => "game_id",
 ];
 OAuth::setLoginDetails($login);
 $fortnite = new FortniteRequest();

```

### Get user
```php
//Return
$user = $fortnite->lookup('username');
```

### Get Stats
```php
$stats = $fortnite->stats($user, 'plateform', 'window');
```
Available window : 'weekly' or 'alltime' | default 'alltime'
Available plateform: 'pc', 'xb1', 'ps4' 


### Get store
```php
//RAW DATA
$store = $fortnite->store();
```

### Get news
```php
//RAW DATA
$news = $fortnite->news('english);
```
Available languages : 'english','french','russian','italian','spanish','polish', 'portuguese','german','japanese'

### Get status
```php
$status = $fortnite->status();
```
