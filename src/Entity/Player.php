<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Player.
 */

namespace TheSportsDb\Entity;

/**
 * A fully loaded player object.
 *
 * @author Jelle Sebreghts
 */
class Player extends Entity implements PlayerInterface {
  protected $id;
  protected $team;
  protected $nationality;
  protected $name;
  protected $sport;
  protected $birthDay;
  protected $dateSigned;
  protected $signing;
  protected $wage;
  protected $birthLocation;
  protected $description;
  protected $gender;
  protected $position;
  protected $facebook;
  protected $website;
  protected $twitter;
  protected $instagram;
  protected $youtube;
  protected $height;
  protected $weight;
  protected $thumb;
  protected $cutout;
  protected $locked;

  public function getId() {
    return $this->id;
  }

  public function getTeam() {
    return $this->team;
  }

  public function getNationality() {
    return $this->nationality;
  }

  public function getName() {
    return $this->name;
  }

  public function getSport() {
    return $this->sport;
  }

  public function getBirthDay() {
    return $this->birthDay;
  }

  public function getDateSigned() {
    return $this->dateSigned;
  }

  public function getSigning() {
    return $this->signing;
  }

  public function getWage() {
    return $this->wage;
  }

  public function getBirthLocation() {
    return $this->birthLocation;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getGender() {
    return $this->gender;
  }

  public function getPosition() {
    return $this->position;
  }

  public function getFacebook() {
    return $this->facebook;
  }

  public function getWebsite() {
    return $this->website;
  }

  public function getTwitter() {
    return $this->twitter;
  }

  public function getInstagram() {
    return $this->instagram;
  }

  public function getYoutube() {
    return $this->youtube;
  }

  public function getHeight() {
    return $this->height;
  }

  public function getWeight() {
    return $this->weight;
  }

  public function getThumb() {
    return $this->thumb;
  }

  public function getCutout() {
    return $this->cutout;
  }

  public function getLocked() {
    return $this->locked;
  }
}
