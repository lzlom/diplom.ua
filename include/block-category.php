<div id="block-category">
<p class="header-title">Категории товаров</p>
<ul>
<li><a id="index1"><img src="/images/shoes-icon.png" id="shoes-images"/>Футбольная обувь</a>
<ul class="category-section">
<li><a href="view_cat.php?type=shoes"><b>Все модели</b></a></li>
<?php
$result=mysql_query("SELECT * FROM category WHERE type='shoes'",$link);
if(mysql_num_rows($result)>0){
    $row=mysql_fetch_array($result);
    do{
        echo '
        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
        ';}
    while($row=mysql_fetch_array($result));
}?>
</ul>


</li>

<li><a id="index2"><img src="/images/ball-icon.png" id="ball-images"/>Футбольные мячи</a>
<ul class="category-section">
<li><a href="view_cat.php?type=ball"><b>Все модели</b></a></li>
<?php
$result=mysql_query("SELECT * FROM category WHERE type='ball'",$link);
if(mysql_num_rows($result)>0){
    $row=mysql_fetch_array($result);
    do{
        echo '
        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
        ';}
    while($row=mysql_fetch_array($result));
}?>



</ul>
</li>

<li><a id="index3"><img src="/images/amunition-icon.png" id="amunition-images"/>Футбольная форма</a>
<ul class="category-section">
<li><a href="view_cat.php?type=amunition"><b>Все модели</b></a></li>
<?php
$result=mysql_query("SELECT * FROM category WHERE type='amunition'",$link);
if(mysql_num_rows($result)>0){
    $row=mysql_fetch_array($result);
    do{
        echo '
        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
        ';}
    while($row=mysql_fetch_array($result));
}?>


</ul>


</li>


</ul>
</div>