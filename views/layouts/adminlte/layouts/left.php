<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <!--        <div class="user-panel">-->
        <!--            <div class="pull-left image">-->
        <!--                <img src="-->
        <? //= $directoryAsset ?><!--/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>-->
        <!--            </div>-->
        <!--            <div class="pull-left info">-->
        <!--                <p>Alexander Pierce</p>-->
        <!--                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        <!--            </div>-->
        <!--        </div>-->

        <!-- search form -->
        <!--        <form action="#" method="get" class="sidebar-form">-->
        <!--            <div class="input-group">-->
        <!--                <input type="text" name="q" class="form-control" placeholder="Search..."/>-->
        <!--              <span class="input-group-btn">-->
        <!--                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>-->
        <!--                </button>-->
        <!--              </span>-->
        <!--            </div>-->
        <!--        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Login', 'url' => ['user/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Data Cards',
                        'icon' => 'list-alt',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Events', 'icon' => 'file-o', 'url' => ['/datacard/datacard/index'],
                            ], [
                                'label' => 'Add Event', 'icon' => 'file-o', 'url' => ['/datacard/datacard/create'],
                            ], [
                                'label' => 'Manage Events', 'icon' => 'file-o', 'url' => ['/datacard/datacard/manage'],
                            ], [
                                'label' => 'Export Data', 'icon' => 'file-o', 'url' => ['/datacard/datacard/download-page'],
                            ],

                        ],
                    ],
                    [
                        'label' => 'Query',
                        'icon' => 'filter',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Query and Downloads', 'icon' => 'file-code-o', 'url' => ['/datacard/query/index'],],
                        ],
                    ],


                    [
                        'label' => 'Geo-Profile / Overview',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Nepal', 'icon' => 'file-code-o', 'url' => ['/datacard/overview/nepal'],],
                            ['label' => 'Provience', 'icon' => 'file-code-o', 'url' => ['/datacard/overview/provience'],],
                            ['label' => 'Districts', 'icon' => 'file-code-o', 'url' => ['/datacard/overview/districts'],],
                            ['label' => 'Local Bodies', 'icon' => 'file-code-o', 'url' => ['/datacard/overview/local-bodies'],],
                        ],
                    ],

                    [
                        'label' => 'Disaster Profile / Overview',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Multi-hazard', 'icon' => 'file-code-o', 'url' => ['/datacard/reports/multi-hazard-profile'],],
//                            ['label' => 'Disaster Type', 'icon' => 'circle-o', 'url' => '#',],
//                            ['label' => 'Provience', 'icon' => 'file-code-o', 'url' => ['/datacard/reports/by-provience'],],
//                            ['label' => 'District', 'icon' => 'file-code-o', 'url' => ['/datacard/reports/by-district'],],
//                            ['label' => 'Municipality', 'icon' => 'file-code-o', 'url' => ['/datacard/reports/by-municipality'],],
//                            ['label' => 'Disaster Type', 'icon' => 'file-code-o', 'url' => ['/datacard/reports/by-municipality'],],
                        ],
                    ],

                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'visible' => (isset(Yii::$app->user->identity) && Yii::$app->user->identity->isAdmin),
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                        ],
                    ],


//                    [
//                        'label' => 'Some tools',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],

                ],
            ]
        ) ?>

    </section>

</aside>
