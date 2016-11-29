<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3><span>emPros</span> - beszéddallam elemző</h3>
            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>A program az élőnyelvi kommunikációban előforduló verbális megnyilatkozások intonációjának elemzésére és lejegyzésére szolgál. Az archivált hangfelvételekből kinyerhető akusztikai paraméterek beszélőnkénti feldolgozása
                és stilizálása után az interakcióban résztvevők egyedi hangterjedelméhez viszonyítva címkézi fel a megnyilatkozások hanglejtését. 
                Elsősorban több résztvevős interakciók elemzéséhez készült, de felolvasott szövegek, monologikus közlések feldolgozására is használható.</p>
            <h5>Mi a bemenet?</h5>
            <p>A társalgást rögzítő hangfájl és egy hozzá tartozó annotáció, amely a megnyilatkozások időbeli pozícióját beszélőnként külön tengelyen (annotációs szinten)
                tartalmazza. A beszélők számára, a megnyilatkozások tagolására és a feliratok tartalmára vonatkozóan nincs semmilyen megkötés. Az üres címkék a kérdéses beszélő hallgatásaként értelmeződnek.
            </p>
            <h5>Mi a kimenet?</h5>
            <p>A kimenetként kapott annotáció minden beszélő esetén 4 szinten jellemzi a megnyilatkozásokat. Az első szint a megnyilatkozásokat dallammenetekre tagolja, ahol minden dallamenet a "rise", "fall", "descending", "ascending", "level" kategóriák
                valamelyikét kapja meg. A második szint a dallamenetek kezdő és végpontjait helyezi el a beszélő egyedi, öt szintre felosztott hangterjedelmében (L2 &lt; L1 &lt; M &lt; H1 &lt; H2). 
                A harmadik szint az előző szint relatív értékeihez az eredeti, Hertzben mért értékeket társítja hozzá. A negyedik szint a beszéd zöngés ("V") és zöngétlen ("U") szakaszait különíti el.</p>
            <h5>Egy példa a működésre.</h5>
            <p>A forráskód <i>input</i> könyvtárában elhelyezett példa (<i>sample.wav</i>, <i>sample.TextGrid</i>) egy dialógus archivált hangfelvételét (a felvételen az anonimizálás érdekében csak a beszélők intonációja hallható) és a megnyilatkozások beszélőnkénti ("speakerA" és "speakerB")
                intervallumait tartalmazza. A kimenet az <i>output</i> könytárban található <i>sample_pitch.TextGrid</i> fájl, ami 8 (4 + 4) annotációs szinten jegyzi le a megnyilatkozások intonációját. Az átfedő beszédek nem kerülnek elemzésre.</p>
            <h4>Fejlesztőknek</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Forrás</td>
                        <td>
                            <a href="https://github.com/szekrenyesi/prosotool" target="_blank">https://github.com/szekrenyesi/prosotool</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Forrásnyelv</td>
                        <td>Praat (6.0.13) szkript</td>
                    </tr>
                    <tr>
                        <td>Input</td>
                        <td>Minimális esetben egy .wav formátumú hangfájl és egy azonos nevű, Praat TextGrid formátumú szövegfájl, de a bemeneti <i>input</i> mappában ezekből tetszőleges számú pár (hang + annotáció) elhelyezhető.</td>
                    </tr>
                    <tr>
                        <td>Output</td>
                        <td>Praat TextGrid formátumú szövegfájl, amely az <i>output</i> mappába kerül. Elnevezési konvenció: [bemenet neve] + "_pitch". Az output mappában további, az egyes futtatások részeredményeit tartalmazó (az eredeti bemenetek nevét követő) almappák is keletkeznek.
                            Az "sp_sep" mappában a beszélők hangjának izolált, az átfedő beszédektől megtisztított, az előfeldolgozás során generált verziója található.</td>
                    </tr>
                    <tr>
                        <td>Futtatás</td>
                        <td>                            
                            <span class="code">Praat prosotool.praat input 2 1.5 dynamic windows</span>
                            <br>Az opciók jelentése és értéktartománya:
                            <ul>
                                <li><i>input</i> : A bemeneti könyvtár elérési útja. Értéktartomány: sztring
                                <li><i>2</i> : Az F0 görbe stilizálásának felbontása. Magasabb érték erősebb stilizálást (durvább felbontást) eredményez. Értéktartomány: egész szám
                                <li><i>1.5</i> : Az F0 görbe simítását meghatározó paraméter. Alacsonyabb érték erősebb simítást eredményez. Értéktartomány: valós szám
                                <li><i>dynamic</i> : Az F0 mérések paramétereinek (alsó és felső küszöb) meghatározási módja. Értéktartomány: standard | dynamic
                                <li><i>windows</i> : Futtatási környezet. Megadása könyvtárműveletek miatt szükséges. Értéktartomány: windows | unix
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Licensz</td>
                        <td>GPL</td>
                    </tr>                   
                </table>
            </div>
        </article>
    </div>
</section>