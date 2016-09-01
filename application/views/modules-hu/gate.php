<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">

        <article>
            <h3 id="gate"><span>Elemzőlánc, integráció</span></h3>

            <h4>GATE integráció</h4>
            <p>
                Az e-magyar.hu rendszert alkotó különféle feldolgozó modulok integrációját a GATE nyelvfeldolgozó keretrendszerben valósítottuk meg.
                A java nyelven implementált GATE előnye, hogy kényelmes módszert biztosít tetszőleges számú nyelvfeldolgozó eszköz
                (ún. Processing Resource) rendszerbe illesztésére. A másik fontos előnyös tulajdonsága az egységes annotációs modell,
                mely biztosítja a kommunikációt az egyes modulok között.
            </p>
            <p>
                A feldolgozás legelején a szövegben a karakterközök kapnak egy sorszámot (ez az ún. offset), és onnantól kezdve minden annotációt
                egy offset-pár fejez ki, mely az annotáció elejét és végét adja meg. Az információ közvetlenül az annotációban (Token),
                vagy az annotációk attribútumaiban (a Token szótő attribútuma) kap helyet. Ezen a módon az annotációk nem zavarják egymást 
                (sőt tetszőleges átfedés lehet közöttük). Ez hasznos megoldás: így minden modul csak a számára releváns annotációt kell, 
                hogy beolvassa, az eredményét pedig kiírhatja a megfelelő meglévő vagy újonnan létrehozott annotációba. 
                Például: a tokenizáló Token és SpaceToken elemeket hoz létre a szavaknak és a szóközöknek megfelelően, a morfológiai elemző 
                már csak a Tokenek listáját fogja lekérni, ezen végzi el a morfológiai elemzést, a SpaceTokeneket pedig érintetlenül hagyja.
                A modulok paraméterezhetők abban a tekintetben, hogy mely annotációkon dolgozzanak, ezzel a rendszer rugalmassága még tovább növelhető.
            </p>
            <p>
                Feladat tehát, hogy minden modult alkalmassá tegyünk arra, hogy a bemenetét és a kimenetét is a GATE annotációs 
                modelljének megfelelően kezelje. Kiegészítő feladat, hogy ha az egymástól független annotációk között kapcsolatot 
                akarunk megadni, akkor azt explicit meg kell tenni. Egyszerű példa erre a tulajdonneveket és az őket alkotó tokeneket összekötő
                kapcsolat. Ezeket a feladatokat valósítottuk meg az integráció során.
            </p>

            <h4>Modulok az elemzőláncban</h4>
            <p>
                Az e-magyar.hu elemzőlánc a következő GATE-ba integrált modulokból áll. Az emToken mondatokra bontja és tokenizálja a szöveget,
                az emMorph végrehajtja a morfológiai elemzést és megállapítja a lehetséges szótővet, az emTag egyértelműsít, azaz kiválasztja 
                az érvényes morfológiai elemzést és szótövet a lehetőségek közül. Az emDep és az emCons szintaktikai elemzést végez, ez után
                egy kiegészítő eszköz az igékhez kapcsolja az elváló igekötőt, és megadja az igekötős szótövet. Végül az emChunk a főnévi 
                csoportokat, az emNer pedig a tulajdonneveket határozza meg. Utóbbi eszközök adott attribútumban IOB annotációval látják el a 
                tokeneket, ezt egy kiegészítő eszköz önálló annotációvá alakítja a kényelmesebb feldolgozhatóság érdekében. 
            </p>

            <h4>Telepítés</h4>
            Az elemzőlánc használható a GATE grafikus felületéről, (a GATE Developer-ből), és attól függetlenül paracssorból 
            a GATE Embedded technológia segítségével.<br/>
            A grafikus felületen történő használathoz a GATE telepítése után csupán a GATE Developer saját egyszerű telepítési mechanizmusát 
            kell használni, mely az általunk publikált GATE Plugin repozitóriumból letölti és beilleszti a rendszerbe
            a <strong>Lang_Hungarian</strong> plugint, mely a teljes láncot tartalmazza. <a href="https://github.com/dlt-rilmta/hunlp-GATE#installing-under-gate-developer" target="_blank">részletek</a><br/>
            A grafikus felülettől független parancssori használathoz a GATE telepítésén kívül szükség van a <strong>Lang_Hungarian</strong> github 
            repozitórium klónozására, a github repozitóriumban meg nem lévő szükséges elemek (automatikus) beszerzésére, 
            és ez után válik használhatóvá a rendszer. <a href="https://github.com/dlt-rilmta/hunlp-GATE#using-or-embedding-the-lang_hungarian-plugin-as-a-client-server-system-for-power-users" target="_blank">részletek</a>

            <h4>Használat a GATE Developerben</h4>

            <p>
                A <strong>Lang_Hungarian</strong> GATE plugin installálása után, mely az e-magyar.hu elemzőláncot tartalmazza, hajtsuk végre a következő lépéseket: 
            </p>
            <ol>
                <li>Töltsük be a feldolgozóeszközöket: jobbkatt a bal panelen a <i>Processing Resources</i>-ra, és válasszuk ki a listából a kívánt eszközöket.</li>
                <li>A bal panel <i>Applications</i> részében hozzunk létre egy új <i>Corpus Pipeline</i>-t.</li>
                <li>A létrehozott <i>Corpus Pipeline</i>-ra kattintva állítsuk össze a fő panelen a láncot, úgy hogy a kívánt eszközöket a kívánt
                    sorrendben a jobb oldali listába rendezzük. A lista elejére helyezzünk el egy <i>Document Reset PR</i>-t, ami minden futtatás 
                    előtt alaphelyzetbe állítja a dokumentumot. Ezt a mindig rendelkezésre álló <i>ANNIE</i> pluginból tölthetjük be. </li>
                <li>A bal panelen hozzunk létre egy <i>Language Resource</i>-ot: egy új <i>GATE Document</i>-et, ez fogja tartalmazni a feldolgozandó
                    szöveget.</li>
                <li>Készítsünk belőle korpuszt: jobbkatt a létrehozott <i>GATE Document</i>-re, és <i>New Corpus with this Document</i>.</li>
                <li>Kattintsunk a <i>Corpus Pipeline</i>-ra, majd a képernyő közepén, a <i>Corpus</i>-nál, adjuk meg az imént létrehozott korpuszt, és 
                    kattintsunk lent a <i>Run this Application</i> gombra.</li>
            </ol>

            <p>
                Az eredményeket a létrehozott <i>GATE Document</i>-re kattintva tekinthetjük meg az <i>Annotation Sets</i> és az <i>Annotation List</i> 
                bekapcsolásával. Az egyes egységek fölé állítva az egeret, megjelenik az adott egységre vonatkozó annotáció. 
            </p>
            <p>
                A GATE használatának további részletei és lehetőségei tekintetében a <a href="https://gate.ac.uk/sale/tao/split.html" target="_blank">GATE dokumentációjára</a> utalunk. 
            </p>


            <br/>

            <h4>Fejlesztőknek</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Forrás</td>
                        <td>
                            GATE: <a href="https://gate.ac.uk/download/" target="_blank">https://gate.ac.uk/download/</a> 
                            <br/>
                            Lang_Hungarian GATE plugin: A magyar nyelvfeldolgozó eszközöket tartalmazó
                            GATE <strong>Lang_Hungarian</strong> plugin a
                            <a href="https://github.com/dlt-rilmta/hunlp-GATE" target="_blank">https://github.com/dlt-rilmta/hunlp-GATE</a>
                            github repozitóriumban érhető el a <em>gate-server</em> alkalmazással együtt.
                        </td>
                    </tr>
                    <tr>
                        <td>Forrásnyelv</td>
                        <td>
                            Elsősorban java. 
                            A java nyelven írt GATE rendszerbe a java eszközöket
                            közvetlenül lehetett integrálni,
                            az egyéb nyelveken (python, C++) írt modulok
                            pedig a binárisok vagy saját interpreterük használatával épülnek be.
                        </td>
                    </tr>
                    <tr>
                        <td>Input</td>
                        <td>
                            A honlap és a <em>gate-server</em> esetében egyszerű szöveg (txt).
                            A <em>GATE Developer</em>  esetében viszont kényelmesen
                            kezelhetünk számos formátumot
                            (txt, html, xml, doc, xls, docx, xlsx...),
                            belőlük a rendszer automatikusan kinyeri a szöveges tartalmat.
                            HTML illetve XML esetén az eredeti markup megőrződik,
                            a hozzáadott információ az eredeti markuptól függetlenül kezelődik.
                        </td>
                    </tr>
                    <tr>
                        <td>Output</td>
                        <td>GATE XML formátum. A honlapról az elemzett anyag .tsv-ben is letölthető.</td>
                    </tr>
                    <tr>
                        <td>Futtatás</td>
                        <td>
                            <a href="https://github.com/dlt-rilmta/hunlp-GATE#installing-under-gate-developer">Telepítés, információk</a>
                            a <em>GATE Developer</em> -hez.<br/>
                            <a href="https://github.com/dlt-rilmta/hunlp-GATE#using-or-embedding-the-lang_hungarian-plugin-as-a-client-server-system-for-power-users">Telepítés, információk</a>
                            a <em>GATE Embedded</em> -hez.
                        </td>
                    </tr>                                
                </table>
            </div>

        </article>

    </div>
</section>
