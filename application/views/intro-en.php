<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">        
        <article class="introduction">
            <h3 class="text-center">Üdvözöljük<br/> az e-magyar.hu Digitális Nyelvfeldolgozó Rendszer honlapján!</h3>
            <br/>
            <br/>
            <p>
                Az <strong>e-magyar.hu</strong> rendszer a magyar nyelv gépi elemzésének alapvető eszközeit tartalmazza egy integrált, szabványos keretben.
                Olyan eszközöket adunk közre, amelyek külön-külön és rendszerbe szervezve is hasznosak a magyar nyelvű szöveggel, 
                beszéddel foglalkozó kutatók, intelligens alkalmazást fejlesztők és a nagyközönség számára is.
                Ezek az eszközök nélkülözhetetlen infrastruktúrát nyújtanak a magyar nyelv digitális elemzésére,
                a magyar digitális nyelvhasználat támogatására.
            </p>
            <p>
                A magyar nyelv számítógépes elemzése nem (csupán) a nyelvészek érdeklődését szolgálja.
                A digitális kommunikáció korában manapság laptopok, tabletek és főleg okostelefonok segítségével érintkezünk egymással,
                és kommunikálunk egyre inkább gépi rendszerekkel.
                Mindez azonban továbbra is emberi nyelven történik, ami feltételezi azt, hogy ezeknek az eszközöknek és gépi rendszereknek
                nyelvileg is okosodniuk kell ahhoz, hogy hasznos segítőink legyenek. 
                A távlati cél az, hogy a gépi rendszerek, alkalmazások értsenek a nyelvünkön.
                Bár ettől még távol vagyunk, de az itt közreadott eszközök az első lépést jelentik ebben az irányban.
                Nélkülük nem születhetnek magyar nyelvű intelligens alkalmazások, és tágabb értelemben nélkülük nem lehetséges
                felzárkóztatni a magyar nyelvet a digitális térben a nagy támogatottsággal rendelkező nyelvekhez.
            </p>            
            <p>
                Fontos cél volt, hogy az elemző eszközöket nyílt forráskóddal szabadon elérhetővé tegyük a kutatás-fejlesztés és
                az ipari felhasználás számára. A szakmai felhasználók, fejlesztők mellett a technológiai kérdésekben járatlan kutatók
                illetve a nagyközönség igényeit két módon is igyekszünk kiszolgálni. Egyrészt a honlapon üzemeltetünk egy <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/parser">webszolgáltatást</a>,
                amely az oldalra bemásolt szövegeket elemzett alakban adja vissza. Az összetettebb elemzést igénylők az e-magyar.hu eszközöket
                beépülő modulként használhatják a nemzetközileg is ismert GATE nyelvelemző rendszerben.
                (Erről a lehetőségről további részletek <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/gate">itt</a> találhatók).
            </p>
            <br/>
            <p>
                Az <strong>e-magyar.hu</strong> rendszer a Magyar Tudományos Akadémia támogatásával készült a 2015-ben kiírt
                infrastruktúrafejlesztési pályázat keretében. A munkálatok a pályázat kedvezményezettje, a Nyelvtudományi Intézet
                koordinálásával széleskörű együttműködés keretében folytak, melyben részt vett a hazai nyelvtechnológia számos vezető
                kutatás-fejlesztő műhelye. A kifejlesztett új infrastruktúra továbbfejlesztette, szabványosította és integrálta a különböző
                műhelyekben készült eszközöket. 
            </p>
            <p>
                Az infrastruktúra két részből áll. Az egyik rész az írott szöveg elemzésével foglalkozik (részletesebben lásd <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/textoverview">itt</a>),
                a másik rész a beszédfeldolgozást segíti egy beszédadatbázissal és beszédelemző modulokkal (további információ <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/speechmodules/speechoverview">itt</a>). 
                A munkálatokat <strong>Váradi Tamás</strong> koordinálta, a szövegfeldolgozó részt <strong>Oravecz Csaba</strong>, a beszédfeldolgozási munkát <strong>Kornai András</strong> irányította.
            </p>
            <br/>
            <br/>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
                    <p>
                        Közreműködő partner intézetek:
                    </p>
                    <p>
                        <a href="http://www.nytud.hu/" target="_blank">MTA Nyelvtudományi Intézet</a><br/>
                        <a href="http://www.aitia.ai/" target="_blank">AITIA International Zrt.</a><br/>
                        <a href="http://www.u-szeged.hu/" target="_blank">Szegedi Tudományegyetem</a><br/>
                        <a href="https://www.sztaki.hu/mtasztaki/az_intezet/" target="_blank">MTA SZTAKI</a><br/>
                        <a href="https://ppke.hu/" target="_blank">Pázmány Péter Katolikus Egyetem</a><br/>
                        <a href="http://www.morphologic.hu/" target="_blank">Morphologic Kft.</a>
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">
                    <img src="<?php echo base_url(); ?>css/images/photo.jpg" class="img-responsive thumbnail" />
                </div>
            </div>            
        </article>
    </div>
</section>