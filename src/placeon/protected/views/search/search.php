<h1>Current Users</h1>
<ul class="searchList" data-role="listview" data-autodividers="true" data-inset="true" data-filter="true">
<?php
    $i=0;
    $base=Yii::app()->request->baseUrl;
    foreach ($content as $key=>$value) {
      if($i!=0)
        echo  '<li  data-theme="c"><a href=' . $base . '/index.php/search/view?id=' . $value['iduser'] . '>' . $value['username'] . '</a></li>' ;
      $i=$i+1;
    }
    ?>
</ul>