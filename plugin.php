<?php
/*
Plugin Name: (プラグインの名前)
Plugin URI: (プラグインの説明と更新を示すページの URI)
Description: (プラグインの短い説明)
Version: (プラグインのバージョン番号。例: 1.0)
Author: (プラグイン作者の名前)
Author URI: (プラグイン作者の URI)
License: (ライセンス名の「スラッグ」 例: GPL2)
*/

function add_allow_header( $headers ) {
    global $wp;

    $origin = defined("WP_REST_API_ALLOW_ORIGIN")?WP_REST_API_ALLOW_ORIGIN:"*";

    if (preg_match ('/wp-json/',$wp->request)) {
        $headers['Access-Control-Allow-Origin'] = $origin;
        $headers['Access-Control-Allow-Credentials'] = 'true';
        return $headers;
    }
}
add_filter( 'wp_headers', 'add_allow_header' );