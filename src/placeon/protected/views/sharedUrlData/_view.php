<?php
/* @var $this SharedUrlDataController */
/* @var $data SharedUrlData */
?>

<div class="view">
	<?php echo CHtml::link(CHtml::encode($data->url),CHtml::encode($data->url), array('class' => 'livePreview')); ?>
	<br />
  
       <textarea class="hidden" placeholder="write here"><?php echo CHtml::encode($data->url);?></textarea>
        <div class="liveurl-loader"></div>
        
        <div class="liveurl">
            <div class="close" title="Entfernen"></div>
            <div class="inner">
                <div class="image"> </div>
                <div class="details">
                    <div class="info">
                        <div class="title"> </div>
                        <div class="description"> </div> 
                        <div class="url"> </div>
                    </div>

                    <div class="thumbnail">
                        <div class="pictures">
                            <div class="controls">
                                <div class="prev button inactive"></div>
                                <div class="next button inactive"></div>
                                <div class="count">
                                    <span class="current">0</span><span> , </span><span class="max">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video"></div>
                </div>

            </div>
        </div>

</div>