<?php

/**
 * Class Genre
 * This class is used to create a model of a genre for a movie
 * 
 * @author Fabio Pacifici
 */
class Genre
{

  /**
   * @param String $name The genre name
   */
  public function __construct(public String $name)
  {
    $this->name = $name;
  }
}
