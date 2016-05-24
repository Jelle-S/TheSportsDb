<?php
/**
 * @file
 * Contains \TheSportsDb\PropertyMapper\PlayerPropertyMapper.
 */

namespace TheSportsDb\PropertyMapper;

use TheSportsDb\Factory\FactoryInterface;

/**
 * Property mapper for players.
 *
 * @author Jelle Sebreghts
 */
class PlayerPropertyMapper extends AbstractPropertyMapper {

  /**
   * {@inheritdoc}
   */
  protected $propertyMap = array(
    'id' => 'idPlayer',
    'team' => 'idTeam',
    'nationality' => 'strNationality',
    'name' => 'strPlayer',
    'sport' => 'strSport',
    'birthDay' => 'dateBorn',
    'dateSigned' => 'dateSigned',
    'signing' => 'strSigning',
    'wage' => 'strWage',
    'birthLocation' => 'strBirthLocation',
    'description' => 'strDescriptionEN',
    'gender' => 'strGender',
    'position' => 'strPosition',
    'facebook' => 'strFacebook',
    'website' => 'strWebsite',
    'twitter' => 'strTwitter',
    'instagram' => 'strInstagram',
    'youtube' => 'strYoutube',
    'height' => 'strHeight',
    'weight' => 'strWeight',
    'thumb' => 'strThumb',
    'cutout' => 'strCutout',
    'locked' => 'strLocked',
    // strTeam
    // idSoccerXML
    // idPlayerManager
    // intSoccerXMLTeamID
    // strDescriptionDE
    // strDescriptionFR
    // strDescriptionCN
    // strDescriptionIT
    // strDescriptionJP
    // strDescriptionRU
    // strDescriptionES
    // strDescriptionPT
    // strDescriptionSE
    // strDescriptionNL
    // strDescriptionHU
    // strDescriptionNO
    // strDescriptionIL
    // strDescriptionPL
    // strCollege
    // intLoved
    // strFanart1
    // strFanart2
    // strFanart3
    // strFanart4
    
  );

  /**
   * {@inheritdoc}
   */
  protected $propertyCallbacks = array(
    'team' => 'mapTeam',
    'sport' => 'mapSport',
  );

  /**
   * The team factory.
   *
   * @var \TheSportsDb\Factory\FactoryInterface
   */
  protected $teamFactory;

  /**
   * The sport factory.
   *
   * @var \TheSportsDb\Factory\FactoryInterface
   */
  protected $sportFactory;

  protected $destinationClass = 'TheSportsDb\Entity\Player';

  public function setTeamFactory(FactoryInterface $teamFactory) {
    $this->teamFactory = $teamFactory;
  }

  public function setSportFactory(FactoryInterface $sportFactory) {
    $this->sportFactory = $sportFactory;
  }

  public function mapTeam($teamId, \stdClass $values, $reverse = FALSE) {
    if (!$reverse) {
      if (!($this->teamFactory instanceof FactoryInterface)) {
        throw new \Exception('No team factory set.');
      }
      $teamData = (object) array('idTeam' => $teamId);
      if (isset($values->strTeam)) {
        $teamData->strTeam = $values->strTeam;
      }
      return $this->teamFactory->create($teamData);
    }
    return $teamId->getId();
  }

  public function mapSport($sportName, \stdClass $values, $reverse = FALSE) {
    if (!$reverse && !($this->sportFactory instanceof FactoryInterface)) {
        throw new \Exception('No sport factory set.');
    }
    return $reverse ? $sportName->getId() : $this->sportFactory->create((object) array('strSport' => $sportName));
  }

}
