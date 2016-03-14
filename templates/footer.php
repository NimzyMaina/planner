<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });

</script>
<!--script-->
<script src="js/jquery.chocolat.js"></script>
<!--light-box-files -->
<script type="text/javascript">
    $(function() {
        $('.img-top a').Chocolat();
    });
</script>
<!--footer-->
<div class="footer">
    <div class="container">
        <div class="footer-row">
            <div class="col-md-3 footer-grids">
                <h2><a href="<?=asset('')?>">The Planner</a></h2>
                <p><a href="mailto:example@mail.com">mail@example.com</a></p>
                <p>+2 000 222 1111</p>
            </div>
            <div class="col-md-3 footer-grids">
                <h3>Navigation</h3>
                <ul>
                    <li><a href="<?=asset('')?>">Home</a></li>
                    <li><a href="about.html">About us</a></li>
                    <li><a href="<?=asset('/vendors')?>">Vendors</a></li>
                    <li><a href="typo.html">Typo</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grids">
                <h3>Support</h3>
                <ul>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Lemollisollis</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grids">
                <h3>Newsletter</h3>
                <p>It was popularised in the 1960s with the release Ipsum. <p>
                <form>
                    <input type="text" class="text" value="Enter Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}">
                    <input type="submit" value="Go">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container">
        <p>Copyright © <?=date('Y')?> The Planner. All rights reserved | Design by <a href="#">Dolly Cinta</a></p>
    </div>
</div>
<!--//footer-->
<!--smooth-scrolling-of-move-up-->
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!--//smooth-scrolling-of-move-up-->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.js"> </script>
</body>
</html>