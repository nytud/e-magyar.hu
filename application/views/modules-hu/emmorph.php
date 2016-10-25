<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3 id="emmorph"><span>emMorph</span> - morfológiai elemző</h3>

            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>Az elemzőlánc morfológiai elemző része a szöveg minden egyes szóalakjához hozzárendeli az összes lehetséges morfológiai,
                morfoszintaktikai elemzését. Feladata minden olyan elemzés meghatározása, amely az adott szóalakra környezettől 
                függetlenül érvényes lehet (például a <i>vár</i> esetében azt is hozzáadja, hogy főnév és azt is, hogy ige). Megállapítja a szótőt,
                a szófaji főkategóriát, elemzi a toldalékokat, megadja a szóalak morfémákra bontásának lehetőségeit, így a szóösszetételi határokat
                is.
                <br>Az elemző a magyar nyelvre eddig elérhető eszközök tudását összegző, a fejlesztők szándéka szerint az eddigi legpontosabb
                és legtöbb szóalakot ismerő, szabadon hozzáférhető és egyedi nyelvfeldolgozási igényekhez, nyelvváltozatokhoz testre szabható 
                eszköz, amely a leggyorsabb működést biztosító számítógépes nyelvészeti modellen (ún. véges állapotú technológián) alapul.</p>
            <h5>Mi a bemenet?</h5>
            <p>A teljes rendszer alapvetően egy elemzési lánc egymásra épülő elemzési lépésekkel. Ebből következően a morfológiai elemző 
                bemenete egy sorban egy szóalak.
                <br>A szóalakok határait megállapító megelőző nyelvfeldolgozási lépést a szövegtagoló, a többféle lehetséges elemzés közül 
                a szövegkörnyezetben éppen megfelelő kiválasztását, a következő elemzési lépés, az egyértelműsítő (emTag) végzi.</p>
            <h5>Mi a kimenet?</h5>
            <p>Az elemző kimenete az összes olyan morfémasorozat a hozzátartozó elemzéssel, amiből az aktuális karaktersorozat a magyar nyelv
                szabályai szerint felépülhet. Ez sokszor olyan nagy számú elemzéshez vezet, melyeknek többsége az emberi beszélőben nem is
                tudatosul. Ezeknek az elemzési útvonalaknak a többségét a morfológia elemzőt felhasználó magasabb szintű feladat igényeihez 
                igazodva lehet aztán kiszűrni, az elemzési lehetőségeket szűkíteni.</p>
            <h5>Egy példa a működésre.</h5>
            <p>Az alábbi példa egyrészt a beszélő számára nehezen tetten érhető többértelműséget is szemlélteti, másrészt illusztrálja
                azt a jelenséget is, amikor az elemző szótárában egy egységként tárolt szóalakok további alkotóelemekre bonthatók. 
                Alkalmazástól függően többnyire a beszélők számára is legkézenfekvőbb ['fejetlenség' + tárgyeset] elemzés elegendő, 
                melyet a szótövesítő programot felhasználva meg is kaphatunk, viszont az ebben megmaradó szemantikai többértelműséget
                (a 'fej' alak igei vagy főnévi értelmezésétől függően) a morfológiai elemzés (és a szófaji egyértelműsítés) szintjén
                nem lehet feloldani.
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>fejetlenséget</th>
                        </tr>
                    </thead> 
                    <tbod>
                        <tr>
                            <td>1.</td>
                            <td>fej<span class="group1">[/N]</span>etlen[_Abe/Adj]ség[_Nz_Abstr/N]et[Acc]</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>fej<span class="group3">[/V]</span>etlen[_NegPtcp/Adj]ség[_Nz_Abstr/N]et[Acc]</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>fej~etlen[/Adj]ség[_Nz_Abstr/N]et[Acc]</td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>fej~etlen~ség[/N]et[Acc]</td>
                        </tr>
                    </tbod>
                </table>
            </div>
            <p>
                [/N] főnév
                <br>[/Adj] melléknév
                <br>[_Abe/Adj] névszói fosztóképző (eredménye: melléknév)
                <br>[Acc] tárgyeset (accusativus)
                <br>[_Nz_Abstr/N] absztrakt tulajdonságnév-képző (eredménye: főnév)
                <br>[_NegPtcp/Adj] igei fosztóképző (eredménye: melléknév)
            </p>
           
            <br/>
            
            <h4>Fejlesztőknek</h4>

            <div class="table-responsive">
                <table class="table table-striped">                
                    <tbody>
                        <tr>
                            <td>Forrás</td>
                            <td>
				<a href="https://github.com/dlt-rilmta/emMorph" target="_blank">https://github.com/dlt-rilmta/emMorph</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Forrásnyelv</td>
                            <td>Az elemző alapvetően egy véges állapotú fordító eszköz (transzdúcer), amely a felszíni szóalakot (karaktersorozatot) a tőtár, a toldaléktár és a morfofonológiai leírás (nyelvtan) alapján egy morfémákból és morfológiai kódokból álló másik karaktersorozatra alakítja. Az elemző adatbázisa a nyelvi információk meghatározott formátumban történő leírását tartalmazza, a transzdúcer elkészítéséhez és az elemző futtatásához a Helsinki Finite-State Transducer (HFST) eszközkészlet áll rendelkezésre. Ennek implementációs nyelve: C++. 
			    A HFST compilere számára értelmezhető lexc nyelvű lexikont a morfológia elsődleges forrásából perl nyelven implementált programok állítják elő.</td>
                        </tr>
                        <tr>
                            <td>Input</td>
                            <td>Unicode kódolású szöveg, soronként egy szó.</td>
                        </tr>
                        <tr>
                            <td>Output</td>
                            <td>A bemeneti szó elemzéseit (soronként egy) üres sor zárja. Az egyes elemzések alakja: bemeneti szó [tab] elemzés [tab] súly. A súly a jelen implementációban mindig 1, ha van elemzés, végtelen (inf), ha nincs.</td>
                        </tr>
                        <tr>
                            <td>Futtatás</td>
                            <td>
                                <span class="code">hfst-lookup --cascade=composition hu.hfst</span>
                                <br/>
                                <span class="code">hfst-lookup --pipe-mode=input --cascade=composition hu.hfstol &lt;intext &gt;outtext</span>
                                <br/>
				
                                Az elemző a HFST eszközkészlet lookup programjaival futtatható.
                            </td>
                        </tr>
                        <tr>
                            <td>Licensz</td>
                            <td>Az adatbázisra a Creative Commons Attribution-NonCommercial-ShareAlike 4.0 (CC BY-NC-SA) licenc vonatkozik. Az adatbázis elsődleges forrásának konverzióját végző kód licence GNU General Public License (GPL v3).</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </article>
    </div>
</section>