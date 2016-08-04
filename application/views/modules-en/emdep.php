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