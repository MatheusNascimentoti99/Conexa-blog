<!-- Navbar -->
<nav class="fixed-top navbar navbar-expand-lg navbar-light bg-light shadow-lg px-3">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="<?= Yii::app()->request->baseUrl; ?>/">
            <img src="https://storage.googleapis.com/site-upload-storage/sites/logo-300-200.jpg" height="80"
                alt="<?php echo CHtml::encode(Yii::app()->name); ?>" loading="lazy" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- mainmenu -->
            <?php $this->widget(
                'zii.widgets.CMenu',
                array(
                    'items' => array(
                        array('label' => 'Início', 'url' => array('/post/index'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Contato', 'url' => array('/site/contact')),
                        array('label' => 'Nova publicação', 'url' => array('post/create'), 'visible' => !Yii::app()->user->isGuest),

                    ),
                    'itemCssClass' => 'btn ',
                    'encodeLabel' => false,
                    'activeCssClass' => 'shadow-lg text-success border-bottom',
                    'htmlOptions' => array('class' => 'navbar-nav me-auto'),
                    'id' => "mainmenu"
                )
            ); ?>

            <?php if (Yii::app()->user->isGuest): ?>
                <div class="btn">
                    <?php echo CHtml::link('Login', array('/site/login'), ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            <?php else: ?>

                <div class="d-flex flex-row align-items-center justify-center">
                    <img src="<?php echo Yii::app()->user->photo ?>" class="rounded-circle" height="40" alt=""
                        loading="lazy" />
                    <!-- Space -->
                    <span class="me-2">

                        <?php echo Yii::app()->user->title ?>
                    </span>
                    <?php echo CHtml::link('(Sair)', array('/site/logout'), []); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>
<!-- Navbar -->