<?php

class WuiFCKEditor extends WuiWidget {
    public function __construct($elemName, $elemArgs = '', $elemTheme = '', $dispEvents = '') {
        parent::__construct($elemName, $elemArgs, $elemTheme, $dispEvents);
    

        if ( !isset( $this->mArgs['height'] ) ) {
        	$this->mArgs['height'] = '400';
        }
        if ( !isset( $this->mArgs['width'] ) ) {
        	$this->mArgs['width'] = '600';
        }
    }

	public function generateSource() {
        $event_data = new WuiEventRawData( $this->mArgs['disp'], $this->mName );
        $this->mLayout = ( $this->mComments ? '<!-- begin '.$this->mName.' fckeditor -->' : '' );

		$value = str_ireplace("\n", "", $this->mValue);
		$value = str_ireplace("\r", "", $value);
		
		require_once(InnomaticContainer::instance('innomaticcontainer')->getHome().'/shared/fckeditor/fckeditor_php5.php');
		$editor = new FCKeditor($this->mName);
		$editor->BasePath = InnomaticContainer::instance('innomaticcontainer')->getBaseUrl(false).'/shared/fckeditor/';
		$editor->Width = $this->mArgs['width'];
		$editor->Height = $this->mArgs['height'];
		$editor->Value = $this->mArgs['value'];
		
		$this->mLayout .= $editor->CreateHtml();

        $this->mLayout .= ( $this->mComments ? '<!-- end '.$this->mName." fckeditor -->\n" : '' );

        return true;
    }
}

?>
