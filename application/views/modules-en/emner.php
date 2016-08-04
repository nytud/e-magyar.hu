<article>
    <h3 id="emner">NER tagger</h3>
    <h4>Az eszközről</h4>
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