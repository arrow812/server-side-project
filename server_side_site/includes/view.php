<?php

class View{
    static public function renderNav($aTypes){

        $sHTML = '<ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>

                    <li>'

            //make types

            for($i=0; $i<count($aTypes); $i++){
                $oType = $aTypes[$i];
            }

        $sHTML.=''








                        <select class="page-scroll" name="imagelist" form="imageform">
                            <option value="landscape">Landscape</option>
                            <option value="moody">Moody</option>
                            <option value="escape">Escape</option>
                            <option value="architecture">Architecture</option>
                        </select>
                    </li>
                </ul>

    }
}
