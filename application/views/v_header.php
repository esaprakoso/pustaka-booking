<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title><?= isset($judul) ? $judul : 'Web Prog II | Merancang Template sederhana dengan codeigniter' ?></title>
        <link rel='stylesheet' type='text/css' href='<?= base_url('assets/css/stylebuku.css') ?>'>
    </head>
    <body>
    <div id='wrapper'>
        <header>
            <hgroup>
                <h1>RentalBuku.net</h1>
                <h3><?= isset($judul) ? $judul : 'Membuat Template Sederhana denganCodeIgniter' ?></h3>
            </hgroup>
            <nav>
                <ul>
                    <li><a href='<?= site_url('web') ?>'>Home</a></li>
                    <li><a href='<?= site_url('web/formMataKuliah') ?>'>Masukan Matakuliah</a></li>
                    <li><a href='<?= site_url('web/about') ?>'>About</a></li>
                </ul>
            </nav>
            <div class='clear'>
        </header>