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
