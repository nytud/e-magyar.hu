
<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3><span>emChunk</span> - főnévi csoport (frázis) felismerő</h3>

            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            
<!--	<p>Az emChunk modul kétféle kimenetet produkál: i) azonosítja a szövegben a maximális NP-ket, illetve ii) azonosít a szövegben minden típusú frázist.</p>
--> 
            <p>Az emChunk modul a szövegben a maximális NP-ket azonosítja, vagyis olyan NP-ket, melyek nem részei egy magasabb
                szintű NP-nek sem.</p>    
        <h5>Mi a bemenet?</h5>
            <p>Az elemzőlánc előző szintjein feldolgozott magyar nyelvű szövegekkel dolgozik, amelyek már i) szavakra és mondatokra vannak bontva, 
                ii) a szavakhoz hozzá van rendelve a teljes morfológiai elemzésük. A chunker modul hatékony működéséhez szükségesek ezek az információk.</p>
            <h5>Mi a kimenet?</h5>
<!--            <p>A modul a szavakra és mondatokra bontott szövegben minden tokenhez hozzárendel egy címkét, ami a kétféle módnak megfelelően kétféle
                lehet.
                <br/>Az első esetben a címke azt jelöli, hogy az adott szó i) eleme-e egy maximális főnévi frázisnak, ha igen, 
                akkor ii) egy- vagy többelemű-e, ha ez utóbbi, akkor iii) a frázis kezdő, közbülső vagy záró eleme-e. 
                A második esetben a címke azt jelöli, hogy az adott szó i) valamilyen frázis eleme-e, ha igen, akkor
                ii) milyen típusú frázis, iii) egy- vagy többelemű-e, ha ez utóbbi, akkor iv) a frázis kezdő, közbülső vagy záró eleme-e.
                A kimenetben az előző szintek elemzése is megmarad, és a chunker modul is hozzáteszi a saját címkéit.</p>
            <h5>Egy példa a működésre.</h5>
            <p>Az első működési módban a szövegben található maximális NP-ket nyerjük ki, vagyis olyan NP-ket, melyek nem részei egy magasabb
                szintű NP-nek sem.
                <br/>A példamondatban két maximális NP-t és két O-val jelölt elemet találunk, ez utóbbiak nem NP-k. A 'B' jelöli a frázisok 
                kezdetét, az 'E' a frázisok végét, az 'I' pedig azt, hogy az adott token a frázis közbülső eleme.
            <p>
-->
            <p>A modul a szavakra és mondatokra bontott szövegben minden tokenhez hozzárendel egy címkét, amely azt jelöli, hogy az adott szó i) eleme-e egy maximális főnévi frázisnak, ha igen, 
                akkor ii) egy- vagy többelemű-e, ha ez utóbbi, akkor iii) a frázis kezdő, közbülső vagy záró eleme-e. 
                A kimenetben az előző szintek elemzése is megmarad, és a chunker modul is hozzáteszi a saját címkéit.</p>
            <h5>Egy példa a működésre.</h5>
                A példamondatban két maximális NP-t és két O-val jelölt elemet találunk, ez utóbbiak nem NP-k. A 'B' jelöli a frázisok 
                kezdetét, az 'E' a frázisok végét, az 'I' pedig azt, hogy az adott token a frázis közbülső eleme.

            <p><i>A szállásunk egy Balaton melletti kis üdülőfaluban, Zamárdiban volt.</i></p>
            <div class="table-responsive">
                <table class="table">
                    <tr class="group1">
                        <td>A</td>
                        <td>B-NP</td>
                    </tr>
                    <tr class="group1">
                        <td>szállásunk</td>
                        <td>E-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>egy</td>
                        <td>B-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>Balaton</td>
                        <td>I-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>melletti</td>
                        <td>I-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>kis</td>
                        <td>I-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>üdülőfaluban</td>
                        <td>I-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>,</td>
                        <td>I-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>Zamárdiban</td>
                        <td>E-NP</td>
                    </tr>
                    <tr>
                        <td>volt</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>.</td>
                        <td>O</td>
                    </tr>
                </table>
            </div>

<!--
            <p>A második működési mód során minden típusú frázist azonosítunk a mondatban.
                <br/>A példamondatban egy kételemű NP-t, egy egyelemű NP-t és két egyelemű ADVP-t (határozói frázist) találunk:
            <p>
            <p><i>Az osztály már csütörtökön fel volt villanyozva.</i></p>
            <div class="table-responsive">
                <table class="table">
                    <tr class="group1">
                        <td>Az</td>
                        <td>B-NP</td>
                    </tr>
                    <tr class="group1">
                        <td>osztály</td>
                        <td>E-NP</td>
                    </tr>
                    <tr class="group3">
                        <td>már</td>
                        <td>1-ADVP</td>
                    </tr>
                    <tr class="group2">
                        <td>csütörtökön</td>
                        <td>1-NP</td>
                    </tr>
                    <tr class="group4">
                        <td>teljesen</td>
                        <td>1-ADVP</td>
                    </tr>
                    <tr>
                        <td>fel</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>volt</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>villanyozva</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>.</td>
                        <td>O</td>
                    </tr>
                </table>
            </div>

-->
            <br/>

            <h4>Fejlesztőknek</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Forrás</td>
                        <td><a href="https://github.com/ppke-nlpg/HunTag3" target="_blank">https://github.com/ppke-nlpg/HunTag3</a></td>
                    </tr>
                    <tr>
                        <td>Forrásnyelv</td>
                        <td>Python 3</td>
                    </tr>
                    <tr>
                        <td>Input formátum</td>
                        <td>UTF-8 karakterkódolású sima szöveg fájl, egy sor-egy szó formátum, a mondathatárokat egy üres sor jelöli, az első oszlopban maga a szövegszó szerepel, minden további annotáció tabbal elválasztott oszlopokban van hozzáadva, az utolsó oszlop tartalmazza a chunk címkéket.</td>
                    </tr>
                    <tr>
                        <td>Output formátum</td>
                        <td>UTF-8 karakterkódolású sima szöveg fájl, egy sor-egy szó formátum, a mondathatárokat egy üres sor jelöli, az első oszlopban maga a szövegszó szerepel, minden további annotáció tabbal elválasztott oszlopokban van hozzáadva, az utolsó oszlop tartalmazza a chunk címkéket.</td>
                    </tr>
                    <tr>
                        <td>Futtatás</td>
                        <td>Lásd a README-ben: <a href="https://github.com/ppke-nlpg/HunTag3" target="_blank">https://github.com/ppke-nlpg/HunTag3</a></td>
                    </tr>
                    <tr>
                        <td>Licenc</td>
                        <td>GNU Lesser General Public License v3.0
                        </td>
                    </tr>               
                </table>
            </div>

        </article>
    </div>
</section>
