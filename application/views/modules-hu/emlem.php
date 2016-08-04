<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3><span>emLem</span> - szótövesítő</h3>

            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>A morfológiai elemző az egyes morfémák szintjéig menő részletes elemzést ad az egyes szóalakokra:
                a toldalékok azonosításán túl összetételi tagokra bontja a szót, képzőket azonosít. 
                A morfológiai elemzés eredményét felhasználó modulok többsége számára nincs szükség ilyen részeletes elemzésre. 
                Elegendő az adott szóalak szótári alakjának, szófajának és inflexiós jegyeinek (jel, rag) azonosítása.
                A tövesítő eszköz feladata, hogy a morfológiai elemző részletes elemzéseiből kiszámolja a szó tövét, 
                (képzőt tartalmazó szó esetén) annak eredő szófaját, azonosítsa az inflexiós jegyeket,
                és a részletes elemzés helyett (illetve mellett) ezeket adja vissza.
                <br>A morfológiai elemző gyakran ugyanazon szóalakhoz több különböző részletességű elemzést készít,
                amelyeknek szótöve, szófaja, inflexiós jegyei azonosak. Ennek az az oka, hogy az elemző tőtára számtalan 
                morfológiailag komplex, összetett, illetve képzett lexikalizált elemet tartalmaz. Az elemző ugyanakkor ezeknek 
                az alakoknak nagy részét produktívan is előállítja. A lemmatizálást követően ezek a valódi vagy látszólagos
                többértelműségek megszűnnek, így a tövesítő kimenete jóval alkalmasabb az olyan feladatok támogatására, 
                mint a szófaji egyértelműsítés, a tulajdonnév-felismerés vagy a szintaktikai elemzés.</p>
            <h5>Mi a bemenet?</h5>
            <p>A tövesítő bemenete a morfológiai elemzés eredménye. A tövesítéshez szükség van a szót alkotó egyes morfok felszíni és lexikai 
                alakjára (csak tövek és képzők esetén), illetve a hozzá tartozó morfoszintaktikai címkére.</p>
            <h5>Mi a kimenet?</h5>
            <p>A részletes morfológiai elemzésből állítja elő a tövesítő a szótövet, szófajcímkét és inflexiós jegyeket tartalmazó 
                egyszerűsített elemzést.</p>
            <h5>Egy példa a működésre.</h5>
            <p>A morfológiai elemzés kimenete:</p>
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

            <p>A lemmatizáló a fenti elemzésekből az alábbi egyetlen egyszerűsített elemzést állítja elő:
                <br><b>fejetlenség[/N][Acc]</b>
            </p>
            <p>Az ebben megmaradó szemantikai többértelműséget (a 'fej' alak igei vagy főnévi értelmezésétől függően)
                a morfológiai elemzés (és a szófaji egyértelműsítés) szintjén nem lehet feloldani.</p>

            <br/>

            <h4>Fejlesztőknek</h4>

            <h4>Fejlesztőknek</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Forrás</td>
                        <td><a href="https://github.com/dlt-rilmta/hunlp-GATE/tree/master/Lang_Hungarian/resources/hfst" target="_blank">https://github.com/dlt-rilmta/hunlp-GATE/tree/master/Lang_Hungarian/resources/hfst</a>
                            <br>Emellett az adott platformon működő hfst-lookup programot le kell tölteni az <a href="http://apertium.projectjj.com" target="_blank">http://apertium.projectjj.com</a> oldalról.</td>
                    </tr>
                    <tr>
                        <td>Forrásnyelv</td>
                        <td>Eredetileg C++ nyelven íródott, ezt Javára lett portolva, a Helsinki Finite-State Transducer (HFST) eszközkészlet részét képező hfst-lookup programot hívja meg, ennek elemzéseiből állítja elő a kimenetét.</td>
                    </tr>
                    <tr>
                        <td>Input formátum</td>
                        <td>Unicode kódolású szöveg. Soronként egy szó.</td>
                    </tr>
                    <tr>
                        <td>Output formátum</td>
                        <td>A bemeneti szó elemzéseit (soronként egy) üres sor zárja. Az egyes elemzések alakja: bemeneti szó [tab] részletes elemzés [tab] lemma [tab] szófaj és inflexiós címkék.</td>
                    </tr>
                    <tr>
                        <td>Futtatás</td>
                        <td><span class="code">java -jar hfst-wrapper.jar</span></td>
                    </tr>
                    <tr>
                        <td>Licensz</td>
                        <td>GNU Lesser General Public License (LGPL v3)</td>
                    </tr>
                    <tr>
                        <td>Egyebek</td>
                        <td>A lemmatizáló futtatásához Java JRE futtatókörnyezetre van szükség. Emellett a HFST eszközkészlet hfst-lookup programját használja, ezért ezt és az elemző bináris lexikonát a lemmatizáló mellett el kell helyezni. A lemmatizáló konfigurációját a hfst-wrapper.props fájl tartalmazza.</td>
                    </tr>
                </table>                
            </div>

        </article>
    </div>
</section>