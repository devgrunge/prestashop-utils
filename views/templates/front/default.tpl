{**
 * 2007-2019 Frédéric BENOIST
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *  @author    Frédéric BENOIST
 *  @copyright 2013-2019 Frédéric BENOIST <https://www.fbenoist.com/>
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *}

{extends file=$layout}

{block name='content'}
 <!DOCTYPE html>
<html>
<head>
{*<link rel="stylesheet" href="../../css/sorep_catalogslider.css" />*}
<title>Catalog Slider</title>
</head>
<body>
<h1 class="catalog-carousel-title">Catálogos</h1>
===> {$getContent.$acessory_data} {$sql|dump}
<ul class="side-by-side-list">
<li class="products-list">
<div class="background-family-carousel"> 
<img class="product-example-carousel" src"{$link->getCatImageLink($cat['link_rewrite'], $cat['id_category'])}" alt="Product example" />
<h4 class="product-type-title">Parafusos 2020</h4>
<h6 class="product-type-subtitle">Brandenburguer</h6>
</div>
</li>
<li class="products-list">
<div class="background-family-carousel"> 
<img class="product-example-carousel" src"" alt="Product example" />
<h4 class="product-type-title">Parafusos 2020</h4>
<h6 class="product-type-subtitle">Brandenburguer</h6>
</div>
</li>
<li class="products-list">
<div class="background-family-carousel"> 
<img class="product-example-carousel" src"" alt="Product example" />
<h4 class="product-type-title">Parafusos 2020</h4>
<h6 class="product-type-subtitle">Brandenburguer</h6>
</div>
</li>
<li class="products-list">
<div class="background-family-carousel"> 
<img class="product-example-carousel" src"" alt="Product example" />
<h4 class="product-type-title">Parafusos 2020</h4>
<h6 class="product-type-subtitle">Brandenburguer</h6>
</div>
</li>
<li class="products-list">
<div class="background-family-carousel"> 
<img class="product-example-carousel" src"" alt="Product example" />
<h4 class="product-type-title">Parafusos 2020</h4>
<h6 class="product-type-subtitle">Brandenburguer</h6>
</div>
</li>
</ul>

{/block}