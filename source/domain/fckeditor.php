<?php

require( 'auth.php' );

$gHui = new Hui( $GLOBALS['gEnv']['root']['db'] );
$gHui->LoadWidget( 'page' );
$gHui->LoadWidget( 'xml' );
$gHui->LoadWidget( 'fckeditor' );

$gMain_disp = new HuiDispatcher( 'view' );

print_r( $_POST );

$gMain_disp->AddEvent(
    'default',
    'main_default'
    );
function main_default( $eventData )
{
global $gXml_def;

$gXml_def =
'<vertgroup>
  <children>

    <label>
      <args>
        <label>Prova</label>
      </args>
    </label>

    <form><name>testo</name>
      <args>
        <action type="encoded">'.build_events_call_string(
            '',
            array(
                array(
                    'view',
                    'default'
                    )
                )
            ).'</action>
      </args>
      <children>

    <fckeditor><name>pino</name>
      <args>
        <height>400</height>
        <width>600</width>
        <disp>view</disp>
        <value type="encoded">'.urlencode( $eventData['pino'] ).'</value>
      </args>
    </fckeditor>

      </children>
    </form>

    <horizbar/>

    <button>
      <args>
        <formsubmit>testo</formsubmit>
        <label>Invia</label>
        <themeimage>button_ok</themeimage>
        <horiz>true</horiz>
        <action type="encoded">'.build_events_call_string(
            '',
            array(
                array(
                    'view',
                    'default'
                    )
                )
            ).'</action>
      </args>
    </button>

  </children>
</vertgroup>';
}

$gMain_disp->Dispatch();

$page = new HuiPage( 'page' );
$page->AddChild( new HuiXml( 'def', array( 'definition' => $gXml_def ) ) );

$gHui->AddChild( $page );
$gHui->Render();

?>