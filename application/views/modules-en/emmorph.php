<article>
    <h3 id="emmorph">emMorph - morfológiai elemző</h3>

    <h4>Az eszközről</h4>

    <h5>Mire jó? Mit csinál?</h5>
    <p>Az infrastruktúra morfológiai elemző modulja a szöveg minden egyes szóalakjához hozzárendeli az összes lehetséges morfológiai, morfoszintaktikai elemzését. Feladata minden olyan elemzés meghatározása, amely az adott szóalakra  környezettől függetlenül érvényes lehet. Megállapítja a szótőt, a szófaji főkategóriát, elemzi a toldalékokat, megadja a szóalak morfémákra bontásának lehetőségeit, így a szóösszetételi határokat is.
        <br>Az elemző a magyar nyelvre eddig elérhető eszközök tudását szintetizáló, a fejlesztők szándéka szerint az eddigi legpontosabb és legtöbb szóalakot ismerő, szabadon hozzáférhető és egyedi nyelvfeldolgozási igényekhez, nyelvváltozatokhoz testre szabható eszköz, amely a leggyorsabb működést biztosító számítógépes nyelvészeti modellen, ún. véges állapotú technológián alapul.</p>

    <h5>Mi a bemenet?</h5>
    <p>A teljes infrastruktúra alapvetően egy elemzési lánc egymásra épülő elemzési lépésekkel. Ebből következően a morfológiai elemző bemenete alapvetően egy sorban egy szóalak.
        <br>A szóalakok határait megállapító megelőző nyelvfeldolgozási lépést a szegmentáló/tokenizáló, a többféle lehetséges elemzés közül a szövegkörnyezetben éppen megfelelő kiválasztását, a következő elemzési lépést, az egyértelműsítő (POS tagger) végzi.</p>

    <h5>Mi a kimenet?</h5>
    <p>Az elemző kimenete az összes olyan morfémasorozat a hozzátartozó elemzéssel, amiből az aktuális karaktersorozat a magyar nyelv szabályai szerint felépülhet. Ez sokszor olyan nagy számú elemzéshez vezet, melyeknek többsége az emberi beszélőben nem is tudatosul. Ezeknek az elemzési útvonalaknak a többségét a morfológia elemzőt felhasználó magasabb szintű feladat (információkinyerés, gépi fordítás stb.) igényeihez igazodva lehet aztán kiszűrni, az elemzési lehetőségeket szűkíteni.</p>

    <h5>Egy példa a működésre.</h5>
    <p>Az alábbi példa egyrészt a beszélő számára nehezen tetten érhető többértelműséget is szemlélteti, másrészt illusztrálja azt a jelenséget is, amikor az elemző szótárában egy egységként tárolt szóalakok további alkotóelemekre bonthatók. Alkalmazástól függően többnyire a beszélők számára is legkézenfekvőbb ['fejetlenség' + tárgyeset] elemzés elegendő, melyet a lemmatizáló (szótövesítő) programot felhasználva meg is kaphatunk, viszont az ebben megmaradó szemantikai többértelműséget (a 'fej' alak igei vagy főnévi értelmezésétől függően) a morfológiai elemzés (és a szófaji egyértelműsítés) szintjén nem lehet feloldani.
    <table>
        <tr>
            <th>fejetlenséget</th>
            </th>
        </tr>
        <tr>
            <td>fejetlenséget</td>
            <td>fej[/N]etlen[_Abe/Adj]ség[_Nz_Abstr/N]et[Acc]</td>
        </tr>
        <tr>
            <td>fejetlenséget</td>
            <td>fej[/V]etlen[_NegPtcp/Adj]ség[_Nz_Abstr/N]et[Acc]</td>
        </tr>
        <tr>
            <td>fejetlenséget</td>
            <td>fej~etlen[/Adj]ség[_Nz_Abstr/N]et[Acc]</td>
        </tr>
        <tr>
            <td>fejetlenséget</td>
            <td>fej~etlen~ség[/N]et[Acc]</td>
        </tr>
    </table>
    <p>[/N] főnév
        <br>[/Adj] melléknév
        <br>[_Abe/Adj] névszói fosztóképző (eredménye: melléknév)
        <br>[Acc] tárgyeset (accusativus)
        <br>[_Nz_Abstr/N] absztrakt tulajdonságnév-képző (eredménye: főnév)
        <br>[_NegPtcp/Adj] igei fosztóképző (eredménye: melléknév)
    </p>

    <h4>Fejlesztőknek</h4>

    <h5>Hol található? (bináris/forrás)</h5>
    <p>A forrás elérhető a githubon.</p>

    <h5>Milyen nyelven írt?</h5>
    <p>Az elemzõ alapvetõen egy véges állapotú fordító eszköz (transzdúcer), amely a felszíni szóalakot (karaktersorozatot) a tõtár, a toldaléktár és a morfofonológiai leírás (nyelvtan) alapján egy morfémákból és morfológiai kódokból álló másik karaktersorozatra alakítja. Az elemzõ adatbázisa a nyelvi információk meghatározott formátumban történõ leírását tartalmazza, a transzdúcer elkészítéséhez és az elemzõ futtatásához a Helsinki Finite-State Transducer (HFST) eszközkészlet áll rendelkezésre. Ennek implementációs nyelve: C++;</p>

    <h5>Input/output adatformátum?</h5>
    <p>Unicode kódolású szöveg.
        <br>Bemenet: soronként egy szó.<br>Kimenet: a bemeneti szó elemzéseit (soronként egy) üres sor zárja. Az egyes elemzések alakja: bemeneti szó [tab] elemzés [tab] súly. A súly a jelen implementációban mindig 1, ha van elemzés, végtelen (inf), ha nincs.</p>

    <h5>Hogyan futtatható?</h5>
    <p>Az elemzõ a HFST eszközkészlet lookup programjaival futtatható.
        <br>hfst-lookup &lt;elemzo_transzducer&gt;</p>
    <p>fejetlenséget</p>
    <table>
        <tr>
            <td>fejetlenséget</td>
            <td>fej[/N]etlen[_Abe/Adj]ség[_Nz_Abstr/N]et[Acc]</td>
        </tr>
        <tr>
            <td>fejetlenséget</td>
            <td>fej[/V]etlen[_NegPtcp/Adj]ség[_Nz_Abstr/N]et[Acc]</td>
        </tr>
        <tr>
            <td>fejetlenséget</td>
            <td>fej~etlen[/Adj]ség[_Nz_Abstr/N]et[Acc]</td>
        </tr>
        <tr>
            <td>fejetlenséget</td>
            <td>fej~etlen~ség[/N]et[Acc]</td>
        </tr>
    </table>
    <h5>Milyen liszensz vonatkozik rá? (Ha nem a teljesen nyílt CC BY)</h5>
    <p>Az adatbázisra a Creative Commons Attribution-ShareAlike 4.0 (CC-BY-SA) licenc vonatkozik. Az adatbázis elsõdleges forrásának konverzióját végzõ kód licence GNU General Public License (GPL v3).</p>
    <h5>További információk</h5>
    <p></p>
</article>