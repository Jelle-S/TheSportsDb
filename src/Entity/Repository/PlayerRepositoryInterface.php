<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\PlayerRepositoryInterface.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The main interface for PlayerRepository objects.
 *
 * @author Jelle Sebreghts
 */
interface PlayerRepositoryInterface extends RepositoryInterface {

  /**
   * Get players by team.
   *
   * @param string $teamId
   *   The id of the team of the player.
   *
   * @return \TheSportsDb\Entity\PlayerInterface[]
   *   The matched players.
   */
  public function byTeam($teamId);

  /**
   * Get players by team name.
   *
   * @param string $teamName
   *   The name of the team of the player.
   *
   * @return \TheSportsDb\Entity\PlayerInterface[]
   *   The matched players.
   */
  public function byTeamName($name);

  /**
   * Get players by name.
   *
   * @param string $name
   *   The name of the player.
   *
   * @return \TheSportsDb\Entity\PlayerInterface[]
   *   The matched players.
   */
  public function byName($name);

  /**
   * Get players by team name and name.
   *
   * @param string $teamName
   *   The id of the team of the player.
   * @param string $name
   *   The name of the player.
   *
   * @return \TheSportsDb\Entity\PlayerInterface[]
   *   The matched players.
   */
  public function byTeamNameAndName($teamName, $name);
}
