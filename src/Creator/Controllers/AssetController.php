<?php 
namespace webmuscets\FormManager\Creator\Controllers;

use App\Http\Controllers\Controller;

class AssetController extends Controller {
	public function getAsset($folder,$file) {
        $extension = explode('.', $file);
        $contentTypes = [
            'css' => 'text/css',
            'js' => 'application/javascript',
            'jpg' => 'image/jpeg',
			'png' => 'image/png',
        	'eot' => 'application/vnd.ms-fontobject', 
        	'ttf' => 'application/font-sfnt',
        	'svg' => 'image/svg+xml',
        	'woff' => 'application/font-woff',
        	'woff2' => 'font/woff2',
        ];

		$contentType = $contentTypes[end($extension)];
        $filePath = dirname(__DIR__, 2).'/assets/'.$folder.'/'.$file;

        return response()->file($filePath,  ['Content-Type' => $contentType]);
	}
}
