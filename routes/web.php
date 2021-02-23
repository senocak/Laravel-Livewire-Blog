<?php

Route::livewire('/', 'yazilar')->name('anasayfa');
Route::livewire('/yazi', 'yazilar');
Route::livewire('/kategori', 'yazilar');
Route::livewire('/kategori/{url}', 'kategoriler-index')->name('kategorilerIndex');
Route::livewire('/yazi/{url}', 'yazi-detay')->name('yazi');

Route::livewire('/login', 'login')->name('login');

Route::prefix('admin')->name("admin.")->middleware(['auth'])->group(function () {
    Route::livewire('/', 'admin-anasayfa')->name('anasayfa');

    Route::livewire('/yazilar', 'admin-yazilar')->name('yazilar');
    Route::livewire('/yazilar/ekle', 'admin-yazi-ekle')->name('yazilar.ekle');
    Route::livewire('/yazilar/duzenle/{url}', 'admin-yazi-duzenle')->name('yazilar.duzenle');

    Route::livewire('/kategoriler', 'admin-kategoriler')->name('kategoriler');
    Route::livewire('/kategoriler/duzenle/{url}', 'admin-kategoriler-duzenle')->name('kategoriler.duzenle');

    Route::livewire('/yorumlar', 'admin-yorumlar')->name('yorumlar');
});

