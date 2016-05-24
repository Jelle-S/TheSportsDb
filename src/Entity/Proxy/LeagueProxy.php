<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\LeagueProxy.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Exception\TheSportsDbException;
use TheSportsDb\Entity\LeagueInterface;
use TheSportsDb\Entity\League;

/**
 * A league object that is not yet fully loaded.
 *
 * @author Jelle Sebreghts
 */
class LeagueProxy extends Proxy implements LeagueInterface {

  /**
   * {@inheritdoc}
   */
  protected function load() {
    $league_data = $this->sportsDbClient->doRequest('lookupleague.php', array('id' => $this->properties->id));
    if (isset($league_data->leagues)) {
      $league = (object) array_merge((array) reset($league_data->leagues), (array) $this->factory->reverseMapProperties($this->properties));
      $this->entity = $this->factory->create($league);
      if ($this->entity instanceof LeagueInterface) {
        return;
      }
    }
    throw new TheSportsDbException('Could not fully load league with id ' . $this->properties->id . '.');
  }

  protected function loadSeasons() {
    $league_data = $this->sportsDbClient->doRequest('lookupleague.php', array('id' => $this->properties->id, 's' => 'all'));
    if (isset($league_data->leagues)) {
      $league = (object) array_merge((array) $this->factory->reverseMapProperties($this->properties), array('seasons' => $league_data->leagues));
      $this->entity = $this->factory->create($league);
      if ($this->entity instanceof LeagueInterface) {
        return;
      }
    }
    throw new TheSportsDbException('Could not fully load league with id ' . $this->properties->id . '.');
  }

  public function getAlternateName() {
    return $this->get('alternateName');
  }

  public function getBadge() {
    return $this->get('badge');
  }

  public function getBanner() {
    return $this->get('banner');
  }

  public function getCountry() {
    return $this->get('country');
  }

  public function getDateFirstEvent() {
    return $this->get('dateFirstEvent');
  }

  public function getDescription() {
    return $this->get('description');
  }

  public function getFacebook() {
    return $this->get('facebook');
  }

  public function getFormedYear() {
    return $this->get('formedYear');
  }

  public function getGender() {
    return $this->get('gender');
  }

  public function getId() {
    return $this->get('id');
  }

  public function getLocked() {
    return $this->get('locked');
  }

  public function getLogo() {
    return $this->get('logo');
  }

  public function getName() {
    return $this->get('name');
  }

  public function getNaming() {
    return $this->get('naming');
  }

  public function getPoster() {
    return $this->get('poster');
  }

  public function getRss() {
    return $this->get('rss');
  }

  public function getSportName() {
    return $this->get('sportName');
  }

  public function getTrophy() {
    return $this->get('trophy');
  }

  public function getTwitter() {
    return $this->get('twitter');
  }

  public function getWebsite() {
    return $this->get('website');
  }

  public function getYoutube() {
    return $this->get('youtube');
  }

  public function getSeasons() {
    return $this->get('seasons');
  }
}
