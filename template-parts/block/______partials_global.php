<?php 

$anchor = '';
if( !empty( $block['anchor'] ) ) $anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';
if( !empty( $block['className'] ) ) $blockclass = ' '.sanitize_title( $block['className'] );


?>