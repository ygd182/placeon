<div data-role="panel" data-display="overlay" data-theme="a" id="mypanel">
				<ul data-role="listview" data-autodividers="false" data-inset="true" data-filter="false">
         <?php 
          foreach($this->links as $link) {
                  echo '<li data-icon="'.$link['icon'].'" data-theme="c"><a href="'.Yii::app()->request->baseUrl.'/index.php' . $link['url'].'">'.$link['name'].'</a></li>';
          }
          ?>
				</ul>
</div>

<a id="menu" href="#" data-role="button" data-icon="gear"><?php echo Yii::app()->user->name;?>'s Menu</a>
