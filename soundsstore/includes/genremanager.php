<?php 
require_once('connection.php');
require_once('genres.php');

class GenreManager{

	static public function getGenres(){

		$aGenres = [];

		$oConnection = new Connection();

		$sSQL = 'SELECT id 
			  	FROM genres';

		$oResultSet = $oConnection->query($sSQL);

		while($aRow = $oConnection->fetch($oResultSet)){
			$iGenreId = $aRow['id'];
			$oGenre = new Genre();

			$oGenre->load($iGenreId);
			$aGenres[] = $oGenre; // add subject to list

		}
		return $aGenres;
	}


	static public function listGenres(){


		$aGenres = [];

		$oConnection = new Connection();

		$sSQL = 'SELECT id, genre_name 
			  	FROM genres';

		$oResultSet = $oConnection->query($sSQL);

		while($aRow = $oConnection->fetch($oResultSet)){
			$iGenreId = $aRow['id'];


			$aGenres[$iGenreId] = $aRow['genre_name']; // add subject to list

		}
		return $aGenres;
	}

	

}

// test...
// echo '<pre>';
// print_r(GenreManager::listGenres());
// echo '</pre>';




 ?>



 