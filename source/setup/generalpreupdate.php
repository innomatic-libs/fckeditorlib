<?php

require_once('innomatic/io/filesystem/DirectoryUtils.php');
DirectoryUtils::unlinkTree( InnomaticContainer::instance('innomaticcontainer')->getHome().'shared/fckeditor/' );
DirectoryUtils::dircopy( $this->basedir.'/shared/fckeditor/', InnomaticContainer::instance('innomaticcontainer')->getHome().'shared/fckeditor/' );

?>
