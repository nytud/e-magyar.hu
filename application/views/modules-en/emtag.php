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