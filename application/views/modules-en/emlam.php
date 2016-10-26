<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>

            <h3 id="emlam"><span>emLam</span> - nyelvmodell</h3>
            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>A nyelvmodellezés fő feladata más nyelvi eszközöket támogatni. Fő célja, hogy megmondja, egy-egy szó, mondat,
                vagy egy egész szöveg mennyire „magyaros”, mennyire „mondanak ilyesmit az emberek”. Hasznos például beszédfelismerésben,
                ahol több alternatíva közül segít kiválasztani a legvalószínűbbet (pl. „a hosszú béke” vagy „a hosszú béka”).
                Hasonló modelleket használnak a szöveges keresők az éppen beírthoz hasonló keresőkifejezések listázásához.
                A modellek ezen kívül alkalmazhatók szövegek generálásához is.</p>
            <h5>Mi a bemenet?</h5>
            <p>Ha csak azt szeretnénk tudni, hogy az általunk írt szöveg mennyire hasonlít például
                a <a href="http://mnsz.nytud.hu/" target="_blank">Magyar Nemzeti Szövegtárban</a> megtalálhatókra,
                csak írjunk be neki egy mondatot, vagy bekezdést.</p>
            <h5>Mi a kimenet?</h5>
            <p>A kimenet alapesetben a szövegünk valószínűsége.</p>
            <h5>Egy példa a működésre.</h5>
            <p>Ha például a modell szerint egy az egymillióban, akkor átlagosan egymillióból egy pont a mi mondatunk lesz. 
                Generáló üzemmódban a modell szöveget is tud írni, különösebb konzisztenciát elvárni tőle azonban nem érdemes.
            </p>

            <br/>

            <h4>Fejlesztőknek</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Forrás</td>
                        <td><a href="<?php echo base_url(); ?>emlam/lemmad_u50_krs_lm5.gz" download>egy deglutenizált (ragok külön tokenek) 5-gram modell</a></td>
                    </tr>
                    <tr>
                        <td>Forrásnyelv</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Input</td>
                        <td>Soronként egy mondat, a tokenek között space (tokenizálásra használható az emToken). A fenti változatnál a lemma (esetleg képzőkkel együtt) és a ragok külön tokenek.</td>
                    </tr>
                    <tr>
                        <td>Output</td>
                        <td>A szövegünk valószínűsége, opcionálisan mondatokra, szavakra lebontva.</td>
                    </tr>
                    <tr>
                        <td>Futtatás</td>
                        <td>
                            Az SRILM toolkit ngram nevű programjával:
                            <br/>
                            <span class="code">ngram -order 5 -lm lemmad_u50_krs.lm5.gz -ppl &lt;szöveg file&gt;</span>                            
                            <br/>
                            Paraméterek: -order 5: 5-grammokat használjon (jelenleg ez a legnagyobb); -lm lemmad_u50_krs.lm5.gz: a fenti "gluténmentes" modellt használja, ami az 50-nél nagyobb előfordulású szavakon tanult; -ppl &lt;szöveg file&gt;: itt a mi szövegfile-unkat adjuk meg
                        </td>
                    </tr>
                    <tr>
                        <td>Licensz</td>
                        <td>nyílt CC BY</td>
                    </tr>                   
                </table>
            </div>

        </article>
    </div>
</section>