<header class="col-md-12">
    <div class="bwm">
        <h1>
            <?= $this->Html->image('watermelon.png', ['class' => 'img-rounded' ,'alt' => 'WaterMelon', 'height' => '100px', 'width' => '100px']); ?>
            BeWaterMelon
        </h1>
    </div>
    <div class="locale">
        <?= $this->Html->link(
              $this->Html->image('locale/english.png', array('alt' => 'English', 'class' => 'localeimg', 'escape' => false)),
              array('controller' => 'App', 'action' => 'setLanguage', 'en_US'),
              array('class' => 'footerlink', 'escape' => false)
            )
        ?>
        <?= $this->Html->link(
            $this->Html->image('locale/spanish.png', array('alt' => 'Spanish', 'class' => 'localeimg', 'escape' => false)),
            array('controller' => 'App', 'action' => 'setLanguage', 'es'),
            array('class' => 'footerlink', 'escape' => false)
          )
        ?>
    </div>
</header>
