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