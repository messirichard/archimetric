<div class="leftmenu">        
    <ul class="nav nav-tabs nav-stacked">
        <li class="nav-header">Navigation</li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/slide/index')); ?>"><span class="fa fa-camera"></span> <?php echo Tt::t('admin', 'Slide') ?></a></li>
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/index')); ?>"><span class="fa fa-info"></span> <?php echo Tt::t('admin', 'About') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/index')); ?>">Overview About</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/service/index')); ?>">Service</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/leader/index')); ?>">Leadership</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/admin/gallery/index')); ?>"><span class="fa fa-tag"></span> <?php echo Tt::t('admin', 'Project') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/gallery/index')); ?>">Lihat Project</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/gallery/create')); ?>">Tambah Project</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/category/index')); ?>">Lihat Kategori</a></li>
            </ul>
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/contact/index')); ?>"><span class="fa fa-phone"></span> <?php echo Tt::t('admin', 'Contact Us') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/career/index')); ?>"><span class="fa fa-user"></span> <?php echo Tt::t('admin', 'Career') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/administrator/index')); ?>"><span class="fa fa-group"></span> <?php echo Tt::t('admin', 'Administrator') ?></a></li>
        <?php /*
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/index')); ?>"><span class="fa fa-credit-card"></span> <?php echo Tt::t('admin', 'About') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/index')); ?>">About</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/facility/index')); ?>">Product Facility</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/admin/gallery/index')); ?>"><span class="fa fa-tag"></span> <?php echo Tt::t('admin', 'Produk') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/gallery/index')); ?>">Lihat Produk</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/gallery/create')); ?>">Tambah Produk</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/category/index')); ?>">Lihat Kategori</a></li>
            </ul>
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/quality/index')); ?>"><span class="fa fa-star"></span> <?php echo Tt::t('admin', 'Quality Statement') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/contact/index')); ?>"><span class="fa fa-group"></span> <?php echo Tt::t('admin', 'Contact Us') ?></a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/brand/index')); ?>">Lihat Brand</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/brosur/index')); ?>">Lihat Library Brosur</a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/artikel/index')); ?>"><span class="fa fa-list"></span> <?php echo Tt::t('admin', 'Artikel') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/katalog/index')); ?>"><span class="fa fa-list"></span> <?php echo Tt::t('admin', 'Katalog') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/promo/index')); ?>"><span class="fa fa-list"></span> <?php echo Tt::t('admin', 'Promo') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/banner/index')); ?>"><span class="fa fa-image"></span> <?php echo Tt::t('admin', 'Banner') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/customer/index')); ?>"><span class="fa fa-group"></span> <?php echo Tt::t('admin', 'Member') ?></a></li>
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/admin/pages/index')); ?>"><span class="fa fa-folder-open"></span> <?php echo Tt::t('admin', 'Pages') ?></a>
            <ul>
                <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/pages/update', 'id'=>3)); ?>">About US</a></li> -->
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/blog/index')); ?>">Blog/Artikel</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/pages/update', 'id'=>3)); ?>">About</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/pages/update', 'id'=>9)); ?>">Company</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/pages/update', 'id'=>10)); ?>">Resource & Facilities</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/pages/update', 'id'=>4)); ?>">Contact US</a></li>
            </ul>
        </li>
        */ ?>
        <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/order/index')); ?>"><span class="fa fa-shopping-cart"></span> <?php echo Tt::t('admin', 'Orders') ?></a></li> -->
        <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/customer/index')); ?>"><span class="fa fa-group"></span> <?php echo Tt::t('admin', 'Customers') ?></a></li> -->
        <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/dealer/index')); ?>"><span class="fa fa-wrench"></span> <?php echo Tt::t('admin', 'Dealer') ?></a></li> -->
        <!-- <li><a href="#"><span class="fa fa-bullhorn"></span> <?php echo Tt::t('admin', 'Promotions') ?></a></li> -->
        <!-- <li><a href="#"><span class="fa fa-file-text-o"></span> <?php echo Tt::t('admin', 'Reports') ?></a></li> -->
        <!-- class="dropdown" -->
             <!--  <ul>
        <li><a href="<?php echo CHtml::normalizeUrl(array('setting/index')); ?>"><span class="fa fa-cogs"></span> <?php echo Tt::t('admin', 'General Setting') ?></a>
                <li class="active"><a href="<?php echo CHtml::normalizeUrl(array('/admin/administrator/index')); ?>">Administrator Manager</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/language/index')); ?>">Language (Bahasa)</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/access_block/index')); ?>">Access Blok</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/contact/index')); ?>">Contact & Form Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/meta_page/index')); ?>">Default Meta Page</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/google_tools/index')); ?>">Google Tools</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/#/index')); ?>">Import/Export Product</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/purechat/index')); ?>">Integrasi PureChat</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/invoice_setting/index')); ?>">Invoice Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/logo_setting/index')); ?>">Logo Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/mail_setting/index')); ?>">Mail Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/mailchimp/index')); ?>">MailChimp</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/marketplace/index')); ?>">Market Place</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/mobile_text/index')); ?>">Mobile Text Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/payment/index')); ?>">Payment Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/shipping/index')); ?>">Pengaturan Shipping</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/popOut/index')); ?>">Setting PopOut</a></li>
            </ul> -->
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/home/logout')); ?>"><span class="fa fa fa-sign-out"></span> Logout</a></li>
    </ul>
</div><!--leftmenu-->
