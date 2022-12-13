<?php
require_once __DIR__ . '/Genre.php';

/**
 * Class Movie
 * This class is used to create a model of a movie
 * 
 * @author Fabio Pacifici
 */
class Movie
{

  public $language = 'it-IT';
  /**
   * @param String $title the movie title
   * @param String $summary the movie summary
   * @param String $poster the movie poster url
   * @param Array $genres the movie genre
   */
  public function __construct(public String $title, public String $summary, public String $poster, public array $genres, public int $duration)
  {
    $this->title = $title;
    $this->summary = $summary;
    $this->poster = $poster;
    $this->genres = $genres;
    $this->duration = $duration;

    foreach ($genres as $genre) {
      if (!$genre instanceof Genre) {
        echo 'Genre must be an istance of the Genre Class';
        die;
      }
    }
  }

  /* TODO: change the function implementation */
  public function get_genres_as_string()
  {
    /* Refactor using map */
    $genres = [];
    foreach ($this->genres as $genre) {
      array_push($genres, $genre->name);
    }
    return implode(',', $genres);
  }

  /**
   * Returns some movie details
   * @return String
   */
  public function get_movie_details()
  {

    $genres = $this->get_genres_as_string();
    return "Movie Title: $this->title | Summary: $this->summary | Genres: $genres";
  }


  public function setLanguage($lang)
  {
    $this->language = $lang;
  }
}
