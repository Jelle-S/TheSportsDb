<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\LeagueProxy.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Entity\LeagueInterface;

/**
 * A league object that is not yet fully loaded.
 *
 * @author Jelle Sebreghts
 */
class LeagueProxy extends Proxy implements LeagueInterface {

  /**
   * {@inheritdoc}
   */
  public function load() {
    $leagueData = $this->sportsDbClient->doRequest('lookupleague.php', array('id' => $this->properties->id));
    if (isset($leagueData->leagues)) {
      $this->update($this->entityManager->mapProperties(reset($leagueData->leagues), $this->getEntityType()));
      return;
    }
    throw new \Exception('Could not fully load league with id ' . $this->properties->id . '.');
  }

  /**
   * Lazy loads the seasons for this league.
   *
   * @throws \Exception
   *   When the seasons cannot be loaded.
   *
   * @return void
   */
  protected function loadSeasons() {
    $leagueData = $this->sportsDbClient->doRequest('lookupleague.php', array('id' => $this->properties->id, 's' => 'all'));
    if (isset($leagueData->leagues)) {
      $leagues = $leagueData->leagues;
      foreach ($leagues as &$league) {
        if (!isset($league->idLeague)) {
          $league->idLeague = $this->properties->id;
        }
      }
      $this->update($this->entityManager->mapProperties((object) array('seasons' => $leagues), $this->getEntityType()));
      return;
    }
    throw new \Exception('Could not fully load league with id ' . $this->properties->id . '.');
  }

  /**
   * {@inheritdoc}
   */
  public function getAlternateName() {
    return $this->get('alternateName');
  }

  /**
   * {@inheritdoc}
   */
  public function getBadge() {
    return $this->get('badge');
  }

  /**
   * {@inheritdoc}
   */
  public function getBanner() {
    return $this->get('banner');
  }

  /**
   * {@inheritdoc}
   */
  public function getCountry() {
    return $this->get('country');
  }

  /**
   * {@inheritdoc}
   */
  public function getDateFirstEvent() {
    return $this->get('dateFirstEvent');
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->get('description');
  }

  /**
   * {@inheritdoc}
   */
  public function getFacebook() {
    return $this->get('facebook');
  }

  /**
   * {@inheritdoc}
   */
  public function getFormedYear() {
    return $this->get('formedYear');
  }

  /**
   * {@inheritdoc}
   */
  public function getGender() {
    return $this->get('gender');
  }

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return $this->get('id');
  }

  /**
   * {@inheritdoc}
   */
  public function getLocked() {
    return $this->get('locked');
  }

  /**
   * {@inheritdoc}
   */
  public function getLogo() {
    return $this->get('logo');
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name');
  }

  /**
   * {@inheritdoc}
   */
  public function getNaming() {
    return $this->get('naming');
  }

  /**
   * {@inheritdoc}
   */
  public function getPoster() {
    return $this->get('poster');
  }

  /**
   * {@inheritdoc}
   */
  public function getRss() {
    return $this->get('rss');
  }

  /**
   * {@inheritdoc}
   */
  public function getTrophy() {
    return $this->get('trophy');
  }

  /**
   * {@inheritdoc}
   */
  public function getTwitter() {
    return $this->get('twitter');
  }

  /**
   * {@inheritdoc}
   */
  public function getWebsite() {
    return $this->get('website');
  }

  /**
   * {@inheritdoc}
   */
  public function getYoutube() {
    return $this->get('youtube');
  }

  /**
   * {@inheritdoc}
   */
  public function getSeasons() {
    return $this->get('seasons');
  }

  /**
   * {@inheritdoc}
   */
  public function getSport() {
    return $this->get('sport');
  }

}
