<?php
if( isset( $_GET[ 'live' ] ) ):
    $apiResponse = json_decode( file_get_contents( 'https://api.twitch.tv/kraken/streams?game=Hearthstone:%20Heroes%20of%20Warcraft' ) );
    $files = array();
    foreach( $apiResponse->streams as $stream ):
        $previewUrl = str_replace( '{width}', 1920, $stream->preview->template );
        $previewUrl = str_replace( '{height}', 1080, $previewUrl );
        $files[] = 'imgproxy.php?url=' . $previewUrl;
    endforeach;
else :
    $files = glob( "img/*.jpg" );
endif;

echo json_encode( $files );
