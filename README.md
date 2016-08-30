# TheSportsDb
PHP Library to connect to the api of http://thesportsdb.com/

## Todo
- Write tests

## Example code
```php
<?php

include_once __DIR__ . '/default_bootstrap.php';

// Get all sports.
$sports = $db->getSports();

// Print the first sport.
$sport = reset($sports);
print_r($sport->raw());

// Get the leagues of this sport (lazy loaded).
$leagues = $sport->getLeagues();

// Print the first league.
$league = reset($leagues);
print_r($league->raw());

// Get the seasons for this league.
$seasons = $league->getSeasons();

// Print the first season.
$season = reset($seasons);
print_r($season->raw());

// Get the events for this league.
$events = $season->getEvents();

// Print the first event.
$event = reset($events);
// Trigger lazy load, the full event object will be loaded when calling $event->raw().
$event->getName();
print_r($event->raw());
```

[![Code Climate](https://codeclimate.com/github/Jelle-S/TheSportsDb/badges/gpa.svg)](https://codeclimate.com/github/Jelle-S/TheSportsDb) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Jelle-S/TheSportsDb/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Jelle-S/TheSportsDb/?branch=master) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/4635ec9c97bc435d8a1f0312d2caf418)](https://www.codacy.com/app/sebreghts-jelle/TheSportsDb?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Jelle-S/TheSportsDb&amp;utm_campaign=Badge_Grade) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/ae1637a4-a976-4b5d-a316-4e6112367628/mini.png)](https://insight.sensiolabs.com/projects/ae1637a4-a976-4b5d-a316-4e6112367628)
