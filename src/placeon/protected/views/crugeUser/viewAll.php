<h1>Current Users</h1>
<ul class="searchList" data-role="listview" data-autodividers="true" data-inset="true" data-filter="true">
<?php
    $base=Yii::app()->request->baseUrl;
    foreach ($content as $key=>$value) {
      echo  '<li  data-theme="c"><a href=' . $base . '/index.php/crugeUser/view?id=' . $value['iduser'] . '>' . $value['username'] . '</a></li>' ;
    }
    ?>
</ul>