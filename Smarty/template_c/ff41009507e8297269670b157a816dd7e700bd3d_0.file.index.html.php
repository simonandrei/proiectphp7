<?php
/* Smarty version 3.1.33, created on 2019-02-03 16:47:38
  from 'C:\xampp\htdocs\proiectphp\App\Views\Homepage\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c570d1aa7be54_23330108',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff41009507e8297269670b157a816dd7e700bd3d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proiectphp\\App\\Views\\Homepage\\index.html',
      1 => 1549208842,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c570d1aa7be54_23330108 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    body {
        background: linear-gradient(253deg, #0cc898, #1797d2, #864fe1);
        background-size: 300% 300%;
        -webkit-animation: Background 25s ease infinite;
        -moz-animation: Background 25s ease infinite;
        animation: Background 25s ease infinite;
    }

    @-webkit-keyframes Background {
        0% {
            background-position: 0% 50%
        }
        50% {
            background-position: 100% 50%
        }
        100% {
            background-position: 0% 50%
        }
    }

    @-moz-keyframes Background {
        0% {
            background-position: 0% 50%
        }
        50% {
            background-position: 100% 50%
        }
        100% {
            background-position: 0% 50%
        }
    }

    @keyframes Background {
        0% {
            background-position: 0% 50%
        }
        50% {
            background-position: 100% 50%
        }
        100% {
            background-position: 0% 50%
        }
    }

    .full-screen {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: url(https://i.imgur.com/wCG2csZ.png);
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 100%;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column
        /* works with row or column */

        flex-direction: column;
        -webkit-align-items: center;
        align-items: center;
        -webkit-justify-content: center;
        justify-content: center;
        text-align: center;
    }

    h1 {
        color: #fff;
        font-family: 'Open Sans', sans-serif;
        font-weight: 800;
        font-size: 4em;
        letter-spacing: -2px;
        text-align: center;
        text-shadow: 1px 2px 1px rgba(0, 0, 0, .6);
    }

    h1:after {
        display: block;
        color: #fff;
        letter-spacing: 1px;
        font-family: 'Poiret One', sans-serif;
        content: 'by Simon Andrei';
        font-size: .4em;
        text-align: center;
    }

    .button-line {
        font-family: 'Open Sans', sans-serif;
        text-transform: uppercase;
        letter-spacing: 2px;
        background: transparent;
        border: 1px solid #fff;
        color: #fff;
        text-align: center;
        font-size: 1.4em;
        opacity: .8;
        padding: 20px 40px;
        text-decoration: none;
        transition: all .5s ease;
        margin: 0 auto;
        width: 100px;
    }

    .button-line:hover {
        opacity: 1;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<div class="full-screen">
    <div>
        <h1>Time Tracker</h1>
        <br>
        <a class="button-line" href="/login">Login</a>
        <a class="button-line" href="/register">Register</a>
    </div>
</div>
</html><?php }
}
