                </div>
                <!-- end #main -->
            </div>
            <!-- end .main-container -->

            <!-- .footer-container -->
            <div class="footer-container clearfix">

                <!-- <div class="footer-widgets wrapper">
                   <?php get_sidebar('footer'); ?>
                </div> -->

                <footer class="wrapper">
                    <!-- begin copyright -->
					<?php echo of_get_option('footer_copyright')  ?>
					<!-- end copyright -->

                </footer>
            </div>
            <!-- end .footer-container -->

        </div>
        <!-- end #page -->

	<?php wp_footer(); ?>

	</body>
</html>
