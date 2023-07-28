<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="<?= Yii::app()->request->baseUrl; ?>/">
                <img src="https://storage.googleapis.com/site-upload-storage/sites/logo-300-200.jpg" height="80"
                    alt="<?php echo CHtml::encode(Yii::app()->name); ?>" loading="lazy" />
            </a>
            <!-- mainmenu -->
            <div id="mainmenu">
                <?php $this->widget(
                    'zii.widgets.CMenu',
                    array(
                        'items' => array(
                            array('label' => 'Início', 'url' => array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label' => 'Sobre', 'url' => array('/site/page', 'view' => 'about')),
                            array('label' => 'Contato', 'url' => array('/site/contact')),

                        ),
                        'itemCssClass' => 'btn',
                        'encodeLabel' => false,
                        'activeCssClass' => 'active btn-white',
                    )
                ); ?>
            </div>
        </div>


    </div>
    
    <!-- Example single danger button -->
    <div class="dropleft">
        <?php if (Yii::app()->user->isGuest): ?>
            <?php echo CHtml::link('Login', array('/site/login'), ['class' => 'btn btn-sm btn-primary']); ?>
        <?php else: ?>
            <div class="nav-item dropdown">
                <a class="btn btn-outline-light nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo Yii::app()->user->photo ?>" class="rounded-circle" height="40" alt="" loading="lazy" />
                    <?php echo Yii::app()->user->title ?>
                </a>
                <ul class="dropdown-menu">
                    <?php echo CHtml::link('Logout', array('/site/logout'), ['class' => 'dropdown-item']); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->