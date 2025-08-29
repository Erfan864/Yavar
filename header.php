<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class("min-h-screen flex flex-col items-stretch"); ?>>
    <header class="flex-none flex size-full">
        <nav class="flex justify-center items-center w-full py-5 bg-(--color-quaternary)">
            <ul class="flex justify-between items-center gap-7">
                <li><a href="#" class="py-2 px-5 rounded-lg bg-(--color-primary) text-white">خانه</a></li>
                <li><a href="#" class="py-2 px-5 rounded-lg bg-(--color-secondary) text-white">درباره ما</a></li>
                <li><a href="#" class="py-2 px-5 rounded-lg bg-(--color-tertiary) text-white">تماس با ما</a></li>
            </ul>
        </nav>
    </header>