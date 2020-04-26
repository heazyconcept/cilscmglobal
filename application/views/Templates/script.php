<script src="<?php echo asset_url('vendor/babel-external-helpers/babel-external-helpers599c.js?v4.0.2') ?>"></script>
 
  <script src="<?php echo asset_url('vendor/bootstrap/bootstrap.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/animsition/animsition.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/mousewheel/jquery.mousewheel599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/asscrollbar/jquery-asScrollbar.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/asscrollable/jquery-asScrollable.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/ashoverscroll/jquery-asHoverScroll.min599c.js?v4.0.2') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- Plugins -->
  <script src="<?php echo asset_url('vendor/switchery/switchery.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/intro-js/intro.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/screenfull/screenfull599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/slidepanel/jquery-slidePanel.min599c.js?v4.0.2') ?>"></script>

  <script src="<?php echo asset_url('vendor/datatables.net/jquery.dataTables599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/datatables.net-bs4/dataTables.bootstrap4599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/datatables.net-fixedheader/dataTables.fixedHeader.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/datatables.net-rowgroup/dataTables.rowGroup.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/datatables.net-scroller/dataTables.scroller.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/datatables.net-responsive/dataTables.responsive.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/datatables.net-responsive-bs4/responsive.bootstrap4.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/datatables.net-buttons/dataTables.buttons.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/datatables.net-buttons/buttons.html5.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/datatables.net-buttons/buttons.flash.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/datatables.net-buttons/buttons.print.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/datatables.net-buttons/buttons.colVis.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('vendor/datatables.net-buttons-bs4/buttons.bootstrap4.min599c.js?v4.0.2') ?>"></script>

  <!-- Scripts -->
  <script src="<?php echo asset_url('js/Component.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('js/Plugin.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('js/Base.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('js/Config.min599c.js?v4.0.2') ?>"></script>

  <script src="<?php echo asset_url('js/Section/Menubar.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('js/Section/Sidebar.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('js/Section/PageAside.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('js/Plugin/menu.min599c.js?v4.0.2') ?>"></script>

  <!-- Config -->
  <script src="<?php echo asset_url('js/config/colors.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('js/config/tour.min599c.js?v4.0.2') ?>"></script>
  <script>
    Config.set('assets', '../assets');
  </script>

  <!-- Page -->
  <script src="<?php echo asset_url('js/Site.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('js/Plugin/asscrollable.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('js/Plugin/slidepanel.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('js/Plugin/switchery.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('js/Plugin/datatables.min599c.js?v4.0.2') ?>"></script>
  <script src="<?php echo asset_url('js/loading.js') ?>"></script>
  <script src="<?php echo asset_url('js/custom.js') ?>"></script>

  <script>
     $(document).ajaxStart(function () {
      $('body').loading('start');
      });
      $(document).ajaxStop(function () {
        $('body').loading('stop');
        });
    </script>
  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>


  <!-- Google Analytics -->
  