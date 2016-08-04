<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8 col-sm-offset-1 col-md-offset-2 col-lg-offset-2 text-justify">
        <h1 class="dblue">Elemző modulok</h1>
        <!-- emToken -->
        <article>
            <h3 id="emtoken">emToken - Tokenizáló</h3>
            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>Magyar nyelvű szövegekben mondat- és és szóhatárok azonosítása.</p>
            <h5>Mi a bemenet?</h5>
            <p>UTF-8 kódolású sima szöveg.</p>
            <h5>Mi a kimenet?</h5>
            <p>Mondatokra és szavakra bontott szöveg.</p>
            <h5>Egy példa a működésre.</h5>
            <p>Bemenet: A kutya ugat.
                <br>Kimenet: &lt;s&gt;&lt;w&gt;A&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;kutya&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;ugat&lt;/w&gt;&lt;c&gt;.&lt;/c&gt;&lt;/s&gt;</p>
            <h4>Fejlesztőknek</h4>
            <h5>Hol található? (bináris/forrás)</h5>
            <p>Forráskód: <a href="https://github.com/dlt-rilmta/quntoken" target="_blank">https://github.com/dlt-rilmta/quntoken</a>
                <br>Bináris: <a href="https://github.com/dlt-rilmta/quntoken/releases/latest" target="_blank">https://github.com/dlt-rilmta/quntoken/releases/latest</a></p>
            <h5>Milyen nyelven írt?</h5>
            <p>C++ és Python 3.</p>
            <h5>Input/output adatformátum?</h5>
            <p>Input formátum: UTF-8 kódolású plain text.
                <br>Output formátum: XML és JSON választható.</p>
            <h5>Hogyan futtatható?</h5>
            <p>Futtatás: ./quntoken [-f FORMAT] FILE
                <br>Alapértelmezett kimeneti formátum az XML. Megadható kimeneti formátumok: xml, json.</p>
            <h5>Milyen liszensz vonatkozik rá? (Ha nem a teljesen nyílt CC BY)</h5>
            <p>GNU GPLv3.</p>
            <h5>További információk</h5>
            <p></p>
        </article>
        <!-- emMorph -->
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
        <!-- emTag -->
        <h3 id="emtag">emTag - POS tagger</h3>
        <article>

            <h4>Az eszközről</h4>

            <h5>Mire jó? Mit csinál?</h5>
            <p>A program a betanult anyag alapján (és opcionálisan morfológia támogatásával, vagy előelemzett inputon) teljes morfológiai egyértelműsítést végez, azaz egy tokenekre bontott mondat esetén minden egyes tokennek meghatározza a szótövét és a szófaji címkéjét.</p>

            <h5>Mi a bemenet?</h5>
            <p>Tokenekre bontott mondatok sorozata. (Minden mondatot külön kezel.)</p>

            <h5>Mi a kimenet?</h5>
            <p>A bemeneti tokenek és az egyes tokenekhez rendelt szótő és szófaji címke.</p>

            <h5>Egy példa a működésre.</h5>
            <p>Az alma nem vár senkire.</p>
            <table>
                <tr>
                    <td>Az</td>
                    <td>#az</td>
                    <td>#DET</td>
                </tr>
                <tr>
                    <td>alma</td>
                    <td>#alma</td>
                    <td>#N.NOM</td>
                </tr>
                <tr>
                    <td>vár</td>
                    <td>#vár</td>
                    <td>#V.Sg3</td>
                </tr>
                <tr>
                    <td>senkire</td>
                    <td>#senki</td>
                    <td>#N.SUB</td>
                </tr>
                <tr>
                    <td>.</td>
                    <td>#.</td>
                    <td>#PUNCT</td>
                </tr>
            </table>

            <h4>Fejlesztőknek</h4>

            <h5>Hol található? (bináris/forrás)</h5>
            <p>A forrás elérhető a <a href="https://github.com/ppke-nlpg/purepos" target="_blank">https://github.com/ppke-nlpg/purepos</a> linken.</p>

            <h5>Milyen nyelven írt?</h5>
            <p>Java.</p>

            <h5>Input/output adatformátum?</h5>
            <p>Input formátum: Minden mondat egy sorban van, minden token szóközzel van elválasztva. <br>Output: Ugyan az mint az Input formátuma, de a tokenekhez hozzá van fűzve # jellel elválasztva a szótő és a címke.</p>

            <h5>Hogyan futtatható?</h5>
            <p>java -jar purepos-&lt;version&gt;.jar tag -m betanított.model [-i input.txt] [-o output.txt]</p>

            <h5>Milyen liszensz vonatkozik rá? (Ha nem a teljesen nyílt CC BY)</h5>
            <p>LGPL-3.0</p>

            <h5>További információk</h5>
            <p>Dependencia a fordításhoz: maven 2.</p>
        </article>
        <h3 id="np_chunker">NP chunker</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc et erat eget ex rhoncus hendrerit ut at neque. 
            Cras viverra tristique dolor. Aliquam urna erat, pretium vitae diam quis, viverra tincidunt dolor.
            Maecenas at tellus non felis rhoncus maximus a sit amet leo. Aliquam quis lobortis velit.
            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
            Vestibulum luctus nibh orci, in tincidunt urna dapibus vitae. Mauris sit amet eros fringilla, blandit nulla in, posuere arcu.
            Nunc facilisis ipsum hendrerit elit aliquet dictum.
            Sed congue, nibh et maximus sollicitudin, nunc dui gravida ex, sit amet congue dolor massa in sem.
            Vivamus consectetur tellus non nunc viverra, ac hendrerit orci finibus. Nunc ultricies dignissim vehicula.
            Praesent non orci dapibus, suscipit arcu nec, pharetra nibh. Integer ac dapibus risus, nec faucibus justo.
            Sed mattis leo leo, at varius ligula venenatis nec. Sed placerat vel nibh in tempor.
        </p>
        <!-- emCons -->
        <article>
            <h3 id="emcons">Konstituens elemző</h3>
            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>Mondatok összetevős szerkezeti elemzése: az egy jelentéses egységet alkotó szavakat csoportokba rendezi nyelvtani kategória alapján.</p>
            <h5>Mi a bemenet?</h5>
            <p>A mondat szavai (bemeneti tokenek) elemzési fába rendezve: minden tokenhez hozzá van rendelve a megfelelő elemzési címke.</p>
            <h5>Mi a kimenet?</h5>
            <p>Az elemző kimenete az összes olyan morfémasorozat a hozzátartozó elemzéssel, amiből az aktuális karaktersorozat a magyar nyelv szabályai szerint felépülhet. Ez sokszor olyan nagy számú elemzéshez vezet, melyeknek többsége az emberi beszélőben nem is tudatosul. Ezeknek az elemzési útvonalaknak a többségét a morfológia elemzőt felhasználó magasabb szintű feladat (információkinyerés, gépi fordítás stb.) igényeihez igazodva lehet aztán kiszűrni, az elemzési lehetőségeket szűkíteni.</p>
            <h5>Egy példa a működésre.</h5>
            <p>Az exkatonát kórházba szállították, ahol két műtétet is végrehajtottak rajta.</p>
            <table>
                <tr>
                    <td>Az</td>
                    <td>az</td>
                    <td>DET</td>
                    <td>Definite=Def|PronType=Art</td>
                    <td>(ROOT(CP(NP*</td>
                </tr>
                <tr>
                    <td>exkatonát</td>
                    <td>exkatona</td>
                    <td>NOUN</td>
                    <td>Case=Acc|Number=Sing</td>
                    <td>*)</td>
                </tr>
                <tr>
                    <td>kórházba</td>
                    <td>kórház</td>
                    <td>PROPN</td>
                    <td>Case=Ill|Number=Sing</td>
                    <td>(NP*)</td>
                </tr>
                <tr>
                    <td>szállították</td>
                    <td>szállít</td>
                    <td>VERB</td>
                    <td>Definite=Def|Mood=Ind|Number=Plur|Person=3|Tense=Past|VerbForm=Fin|Voice=Act</td>
                    <td>(V_(V0*))</td>
                </tr>
                <tr>
                    <td>,</td>
                    <td>,</td>
                    <td>PUNCT</td>
                    <td>_</td>
                    <td>*</td>
                </tr>
                <tr>
                    <td>ahol</td>
                    <td>ahol</td>
                    <td>ADV</td>
                    <td>PronType=Rel</td>
                    <td>(ADVP*)</td>
                </tr>
                <tr>
                    <td>két</td>
                    <td>két</td>
                    <td>NUM</td>
                    <td>Case=Nom|NumType=Card|Number=Sing</td>
                    <td>(NP*</td>
                </tr>
                <tr>
                    <td>műtétet</td>
                    <td>műtét</td>
                    <td>NOUN</td>
                    <td>Case=Acc|Number=Sing</td>
                    <td>*)</td>
                </tr>
                <tr>
                    <td>is</td>
                    <td>is</td>
                    <td>CONJ</td>
                    <td>_</td>
                    <td>(C0*)</td>
                </tr>
                <tr>
                    <td>végrehajtottak</td>
                    <td>végrehajt</td>
                    <td>VERB</td>
                    <td>Definite=Ind|Mood=Ind|Number=Plur|Person=3|Tense=Past|VerbForm=Fin|Voice=Act</td>
                    <td>(V_(V0*))</td>
                </tr>
                <tr>
                    <td>rajta</td>
                    <td>rajta</td>
                    <td>PRON</td>
                    <td>Case=Sup|Number=Sing|Person=3|PronType=Prs</td>
                    <td>(NP*)</td>
                </tr>
                <tr>
                    <td>.</td>
                    <td>.</td>
                    <td>PUNCT</td>
                    <td>_</td>
                    <td>*))</td>
                </tr>
            </table>
            <h4>Fejlesztőknek</h4>
            <h5>Hol található? (bináris/forrás)</h5>
            <p>A forrás elérhető a <a href="http://rgai.inf.u-szeged.hu/magyarlanc" target="_balnk">http://rgai.inf.u-szeged.hu/magyarlanc</a> linken.</p>
            <h5>Milyen nyelven írt?</h5>
            <p>Java.</p>
            <h5>Input/output adatformátum?</h5>
            <p>Input: a POS-tagger kimenete (egy sorban egy token található, külön oszlopban a szóalak, szótő, morfológiai elemzéssel ellátva). Az egyes mondatokat üres sor választja el egymástól.
                <br>Output: egy sorban egy token, külön oszlopban a szóalak, szótő, morfológiai elemzés és szintaktikai elemzés.</p>
            <h5>Hogyan futtatható?</h5>
            <p>java -Xmx2G -jar magyarlanc-3.0.jar -mode constparse -input in.txt -output out.txt</p>
            <h5>Milyen liszensz vonatkozik rá? (Ha nem a teljesen nyílt CC BY)</h5>
            <p></p>
            <h5>További információk</h5>
            <p></p>
        </article>     
        <!-- emDep -->
        <article>
            <h3 id="emdep">emDep - Dependencia elemző</h3>
            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>Mondatok szerkezeti elemzése: a mondatban található nyelvtani kategóriák alapján rendeli hozzá a szavakhoz azok nyelvtani szerepeit (alany, tárgy stb.).</p>
            <h5>Mi a bemenet?</h5>
            <p>Szövegszavakra bontott és morfológiailag egyértelműsített mondatok.</p>
            <h5>Mi a kimenet?</h5>
            <p>A mondat szavai (bemeneti tokenek) elemzési fába rendezve: minden tokenhez hozzá van rendelve a megfelelő elemzési címke és a szülő csomópontja.</p>
            <h5>Egy példa a működésre.</h5>
            <p>Az exkatonát kórházba szállították, ahol két műtétet is végrehajtottak rajta.</p>
            <table>
                <tr>
                    <td>1</td>
                    <td>Az</td>
                    <td>az</td>
                    <td>DET</td>
                    <td>Definite=Def|PronType=Art</td>
                    <td>2</td>
                    <td>DET</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>exkatonát</td>
                    <td>exkatona</td>
                    <td>NOUN</td>
                    <td>Case=Acc|Number=Sing</td>
                    <td>4</td>
                    <td>OBJ</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>kórházba</td>
                    <td>kórház</td>
                    <td>PROPN</td>
                    <td>Case=Ill|Number=Sing</td>
                    <td>4</td>
                    <td>OBJ</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>szállították</td>
                    <td>szállít</td>
                    <td>VERB</td>
                    <td>Definite=Def|Mood=Ind|Number=Plur|Person=3|Tense=Past|VerbForm=Fin|Voice=Act</td>
                    <td>0</td>
                    <td>ROOT</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>,</td>
                    <td>,</td>
                    <td>PUNCT</td>
                    <td>_</td>
                    <td>4</td>
                    <td>PUNCT</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>ahol</td>
                    <td>ahol</td>
                    <td>ADV</td>
                    <td>PronType=Rel</td>
                    <td>10</td>
                    <td>LOCY</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>két</td>
                    <td>két</td>
                    <td>NUM</td>
                    <td>Case=Nom|NumType=Card|Number=Sing</td>
                    <td>8</td>
                    <td>ATT</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>műtétet</td>
                    <td>műtét</td>
                    <td>NOUN</td>
                    <td>Case=Acc|Number=Sing</td>
                    <td>10</td>
                    <td>OBJ</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>is</td>
                    <td>is</td>
                    <td>CONJ</td>
                    <td>_</td>
                    <td>8</td>
                    <td>CONJ</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>végrehajtottak</td>
                    <td>végrehajt</td>
                    <td>VERB</td>
                    <td>Definite=Ind|Mood=Ind|Number=Plur|Person=3|Tense=Past|VerbForm=Fin|Voice=Act</td>
                    <td>4</td>
                    <td>ATT</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>rajta</td>
                    <td>rajta</td>
                    <td>PRON</td>
                    <td>Case=Sup|Number=Sing|Person=3|PronType=Prs</td>
                    <td>10</td>
                    <td>OBL</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>.</td>
                    <td>.</td>
                    <td>PUNCT</td>
                    <td>_</td>
                    <td>0</td>
                    <td>PUNCT</td>
                </tr>
            </table>

            <h4>Fejlesztőknek</h4>
            <h5>Hol található? (bináris/forrás)</h5>
            <p>A forrás elérhető a <a href="" target="_blank">http://rgai.inf.u-szeged.hu/magyarlanc</a> linken keresztül.</p>
            <h5>Milyen nyelven írt?</h5>
            <p>Java.</p>
            <h5>Input/output adatformátum?</h5>
            <p>Input: a POS-tagger kimenete (egy sorban egy token található, külön oszlopban a szóalak, szótő, morfológiai elemzéssel ellátva). Az egyes mondatokat üres sor választja el egymástól.
                <br>Output: egy sorban egy token, külön oszlopban a szóalak, szótő, morfológiai elemzés, szülő csomópont és szintaktikai címke.</p>
            <h5>Hogyan futtatható?</h5>
            <p>java -Xmx2G -jar magyarlanc-3.0.jar -mode depparse -input in.txt -output out.txt</p>
            <h5>Milyen liszensz vonatkozik rá? (Ha nem a teljesen nyílt CC BY)</h5>
            <p>Az adatbázisra a Creative Commons Attribution-ShareAlike 4.0 (CC-BY-SA) licenc vonatkozik. Az adatbázis elsõdleges forrásának konverzióját végzõ kód licence GNU General Public License (GPL v3).</p>
            <h5>További információk</h5>
            <p></p>
        </article>  
        <!-- emNer -->
        <article>
            <h3 id="emner">NER tagger</h3>
            h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>Az emNer automatikus tulajdonnév-felismerő rendszer azonosítja a folyó szövegben található tulajdonneveket, és besorolja őket az előre meghatározott névkategóriák valamelyikébe (személynév, intézménynév, földrajzi név, egyéb).</p>
            <h5>Mi a bemenet?</h5>
            <p>Az elemzőlánc előző szintjein feldolgozott magyar nyelvű szövegekkel dolgozik, amelyek már i) szavakra és mondatokra vannak bontva, ii) a szavakhoz hozzá van rendelve a tövük és a teljes morfológiai elemzésük. A tulajdonnév-felismerő modul hatékony működéséhez szükségesek ezek az információk.</p>
            <h5>Mi a kimenet?</h5>
            <p>A modul a szavakra és mondatokra bontott szöveg minden egyes szövegszavához hozzárendel egy címkét, ami megmondja, hogy az adott szó i) tulajdonnév-e, ha igen, akkor ii) milyen kategóriájú tulajdonnév, iii) egy- vagy többelemű-e, ha ez utóbbi, akkor iv) a tulajdonnév kezdő, közbülső vagy záró eleme-e. 
                <br>A kimenetben az előző szintek elemzése is megmarad, és a tulajdonnév-felismerő modul is hozzáteszi a saját címkéit.</p>
            <h5>Egy példa a működésre.</h5>
            <p>[...] - közölte Wolf László, az OTP Bank vezérigazgató-helyettese az MTI érdeklődésére.</p>
            <p>A példamondatban meg van jelölve minden szövegszó az alábbi címkékkel: 0 = nem tulajdonnév, B-PER: egy többelemű személynév első eleme, E-PER: egy többelemű személynév utolsó eleme, B-ORG: egy többelemű intézmény első eleme, E-ORG: egy többelemű intézménynév utolsó eleme, 1-ORG: egyelemű intézménynév.</p>
            <table>
                <tr>
                    <td>közölte</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Wolf</td>
                    <td>B-PER</td>
                </tr>
                <tr>
                    <td>László</td>
                    <td>E-PER</td>
                </tr>
                <tr>
                    <td>,</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>az</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>OTP</td>
                    <td>B-ORG</td>
                </tr>
                <tr>
                    <td>Bank</td>
                    <td>E-ORG</td>
                </tr>
                <tr>
                    <td>vezérigazgató-helyettese</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>az</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>MTI</td>
                    <td>1-ORG</td>
                </tr>
                <tr>
                    <td>érdeklődésére</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>.</td>
                    <td>0</td>
                </tr>
            </table>
            <h4>Fejlesztőknek</h4>
            <h5>Hol található? (bináris/forrás)</h5>
            <p>A forrás elérhető https://github.com/ppke-nlpg/HunTag3 linken.</p>
            <h5>Milyen nyelven írt?</h5>
            <p></p>
            <h5>Input/output adatformátum?</h5>
            <p>A modul kimenetként ugyanazt a formátumot adja, mint amit bemenetként vár, vagyis:</p>
            <ul>
                <li>UTF-8 karakterkódolású sima szöveg fájl,</li>
                <li>egy sor-egy szó formátum,</li>
                <li>a mondathatárokat egy üres sor jelöli,</li>
                <li>az első oszlopban maga a szövegszó szerepel, minden további annotáció tabbal elválasztott oszlopokban van hozzáadva,</li>
                <li>az utolsó oszlop tartalmazza a tulajdonnév-címkéket.</li>
            </ul>
            <h5>Hogyan futtatható?</h5>
            <p>Lásd a README-ben: <a href="https://github.com/ppke-nlpg/HunTag3" target="_blank">https://github.com/ppke-nlpg/HunTag3</a>.</p>
            <h5>Milyen liszensz vonatkozik rá? (Ha nem a teljesen nyílt CC BY)</h5>
            <p>GNU Lesser General Public License v3.0</p>
            <h5>További információk</h5>
            <p></p>
        </article>
        <hr />
        <!-- Pipeline -->
        <h3 id="gate">GATE Pipeline</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc et erat eget ex rhoncus hendrerit ut at neque. 
            Cras viverra tristique dolor. Aliquam urna erat, pretium vitae diam quis, viverra tincidunt dolor.
            Maecenas at tellus non felis rhoncus maximus a sit amet leo. Aliquam quis lobortis velit.
            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
            Vestibulum luctus nibh orci, in tincidunt urna dapibus vitae. Mauris sit amet eros fringilla, blandit nulla in, posuere arcu.
            Nunc facilisis ipsum hendrerit elit aliquet dictum.
        </p>
        <hr />
        <!-- emLid -->
        <article>
            <h3 id="emlid">emLid - nyelvfelismerő</h3>

            <h4>Az eszközről</h4>

            <h5>Mire jó? Mit csinál?</h5>
            <p>A program felismeri, hogy az archívum nyelvei közül melyiken beszélnek egy-egy fájlban.</p>

            <h5>Mi a bemenet?</h5>
            <p>A hangfájl.</p>

            <h5>Mi a kimenet?</h5>
            <p>A nyelv neve.</p>

            <h5>Egy példa a működésre.</h5>
            <p>Ha a hangfájl román beszédet tartalmaz, akkor a program megmondja, hogy román.</p>
            <h4>Fejlesztőknek</h4>

            <h5>Hol található? (bináris/forrás)</h5>
            <p>A forrás elérhető a <a href="https://github.com/juditacs/hunspeech/tree/master/langid/laur" target="_blank">https://github.com/juditacs/hunspeech/tree/master/langid/laur</a> linken.</p>

            <h5>Milyen nyelven írt?</h5>
            <p>Python.</p>

            <h5>Input/output adatformátum?</h5>
            <p>Input formátum: wav.<br>Output: string.</p>

            <h5>Hogyan futtatható?</h5>
            <p>Lásd a repóban a README-t.</p>

            <h5>Milyen liszensz vonatkozik rá? (Ha nem a teljesen nyílt CC BY)</h5>
            <p></p>

            <h5>További információk</h5>
            <p></p>
        </article>
        <!-- emDia -->
        <article>
            <h3 id="emdia">emDia - beszélő detektáló</h3>

            <h4>Az eszközről</h4>

            <h5>Mire jó? Mit csinál?</h5>
            <p>A modul beszélődetekciót végez; tehát a 'ki, mikor beszélt?' kérdésre ad választ egy több beszélő beszédét tartalmazó hangfelvétellel kapcsolatban.</p>

            <h5>Mi a bemenet?</h5>
            <p>Egy audio fájl (pl .wav, .mp3 formátumban).</p>

            <h5>Mi a kimenet?</h5>
            <p>Egy, a területen használt szabványnak megfelelő (RTTM) szövegfájl, ahonnan soronként leolvasható, hogy a felvétel egyes szakaszain melyik beszélő beszél. (Az algoritmus csak a beszélőváltásokat állapítja meg, a beszélők személyazonosságát nem.)</p>

            <h5>Egy példa a működésre.</h5>
            <p>Példa egy kimeneti fájl egy részletére: (beszélőváltás a felvétel 47. másodpercénél, egy új beszélő szólal meg)</p>
            <p>SPEAKER SpeechNonSpeech 1 46.670 0.300 &lt;NA&gt; &lt;NA&gt; SPK01 &lt;NA&gt;
                <br>SPKR-INFO SpeechNonSpeech 1 &lt;NA&gt; &lt;NA&gt; &lt;NA&gt; unknown SPK16 &lt;NA&gt;
                <br>SPEAKER SpeechNonSpeech 1 46.970 2.220 &lt;NA&gt; &lt;NA&gt; SPK16 &lt;NA&gt;
            </p>
            <h4>Fejlesztőknek</h4>

            <h5>Hol található? (bináris/forrás)</h5>
            <p>A forrás elérhető a <a href="https://github.com/juditacs/hunspeech/blob/master/speaker_diarization/em-dia.py" target="_blank">https://github.com/juditacs/hunspeech/blob/master/speaker_diarization/em-dia.py</a> linken.</p>

            <h5>Milyen nyelven írt?</h5>
            <p>Python.</p>

            <h5>Input/output adatformátum?</h5>
            <p>Bemeneti: .wav, .mp3, vagy bármilyen egyéb, a SoX (Sound Exchange) eszköz által támogatott audio formátum.
                <br>Kimeneti: Két, a SHOUT eszköz kiemeneteként előállított, RTTM (Rich Transcription Time Marked) kompatibilis fájl, ezek a megtalált beszéd-zaj-csend, illetve a különböző beszélőkhöz tartalmazó audio szegmenseket írják le.</p>

            <h5>Hogyan futtatható?</h5>
            <p>python em-dia.py [-h] [-m SHOUT_MODEL] [-s SAD_FN]
                <br>input_fn output_dir shout_dir</p>
            <p>Az egyes argumentumok jelentései leolvashatóak a python em-dia.py --help parancs kiadásával.</p>

            <h5>Milyen liszensz vonatkozik rá? (Ha nem a teljesen nyílt CC BY)</h5>
            <p>GPL</p>

            <h5>További információk</h5>
            <p></p>
        </article>
    </div>
</section>