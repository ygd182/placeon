<h1>Friend List</h1>
<ul class="friendsList" data-role="listview" data-autodividers="true" data-inset="true" data-filter="true">
<?php
//print_r( $content);
$base=Yii::app()->request->baseUrl;
foreach ($content as $key=>$value) {
		echo  '<li  data-theme="c"><a href=' . $base . '/index.php/crugeUser/view?id=' . $value['iduser'] . '>' . $value['username'] . '</a></li>' ;
}
?>
</ul> 