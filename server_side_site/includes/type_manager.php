<?php

require_once('connection.php');
require_once('types.php');

class TypeManager{

    // public $aTypes =[];

    static public function getTypes(){

        $aTypes =[];

        $oConnection = new Connection();

        $sSQL = 'SELECT id FROM types
                WHERE visible = 1';

        $oResultSet = $oConnection->query($sSQL);

        while($aRow = $oConnection->fetch($oResultSet)){
            $iTypeId = $aRow['id'];
            $oType = new Type();

            $oType->load($iTypeId);
            $aTypes[] = $oType;
        }
        return $aTypes;
    }



    static public function listImages(){

        $aImages = [];

        $oConnection = new Connection;

        $sSQL = 'SELECT images.id, SUM(value) score
                  FROM images
                  LEFT OUTER JOIN votes ON images.id=image_id
                  WHERE visible = 1
                  GROUP BY images.id
                  ORDER BY score DESC';

        $oResultSet = $oConnection->query($sSQL);

        while($aRow=$oConnection->fetch($oResultSet)){
            $iImageId = $aRow['id'];
            $oImage = new Image();

            $oImage->load($iImageId);
            $aImages[] = $oImage;
        }
        return $aImages;
    }


    static public function listTypes(){

        
        $oConnection = new Connection;

        $sSQL = 'SELECT id,type_name,visible 
                FROM types
                WHERE visible = 1';

        $oResultSet = $oConnection->query($sSQL);

        while($aRow = $oConnection->fetch($oResultSet)){
            $iTypeId = $aRow['id'];
            $aTypes[$iTypeId] = $aRow['type_name'];
        }
        return $aTypes;
    }

}

// test...
// echo '<pre>';
// print_r(TypeManager::listTypes());
// echo '</pre>';
//
// echo '<pre>';
// print_r(TypeManager::getTypes());
// echo '</pre>';
