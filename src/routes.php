<?php
Route::group(['namespace' => 'Codwelt\codliveditor\Controllers', 'prefix' => 'codliveditor'], function () {
    Route::post('/lienzo/ver/pdf', ['as' => 'codliveditordownloadpdf', 'uses' => 'CodliveditorController@verPdf']);
    Route::get('/lienzo/ver/render/document', function () {
    return view('codliveditor.conf.vista');
    });
    Route::post('/lienzo/escribir/render', ['as' => 'codliveditordownloadpdf', 'uses' => 'CodliveditorController@renderview']);
    Route::resource('bd', 'Codliveditordb');
    Route::resource('lienzo', 'CodliveditorController');
    Route::resource('configuracion', 'codliveditorconfigcontroller');
});
