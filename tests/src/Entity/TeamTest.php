<?php

namespace TheSportsDb\Test\Entity;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-09-06 at 13:17:19.
 */
class TeamTest extends AbstractEntityTest {

  protected $entityClass = '\\TheSportsDb\\Entity\\Team';

  /**
   * @covers TheSportsDb\Entity\Team::getId
   * @covers TheSportsDb\Entity\Team::getName
   * @covers TheSportsDb\Entity\Team::getTeamShort
   * @covers TheSportsDb\Entity\Team::getAlternateName
   * @covers TheSportsDb\Entity\Team::getFormedYear
   * @covers TheSportsDb\Entity\Team::getSport
   * @covers TheSportsDb\Entity\Team::getLeague
   * @covers TheSportsDb\Entity\Team::getDivision
   * @covers TheSportsDb\Entity\Team::getManager
   * @covers TheSportsDb\Entity\Team::getStadium
   * @covers TheSportsDb\Entity\Team::getKeywords
   * @covers TheSportsDb\Entity\Team::getRss
   * @covers TheSportsDb\Entity\Team::getStadiumThumb
   * @covers TheSportsDb\Entity\Team::getStadiumDescription
   * @covers TheSportsDb\Entity\Team::getStadiumLocation
   * @covers TheSportsDb\Entity\Team::getStadiumCapacity
   * @covers TheSportsDb\Entity\Team::getWebsite
   * @covers TheSportsDb\Entity\Team::getFacebook
   * @covers TheSportsDb\Entity\Team::getTwitter
   * @covers TheSportsDb\Entity\Team::getInstagram
   * @covers TheSportsDb\Entity\Team::getDescription
   * @covers TheSportsDb\Entity\Team::getGender
   * @covers TheSportsDb\Entity\Team::getCountry
   * @covers TheSportsDb\Entity\Team::getBadge
   * @covers TheSportsDb\Entity\Team::getJersey
   * @covers TheSportsDb\Entity\Team::getLogo
   * @covers TheSportsDb\Entity\Team::getBanner
   * @covers TheSportsDb\Entity\Team::getYoutube
   * @covers TheSportsDb\Entity\Team::getLocked
   */
  public function testGetters() {
   parent::testGetters();
  }

  /**
   * @covers TheSportsDb\Entity\Team::transformSport
   * @covers TheSportsDb\Entity\Team::transformLeague
   * @todo   Implement testTransformSport().
   */
  public function testTransformSport() {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
      'This test has not been implemented yet.'
    );
  }

  /**
   * @covers TheSportsDb\Entity\Team::transformLeague
   * @todo   Implement testTransformLeague().
   */
  public function testTransformLeague() {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
      'This test has not been implemented yet.'
    );
  }

}
