<?php
require("sqlconnection.php");
session_start();
if(!isset($_SESSION['email']))//using this to secure from any unauthoized access to this page
{
    // not logged in
    header('Location: sign-in.php');
    
}
error_reporting(0);
$email=$_SESSION['email'];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Bootstrap 4 with CSS and js.">
  <meta name="author" content="Sheetal">
  <title>Edit Experiments</title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,70" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Style CSS -->
  <link type="text/css" href="./assets/css/style.css?v=1.0.0" rel="stylesheet">
<!-- Custom Css -->
  <style>
    .selectMultiple1 {
      width: 100%;
      position: relative;
    }

    .selectMultiple1 select {
      display: none;
    }

    .selectMultiple1>div {
      position: relative;
      z-index: 2;
      padding: 8px 12px 2px 12px;
      border-radius: 8px;
      background: #fff;
      font-size: 14px;
      min-height: 44px;
      box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
      transition: box-shadow .15s ease;
    }

    .selectMultiple1>div:hover {
      box-shadow: 0 4px 24px -1px rgba(22, 42, 90, 0.16);
    }

    .selectMultiple1>div .arrow {
      right: 1px;
      top: 0;
      bottom: 0;
      cursor: pointer;
      width: 28px;
      position: absolute;
    }

    .selectMultiple1>div .arrow:before,
    .selectMultiple1>div .arrow:after {
      content: "";
      position: absolute;
      display: block;
      width: 2px;
      height: 8px;
      border-bottom: 8px solid #99a3ba;
      top: 43%;
      transition: all 0.3s ease;
    }

    .selectMultiple1>div .arrow:before {
      right: 12px;
      -webkit-transform: rotate(-130deg);
      transform: rotate(-130deg);
    }

    .selectMultiple1>div .arrow:after {
      left: 9px;
      -webkit-transform: rotate(130deg);
      transform: rotate(130deg);
    }

    .selectMultiple1>div span {
      color: #99a3ba;
      display: block;
      position: absolute;
      left: 12px;
      cursor: pointer;
      top: 8px;
      line-height: 28px;
      transition: all 0.3s ease;
    }

    .selectMultiple1>div span.hide {
      opacity: 0;
      visibility: hidden;
      -webkit-transform: translate(-4px, 0);
      transform: translate(-4px, 0);
    }

    .selectMultiple1>div a {
      position: relative;
      padding: 0 24px 6px 8px;
      line-height: 28px;
      color: #1e2330;
      display: inline-block;
      vertical-align: top;
      margin: 0 6px 0 0;
    }

    .selectMultiple1>div a em {
      font-style: normal;
      display: block;
      white-space: nowrap;
    }

    .selectMultiple1>div a:before {
      content: "";
      left: 0;
      top: 0;
      bottom: 6px;
      width: 100%;
      position: absolute;
      display: block;
      background: rgba(228, 236, 250, 0.7);
      z-index: -1;
      border-radius: 4px;
    }

    .selectMultiple1>div a i {
      cursor: pointer;
      position: absolute;
      top: 0;
      right: 0;
      width: 24px;
      height: 28px;
      display: block;
    }

    .selectMultiple1>div a i:before,
    .selectMultiple1>div a i:after {
      content: "";
      display: block;
      width: 2px;
      height: 10px;
      position: absolute;
      left: 50%;
      top: 50%;
      background: #4d18ff;
      border-radius: 1px;
    }

    .selectMultiple1>div a i:before {
      -webkit-transform: translate(-50%, -50%) rotate(45deg);
      transform: translate(-50%, -50%) rotate(45deg);
    }

    .selectMultiple1>div a i:after {
      -webkit-transform: translate(-50%, -50%) rotate(-45deg);
      transform: translate(-50%, -50%) rotate(-45deg);
    }

    .selectMultiple1>div a.notShown {
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .selectMultiple1>div a.notShown:before {
      width: 28px;
      transition: width 0.45s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0.2s;
    }

    .selectMultiple1>div a.notShown i {
      opacity: 0;
      transition: all 0.3s ease 0.3s;
    }

    .selectMultiple1>div a.notShown em {
      opacity: 0;
      -webkit-transform: translate(-6px, 0);
      transform: translate(-6px, 0);
      transition: all 0.4s ease 0.3s;
    }

    .selectMultiple1>div a.notShown.shown {
      opacity: 1;
    }

    .selectMultiple1>div a.notShown.shown:before {
      width: 100%;
    }

    .selectMultiple1>div a.notShown.shown i {
      opacity: 1;
    }

    .selectMultiple1>div a.notShown.shown em {
      opacity: 1;
      -webkit-transform: translate(0, 0);
      transform: translate(0, 0);
    }

    .selectMultiple1>div a.remove:before {
      width: 28px;
      transition: width 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0s;
    }

    .selectMultiple1>div a.remove i {
      opacity: 0;
      transition: all 0.3s ease 0s;
    }

    .selectMultiple1>div a.remove em {
      opacity: 0;
      -webkit-transform: translate(-12px, 0);
      transform: translate(-12px, 0);
      transition: all 0.4s ease 0s;
    }

    .selectMultiple1>div a.remove.disappear {
      opacity: 0;
      transition: opacity 0.5s ease 0s;
    }

    .selectMultiple1>ul {
      margin: 0;
      padding: 0;
      list-style: none;
      font-size: 16px;
      z-index: 5;
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      visibility: hidden;
      opacity: 0;
      border-radius: 8px;
      -webkit-transform: translate(0, 20px) scale(0.8);
      transform: translate(0, 20px) scale(0.8);
      -webkit-transform-origin: 0 0;
      transform-origin: 0 0;
      -webkit-filter: drop-shadow(0 12px 20px rgba(22, 42, 90, 0.08));
      filter: drop-shadow(0 12px 20px rgba(22, 42, 90, 0.08));
      transition: all 0.4s ease, -webkit-transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), -webkit-filter 0.3s ease 0.2s;
      transition: all 0.4s ease, transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), filter 0.3s ease 0.2s;
      transition: all 0.4s ease, transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), filter 0.3s ease 0.2s, -webkit-transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), -webkit-filter 0.3s ease 0.2s;
    }

    .selectMultiple1>ul li {
      color: #1e2330;
      background: #fff;
      padding: 12px 16px;
      cursor: pointer;
      overflow: hidden;
      position: relative;
      transition: background 0.3s ease, color 0.3s ease, opacity 0.5s ease 0.3s, border-radius 0.3s ease 0.3s, -webkit-transform 0.3s ease 0.3s;
      transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease 0.3s, opacity 0.5s ease 0.3s, border-radius 0.3s ease 0.3s;
      transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease 0.3s, opacity 0.5s ease 0.3s, border-radius 0.3s ease 0.3s, -webkit-transform 0.3s ease 0.3s;
    }

    .selectMultiple1>ul li:first-child {
      border-radius: 8px 8px 0 0;
    }

    .selectMultiple1>ul li:first-child:last-child {
      border-radius: 8px;
    }

    .selectMultiple1>ul li:last-child {
      border-radius: 0 0 8px 8px;
    }

    .selectMultiple1>ul li:last-child:first-child {
      border-radius: 8px;
    }

    .selectMultiple1>ul li:hover {
      background: #4d18ff;
      color: #fff;
    }

    .selectMultiple1>ul li:after {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      width: 6px;
      height: 6px;
      background: rgba(0, 0, 0, 0.4);
      opacity: 0;
      border-radius: 100%;
      -webkit-transform: scale(1, 1) translate(-50%, -50%);
      transform: scale(1, 1) translate(-50%, -50%);
      -webkit-transform-origin: 50% 50%;
      transform-origin: 50% 50%;
    }

    .selectMultiple1>ul li.beforeRemove {
      border-radius: 0 0 8px 8px;
    }

    .selectMultiple1>ul li.beforeRemove:first-child {
      border-radius: 8px;
    }

    .selectMultiple1>ul li.afterRemove {
      border-radius: 8px 8px 0 0;
    }

    .selectMultiple1>ul li.afterRemove:last-child {
      border-radius: 8px;
    }

    .selectMultiple1>ul li.remove {
      -webkit-transform: scale(0);
      transform: scale(0);
      opacity: 0;
    }

    .selectMultiple1>ul li.remove:after {
      -webkit-animation: ripple 0.4s ease-out;
      animation: ripple 0.4s ease-out;
    }

    .selectMultiple1>ul li.notShown {
      display: none;
      -webkit-transform: scale(0);
      transform: scale(0);
      opacity: 0;
      transition: opacity 0.4s ease, -webkit-transform 0.35s ease;
      transition: transform 0.35s ease, opacity 0.4s ease;
      transition: transform 0.35s ease, opacity 0.4s ease, -webkit-transform 0.35s ease;
    }

    .selectMultiple1>ul li.notShown.show {
      -webkit-transform: scale(1);
      transform: scale(1);
      opacity: 1;
    }

    .selectMultiple1.open>div {
      box-shadow: 0 4px 20px -1px rgba(22, 42, 90, 0.12);
    }

    .selectMultiple1.open>div .arrow:before {
      -webkit-transform: rotate(-50deg);
      transform: rotate(-50deg);
    }

    .selectMultiple1.open>div .arrow:after {
      -webkit-transform: rotate(50deg);
      transform: rotate(50deg);
    }

    .selectMultiple1.open>ul {
      -webkit-transform: translate(0, 12px) scale(1);
      transform: translate(0, 12px) scale(1);
      opacity: 1;
      visibility: visible;
      -webkit-filter: drop-shadow(0 16px 24px rgba(22, 42, 90, 0.16));
      filter: drop-shadow(0 16px 24px rgba(22, 42, 90, 0.16));
    }

    @-webkit-keyframes ripple {
      0% {
        -webkit-transform: scale(0, 0);
        transform: scale(0, 0);
        opacity: 1;
      }

      25% {
        -webkit-transform: scale(30, 30);
        transform: scale(30, 30);
        opacity: 1;
      }

      100% {
        opacity: 0;
        -webkit-transform: scale(50, 50);
        transform: scale(50, 50);
      }
    }

    @keyframes ripple {
      0% {
        -webkit-transform: scale(0, 0);
        transform: scale(0, 0);
        opacity: 1;
      }

      25% {
        -webkit-transform: scale(30, 30);
        transform: scale(30, 30);
        opacity: 1;
      }

      100% {
        opacity: 0;
        -webkit-transform: scale(50, 50);
        transform: scale(50, 50);
      }
    }

    body .selectMultiple1 {
      margin-top: 1.75rem;
    }

    body .dribbble {
      position: fixed;
      display: block;
      right: 20px;
      bottom: 20px;
      opacity: 0.5;
      transition: all 0.4s ease;
    }

    body .dribbble:hover {
      opacity: 1;
    }

    body .dribbble img {
      display: block;
      height: 36px;
    }

    .selectMultiple {
      width: 100%;
      position: relative;
    }

    .selectMultiple select {
      display: none;
    }

    .selectMultiple>div {
      position: relative;
      z-index: 2;
      padding: 8px 12px 2px 12px;
      border-radius: 8px;
      background: #fff;
      font-size: 14px;
      min-height: 44px;
      box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
      transition: box-shadow .15s ease;
    }

    .selectMultiple>div:hover {
      box-shadow: 0 4px 24px -1px rgba(22, 42, 90, 0.16);
    }

    .selectMultiple>div .arrow {
      right: 1px;
      top: 0;
      bottom: 0;
      cursor: pointer;
      width: 28px;
      position: absolute;
    }

    .selectMultiple>div .arrow:before,
    .selectMultiple>div .arrow:after {
      content: "";
      position: absolute;
      display: block;
      width: 2px;
      height: 8px;
      border-bottom: 8px solid #99a3ba;
      top: 43%;
      transition: all 0.3s ease;
    }

    .selectMultiple>div .arrow:before {
      right: 12px;
      -webkit-transform: rotate(-130deg);
      transform: rotate(-130deg);
    }

    .selectMultiple>div .arrow:after {
      left: 9px;
      -webkit-transform: rotate(130deg);
      transform: rotate(130deg);
    }

    .selectMultiple>div span {
      color: #99a3ba;
      display: block;
      position: absolute;
      left: 12px;
      cursor: pointer;
      top: 8px;
      line-height: 28px;
      transition: all 0.3s ease;
    }

    .selectMultiple>div span.hide {
      opacity: 0;
      visibility: hidden;
      -webkit-transform: translate(-4px, 0);
      transform: translate(-4px, 0);
    }

    .selectMultiple>div a {
      position: relative;
      padding: 0 24px 6px 8px;
      line-height: 28px;
      color: #1e2330;
      display: inline-block;
      vertical-align: top;
      margin: 0 6px 0 0;
    }

    .selectMultiple>div a em {
      font-style: normal;
      display: block;
      white-space: nowrap;
    }

    .selectMultiple>div a:before {
      content: "";
      left: 0;
      top: 0;
      bottom: 6px;
      width: 100%;
      position: absolute;
      display: block;
      background: rgba(228, 236, 250, 0.7);
      z-index: -1;
      border-radius: 4px;
    }

    .selectMultiple>div a i {
      cursor: pointer;
      position: absolute;
      top: 0;
      right: 0;
      width: 24px;
      height: 28px;
      display: block;
    }

    .selectMultiple>div a i:before,
    .selectMultiple>div a i:after {
      content: "";
      display: block;
      width: 2px;
      height: 10px;
      position: absolute;
      left: 50%;
      top: 50%;
      background: #4d18ff;
      border-radius: 1px;
    }

    .selectMultiple>div a i:before {
      -webkit-transform: translate(-50%, -50%) rotate(45deg);
      transform: translate(-50%, -50%) rotate(45deg);
    }

    .selectMultiple>div a i:after {
      -webkit-transform: translate(-50%, -50%) rotate(-45deg);
      transform: translate(-50%, -50%) rotate(-45deg);
    }

    .selectMultiple>div a.notShown {
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .selectMultiple>div a.notShown:before {
      width: 28px;
      transition: width 0.45s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0.2s;
    }

    .selectMultiple>div a.notShown i {
      opacity: 0;
      transition: all 0.3s ease 0.3s;
    }

    .selectMultiple>div a.notShown em {
      opacity: 0;
      -webkit-transform: translate(-6px, 0);
      transform: translate(-6px, 0);
      transition: all 0.4s ease 0.3s;
    }

    .selectMultiple>div a.notShown.shown {
      opacity: 1;
    }

    .selectMultiple>div a.notShown.shown:before {
      width: 100%;
    }

    .selectMultiple>div a.notShown.shown i {
      opacity: 1;
    }

    .selectMultiple>div a.notShown.shown em {
      opacity: 1;
      -webkit-transform: translate(0, 0);
      transform: translate(0, 0);
    }

    .selectMultiple>div a.remove:before {
      width: 28px;
      transition: width 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0s;
    }

    .selectMultiple>div a.remove i {
      opacity: 0;
      transition: all 0.3s ease 0s;
    }

    .selectMultiple>div a.remove em {
      opacity: 0;
      -webkit-transform: translate(-12px, 0);
      transform: translate(-12px, 0);
      transition: all 0.4s ease 0s;
    }

    .selectMultiple>div a.remove.disappear {
      opacity: 0;
      transition: opacity 0.5s ease 0s;
    }

    .selectMultiple>ul {
      margin: 0;
      margin-bottom: 12%;
      padding: 0;
      list-style: none;
      font-size: 16px;
      z-index: 1;
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      visibility: hidden;
      opacity: 0;
      border-radius: 8px;
      -webkit-transform: translate(0, 20px) scale(0.8);
      transform: translate(0, 20px) scale(0.8);
      -webkit-transform-origin: 0 0;
      transform-origin: 0 0;
      -webkit-filter: drop-shadow(0 12px 20px rgba(22, 42, 90, 0.08));
      filter: drop-shadow(0 12px 20px rgba(22, 42, 90, 0.08));
      transition: all 0.4s ease, -webkit-transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), -webkit-filter 0.3s ease 0.2s;
      transition: all 0.4s ease, transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), filter 0.3s ease 0.2s;
      transition: all 0.4s ease, transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), filter 0.3s ease 0.2s, -webkit-transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), -webkit-filter 0.3s ease 0.2s;
    }

    .selectMultiple>ul li {
      color: #1e2330;
      background: #fff;
      padding: 12px 16px;
      cursor: pointer;
      overflow: hidden;
      position: relative;
      transition: background 0.3s ease, color 0.3s ease, opacity 0.5s ease 0.3s, border-radius 0.3s ease 0.3s, -webkit-transform 0.3s ease 0.3s;
      transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease 0.3s, opacity 0.5s ease 0.3s, border-radius 0.3s ease 0.3s;
      transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease 0.3s, opacity 0.5s ease 0.3s, border-radius 0.3s ease 0.3s, -webkit-transform 0.3s ease 0.3s;
    }

    .selectMultiple>ul li:first-child {
      border-radius: 8px 8px 0 0;
    }

    .selectMultiple>ul li:first-child:last-child {
      border-radius: 8px;
    }

    .selectMultiple>ul li:last-child {
      border-radius: 0 0 8px 8px;
    }

    .selectMultiple>ul li:last-child:first-child {
      border-radius: 8px;
    }

    .selectMultiple>ul li:hover {
      background: #4d18ff;
      color: #fff;
    }

    .selectMultiple>ul li:after {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      width: 6px;
      height: 6px;
      background: rgba(0, 0, 0, 0.4);
      opacity: 0;
      border-radius: 100%;
      -webkit-transform: scale(1, 1) translate(-50%, -50%);
      transform: scale(1, 1) translate(-50%, -50%);
      -webkit-transform-origin: 50% 50%;
      transform-origin: 50% 50%;
    }

    .selectMultiple>ul li.beforeRemove {
      border-radius: 0 0 8px 8px;
    }

    .selectMultiple>ul li.beforeRemove:first-child {
      border-radius: 8px;
    }

    .selectMultiple>ul li.afterRemove {
      border-radius: 8px 8px 0 0;
    }

    .selectMultiple>ul li.afterRemove:last-child {
      border-radius: 8px;
    }

    .selectMultiple>ul li.remove {
      -webkit-transform: scale(0);
      transform: scale(0);
      opacity: 0;
    }

    .selectMultiple>ul li.remove:after {
      -webkit-animation: ripple 0.4s ease-out;
      animation: ripple 0.4s ease-out;
    }

    .selectMultiple>ul li.notShown {
      display: none;
      -webkit-transform: scale(0);
      transform: scale(0);
      opacity: 0;
      transition: opacity 0.4s ease, -webkit-transform 0.35s ease;
      transition: transform 0.35s ease, opacity 0.4s ease;
      transition: transform 0.35s ease, opacity 0.4s ease, -webkit-transform 0.35s ease;
    }

    .selectMultiple>ul li.notShown.show {
      -webkit-transform: scale(1);
      transform: scale(1);
      opacity: 1;
    }

    .selectMultiple.open>div {
      box-shadow: 0 4px 20px -1px rgba(22, 42, 90, 0.12);
    }

    .selectMultiple.open>div .arrow:before {
      -webkit-transform: rotate(-50deg);
      transform: rotate(-50deg);
    }

    .selectMultiple.open>div .arrow:after {
      -webkit-transform: rotate(50deg);
      transform: rotate(50deg);
    }

    .selectMultiple.open>ul {
      -webkit-transform: translate(0, 12px) scale(1);
      transform: translate(0, 12px) scale(1);
      opacity: 1;
      visibility: visible;
      -webkit-filter: drop-shadow(0 16px 24px rgba(22, 42, 90, 0.16));
      filter: drop-shadow(0 16px 24px rgba(22, 42, 90, 0.16));
    }

    @-webkit-keyframes ripple {
      0% {
        -webkit-transform: scale(0, 0);
        transform: scale(0, 0);
        opacity: 1;
      }

      25% {
        -webkit-transform: scale(30, 30);
        transform: scale(30, 30);
        opacity: 1;
      }

      100% {
        opacity: 0;
        -webkit-transform: scale(50, 50);
        transform: scale(50, 50);
      }
    }

    @keyframes ripple {
      0% {
        -webkit-transform: scale(0, 0);
        transform: scale(0, 0);
        opacity: 1;
      }

      25% {
        -webkit-transform: scale(30, 30);
        transform: scale(30, 30);
        opacity: 1;
      }

      100% {
        opacity: 0;
        -webkit-transform: scale(50, 50);
        transform: scale(50, 50);
      }
    }


    body .selectMultiple {
      margin-top: 1.75rem;
    }

    body .dribbble {
      position: fixed;
      display: block;
      right: 20px;
      bottom: 20px;
      opacity: 0.5;
      transition: all 0.4s ease;
    }

    body .dribbble:hover {
      opacity: 1;
    }

    body .dribbble img {
      display: block;
      height: 36px;
    }
  </style>
</head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">

      <!-- Brand -->
      <a class="navbar-brand pt-0" href="dashboard.php">
        <img src="./assets/img/brand/blue.png" style="max-height: 100px;" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->

      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="./assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>

        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link" href="dashboard.php">
              <i class="ni ni-tv-2 text-orange"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addUsers.php">
              <i class="fas fa-users text-yellow"></i> Add Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addExp.php">
              <i class="fas fa-flask text-green"></i> Add Experiments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addTask.php">
              <i class="fas fa-tasks text-blue"></i> Add Tasks
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="fas fa-sign-out-alt text-red"></i> Logout
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">

      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="dashboard.php">Edit EXPERIMENTS</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="editProfile.php">
              <div class="media align-items-center">

                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php
                  $email=$_SESSION['email'];echo $email;
                  ?></span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <h1 style="color:#fff;text-align:center;">Update Experimental Details</h1>

        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <h3>Fill up Experimental Credentials</h3>
              </div>
              <!-- Form -->
              <form role="form" name="form1" method="post" action="editExperiment.php" autocomplete="on">
                <input type="text" name="id" width="900" value="<?php echo $id=$_GET['experimentID']; ?>" hidden>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-vials"></i></i></span>
                    </div>
                    <input class="form-control" name="name" placeholder="Update Experiment Name" type="text" autocomplete="off" value="<?php $sel_query="Select * from `experiment1` where experimentID='$id' group by experimentID";
                $result = mysqli_query($con,$sel_query);
                //data from database is fetched so that user do not have to edit all fields but only edit those which required
				while($row = mysqli_fetch_assoc($result)) {
                echo $row["name"];}?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-book"></i></span>
                    </div>
                    <input class="form-control" name="subject" placeholder="Update Subject Associated" type="text" autocomplete="off" value="<?php $sel_query="Select * from `experiment1` where experimentID='$id' group by experimentID";
                $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {
                echo $row["subject"];}?>"required>
                  </div>
                </div>
                <select name='tasks[]' id="tasks1" multiple data-placeholder="Update tasks for this experiment ">
                  <?php
                  require("sqlconnection.php");
                  $q2="SELECT * FROM `tasks` WHERE 1 ORDER BY RAND()";
                  $result2 = mysqli_query($con,$q2);
                  foreach( $result2 as $row1 ){
                  echo "<option>" . $row1['taskName'] . "</option>";
                    }
                   ?>
                </select>
                <select name='users[]' id="experiment1" multiple data-placeholder="Update Users for this Experiment ">
                  <?php
                  require("sqlconnection.php");
                  $q2="SELECT * FROM `users` WHERE 1";
                  $result2 = mysqli_query($con,$q2);
                  foreach( $result2 as $row1 ){
                  echo "<option>" . $row1['name'] . "</option>";
                    }
                   ?>
                </select>



                <div class="text-center">
                  <button id="submitBtn" type="submit" class="btn btn-primary mt-4" name="add" value="Add">Update Experiment</button>
                </div>
              </form>
              <!-- Form End -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Core -->
  <script src="./assets/js/jquery.min.js"></script>
  <script>
  //Select 1
    $(document).ready(function() {
      //variable declaration
      var select = $("#tasks1");
      var options = select.find("option");

      var div = $("<div />").addClass("selectMultiple1");
      var active = $("<div />");
      var list = $("<ul />");
      var placeholder = select.data("placeholder");

      var span = $("<span />")
        .text(placeholder)
        .appendTo(active);

        //options hide function

      options.each(function() {
        var text = $(this).text();
        if ($(this).is(":selected")) {
          active.append($("<a />").html("<em>" + text + "</em><i></i>"));
          span.addClass("hide");
        } else {
          list.append($("<li />").html(text));
        }
      });

      active.append($("<div />").addClass("arrow"));
      div.append(active).append(list);

      select.wrap(div);
//multiple select function
      $(document).on("click", ".selectMultiple1 ul li", function(e) {
        var select = $(this)
          .parent()
          .parent();
        var li = $(this);
        if (!select.hasClass("clicked")) {
          select.addClass("clicked");
          li.prev().addClass("beforeRemove");
          li.next().addClass("afterRemove");
          li.addClass("remove");
          var a = $("<a />")
            .addClass("notShown")
            .html("<em>" + li.text() + "</em><i></i>")
            .hide()
            .appendTo(select.children("div"));
          a.slideDown(00, function() {
            setTimeout(function() {
              a.addClass("shown");
              select
                .children("div")
                .children("span")
                .addClass("hide");
              select
                .find("option:contains(" + li.text() + ")")
                .prop("selected", true);
            }, 00);
          });
          setTimeout(function() {
            if (li.prev().is(":last-child")) {
              li.prev().removeClass("beforeRemove");
            }
            if (li.next().is(":first-child")) {
              li.next().removeClass("afterRemove");
            }
            setTimeout(function() {
              li.prev().removeClass("beforeRemove");
              li.next().removeClass("afterRemove");
            }, 00);

            li.slideUp(00, function() {
              li.remove();
              select.removeClass("clicked");
            });
          }, 00);
        }
      });
//multiple select div change removal and addition function
      $(document).on("click", ".selectMultiple1 > div a", function(e) {
        var select = $(this)
          .parent()
          .parent();
        var self = $(this);
        self.removeClass().addClass("remove");
        select.addClass("open");
        setTimeout(function() {
          self.addClass("disappear");
          setTimeout(function() {
            self.animate({
                width: 0,
                height: 0,
                padding: 0,
                margin: 0
              },
              000,
              function() {
                var li = $("<li />")
                  .text(self.children("em").text())
                  .addClass("notShown")
                  .appendTo(select.find("ul"));
                li.slideDown(400, function() {
                  li.addClass("show");
                  setTimeout(function() {
                    select
                      .find(
                        "option:contains(" +
                        self.children("em").text() +
                        ")"
                      )
                      .prop("selected", false);
                    if (!select.find("option:selected").length) {
                      select
                        .children("div")
                        .children("span")
                        .removeClass("hide");
                    }
                    li.removeClass();
                  }, 000);
                });
                self.remove();
              }
            );
          }, 000);
        }, 000);
      });

      $(document).on(
        "click",
        ".selectMultiple1 > div .arrow, .selectMultiple1 > div span",
        function(e) {
          $(this)
            .parent()
            .parent()
            .toggleClass("open");
        }
      );
    });
  </script>
  <script>
  //Select 2
    $(document).ready(function() {
      //variable declaration
      var select = $("#experiment1");
      var options = select.find("option");

      var div = $("<div />").addClass("selectMultiple");
      var active = $("<div />");
      var list = $("<ul />");
      var placeholder = select.data("placeholder");

      var span = $("<span />")
        .text(placeholder)
        .appendTo(active);
//option hide function
      options.each(function() {
        var text = $(this).text();
        if ($(this).is(":selected")) {
          active.append($("<a />").html("<em>" + text + "</em><i></i>"));
          span.addClass("hide");
        } else {
          list.append($("<li />").html(text));
        }
      });

      active.append($("<div />").addClass("arrow"));
      div.append(active).append(list);

      select.wrap(div);
//select multiple functions class removal and addition
      $(document).on("click", ".selectMultiple ul li", function(e) {
        var select = $(this)
          .parent()
          .parent();
        var li = $(this);
        if (!select.hasClass("clicked")) {
          select.addClass("clicked");
          li.prev().addClass("beforeRemove");
          li.next().addClass("afterRemove");
          li.addClass("remove");
          var a = $("<a />")
            .addClass("notShown")
            .html("<em>" + li.text() + "</em><i></i>")
            .hide()
            .appendTo(select.children("div"));
          a.slideDown(400, function() {
            setTimeout(function() {
              a.addClass("shown");
              select
                .children("div")
                .children("span")
                .addClass("hide");
              select
                .find("option:contains(" + li.text() + ")")
                .prop("selected", true);
            }, 500);
          });
          setTimeout(function() {
            if (li.prev().is(":last-child")) {
              li.prev().removeClass("beforeRemove");
            }
            if (li.next().is(":first-child")) {
              li.next().removeClass("afterRemove");
            }
            setTimeout(function() {
              li.prev().removeClass("beforeRemove");
              li.next().removeClass("afterRemove");
            }, 200);

            li.slideUp(400, function() {
              li.remove();
              select.removeClass("clicked");
            });
          }, 600);
        }
      });

      $(document).on("click", ".selectMultiple > div a", function(e) {
        var select = $(this)
          .parent()
          .parent();
        var self = $(this);
        self.removeClass().addClass("remove");
        select.addClass("open");
        setTimeout(function() {
          self.addClass("disappear");
          setTimeout(function() {
            self.animate({
                width: 0,
                height: 0,
                padding: 0,
                margin: 0
              },
              300,
              function() {
                var li = $("<li />")
                  .text(self.children("em").text())
                  .addClass("notShown")
                  .appendTo(select.find("ul"));
                li.slideDown(400, function() {
                  li.addClass("show");
                  setTimeout(function() {
                    select
                      .find(
                        "option:contains(" +
                        self.children("em").text() +
                        ")"
                      )
                      .prop("selected", false);
                    if (!select.find("option:selected").length) {
                      select
                        .children("div")
                        .children("span")
                        .removeClass("hide");
                    }
                    li.removeClass();
                  }, 400);
                });
                self.remove();
              }
            );
          }, 300);
        }, 400);
      });

      $(document).on(
        "click",
        ".selectMultiple > div .arrow, .selectMultiple > div span",
        function(e) {
          $(this)
            .parent()
            .parent()
            .toggleClass("open");
        }
      );
    });
  </script>

</body>

</html>

<?php
error_reporting(0);
if(isset($_POST['add'])){
$id=$_POST['id'];
$name=$_POST['name'];
$subject=$_POST['subject'];


$q1= "SELECT * FROM `experiment1`  WHERE `name`='$name'";
$res = mysqli_query($con, $q1);
if(mysqli_num_rows($res)>0)
{
$message = "This experiment name already exists, Please try again with a new experiment name or ID";

      echo "<script type='text/javascript'>alert('$message');</script>";
	   header('location:dashboard.php');
}
else
{
//deleting the record and adding it later on same experiment id to update the experiment details
$sql="DELETE FROM `experiment1` WHERE `experimentID`='$id'";
$res= mysqli_query($con, $sql);
foreach($_POST['users'] as $user)
{
shuffle($_POST['tasks']);
$task1=implode(',',$_POST['tasks']);
$query ="INSERT INTO `experiment1`(`experimentID`, `name`, `Tasks`, `subject`, `user`) VALUES ('$id','$name','$task1', '$subject','$user')";
 mysqli_query($con, $query);

}
    $message = " This experiment is updated";
     echo "<script type='text/javascript'>alert('$message');</script>";
     echo("<script>location.href = 'dashboard.php';</script>");
}
}
?>
