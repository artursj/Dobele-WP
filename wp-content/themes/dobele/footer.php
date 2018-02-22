 <footer>
        <div class="section-content">
            <div class="row">
                <div class="col-sm-3 info">
                    <?php
                    if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    }
                    ?>
                    <ul>
                        <li><i class="fa fa-map-marker"></i><p>Brīvības iela 7, Dobele, Dobeles nov., LV-3701, Latvija</p></li>
                        <li><i class="fa fa-phone"></i><p>63781740; Fakss: 63781740</p></li>
                        <li><i class="fa fa-envelope-o"></i><p>piuac@dobele.lv</p></li>
                        <li><i class="fa fa-clock-o"></i><p>P-P 10:00 - 18:00, S, Sv. slēgts</p></li>
                    </ul>
                </div>
                <div class="col-sm-3 hidden-md-down">
                    <p class="footer-menu-title">Kursi</p>
                    <ul>
                        <li class="footer-menu-item"><a href="#">Informācijas tehnoloģijas</a></li>
                        <li class="footer-menu-item"><a href="#">Valodas</a></li>
                        <li class="footer-menu-item"><a href="#">Uzņēmējdarbība</a></li>
                        <li class="footer-menu-item"><a href="#">Intrešu izglītība</a></li>
                        <li class="footer-menu-item"><a href="#">Tālmācība</a></li>
                        <li class="footer-menu-item"><a href="#">Citi kursi</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 hidden-md-down">
                    <p class="footer-menu-title">Pakalpojumi</p>
                    <ul>
                        <li class="footer-menu-item"><a href="#">Telpu noma</a></li>
                        <li class="footer-menu-item"><a href="#">Prezentācijas iekārtu noma</a</li>
                        <li class="footer-menu-item"><a href="#">Biroja pakalpojumi</a></li>
                        <li class="footer-menu-item"><a href="#">ECDL testēšanas centrs</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <p class="footer-menu-title">Pierakstīties jaunumiem</p>
                    <p class="footer-text">Esi kursā par Dobeles PIUAC aktuālāko un svaigāko!</p>
                    <form id="newsletter" method="post">
                        <div class="input-group">
                           <input class="form-control" type="email" name="email" placeholder="e-pasts"/>
                            <span class="input-group-btn">
                                <button type="submit" name="submit">nosūtīt</button>
                            </span>
                            <p class="message"></p>
                        </div>
                    </form>
                </div>
            </div>
                <hr/>
                <p class="footer-text copyright">&copy; 2016 Dobeles PIUAC, Visas tiessības aizsargātas</p>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>