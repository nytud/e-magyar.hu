<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3 id="emdep"><span>emDep</span> - függőségi elemző</h3>

            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>
                Az eszköz a mondatok szerkezeti egységei (szavak, többszavas kifejezések) közötti
                <span class="help" title="A függőségi viszony egy – többnyire fejnek nevezett – központi egység és az őt módosító,
                      az általa megszabott egység közti viszonyt jelenti. Például a 'piros alma' szerkezetben a főnév, az 'alma' a fej,
                      és az őt módosító egység a melléknév, a 'piros'.">függőségi viszonyokat</span> tárja fel.          
            </p>
            <h5>Mi a bemenet?</h5>
            <p>Olyan szöveg, amelyet előzetesen tokenekre bontottak, és morfológiailag egyértelműsítettek. </p>
            <h5>Mi a kimenet?</h5>
            <p>Olyan mondatok, amelynek szavai ún. elemzési fába vannak rendezve, amelyek bemutatják a mondat elemei közötti függőségi viszonyokat. 
                Minden tokenhez hozzá van rendelve a megfelelő elemzési címke és a szülő csomópontja, a fej.</p>
            <h5>Egy példa a működésre.</h5>
            
            <p><i>Az exkatonát kórházba szállították, ahol két műtétet is végrehajtottak rajta.</i></p>

            <div class="table-responbsive">
                <table class="table fixed">
                    <tr>
                        <td>1</td>
                        <td>Az</td>
                        <td>az</td>
                        <td>DET</td>
                        <td class="break">Definite=Def|PronType=Art</td>
                        <td class="group1">2</td>
                        <td class="group1">DET</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>exkatonát</td>
                        <td>exkatona</td>
                        <td>NOUN</td>
                        <td class="break">Case=Acc|Number=Sing</td>
                        <td class="group1">4</td>
                        <td class="group1">OBJ</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>kórházba</td>
                        <td>kórház</td>
                        <td>PROPN</td>
                        <td class="break">Case=Ill|Number=Sing</td>
                        <td class="group1">4</td>
                        <td class="group1">OBL</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>szállították</td>
                        <td>szállít</td>
                        <td>VERB</td>
                        <td class="break">Definite=Def|Mood=Ind|Number=Plur|Person=3|Tense=Past|VerbForm=Fin|Voice=Act</td>
                        <td class="group1">0</td>
                        <td class="group1">ROOT</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>,</td>
                        <td>,</td>
                        <td>PUNCT</td>
                        <td class="break">_</td>
                        <td class="group1">4</td>
                        <td class="group1">PUNCT</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>ahol</td>
                        <td>ahol</td>
                        <td>ADV</td>
                        <td>PronType=Rel</td>
                        <td class="group1">10</td>
                        <td class="group1">LOCY</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>két</td>
                        <td>két</td>
                        <td>NUM</td>
                        <td class="break">Case=Nom|NumType=Card|Number=Sing</td>
                        <td class="group1">8</td>
                        <td class="group1">ATT</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>műtétet</td>
                        <td>műtét</td>
                        <td>NOUN</td>
                        <td class="break">Case=Acc|Number=Sing</td>
                        <td class="group1">10</td>
                        <td class="group1">OBJ</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>is</td>
                        <td>is</td>
                        <td>CONJ</td>
                        <td>_</td>
                        <td class="group1">8</td>
                        <td class="group1">CONJ</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>végrehajtottak</td>
                        <td>végrehajt</td>
                        <td>VERB</td>
                        <td class="break">Definite=Ind|Mood=Ind|Number=Plur|Person=3|Tense=Past|VerbForm=Fin|Voice=Act</td>
                        <td class="group1">4</td>
                        <td class="group1">ATT</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>rajta</td>
                        <td>rajta</td>
                        <td>PRON</td>
                        <td class="break">Case=Sup|Number=Sing|Person=3|PronType=Prs</td>
                        <td class="group1">10</td>
                        <td class="group1">OBL</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>.</td>
                        <td>.</td>
                        <td>PUNCT</td>
                        <td class="break">_</td>
                        <td class="group1">0</td>
                        <td class="group1">PUNCT</td>
                    </tr>
                </table>
            </div>
            
            <br/>
            
            <h4>Fejlesztőknek</h4>

            <div class="table-responsive">
                <table class="table table-striped">                
                    <tbody>
                        <tr>
                            <td>Forrás</td>
                            <td>
                                <a href="http://rgai.inf.u-szeged.hu/magyarlanc" target="_blank">http://rgai.inf.u-szeged.hu/magyarlanc</a>                                
                            </td>
                        </tr>
                        <tr>
                            <td>Forrásnyelv</td>
                            <td>Java</td>
                        </tr>
                        <tr>
                            <td>Input</td>
                            <td>A POS-tagger kimenete (egy sorban egy token, külön oszlopban a szóalak, szótő, morfológiai elemzéssel ellátva), az egyes mondatok üres sorral elválasztva egymástól.</td>
                        </tr>
                        <tr>
                            <td>Output</td>
                            <td>Egy sorban egy token, külön oszlopban a szóalak, szótő, morfológiai elemzés, szülő csomópont és szintaktikai címke.</td>
                        </tr>
                        <tr>
                            <td>Futtatás</td>
                            <td>
                                <span class="code">java -Xmx2G -jar magyarlanc-3.0.jar -mode depparse -input in.txt -output out.txt</span>                               
                            </td>
                        </tr>
                        <tr>
                            <td>Licenc</td>
                            <td>Az adatbázisra a Creative Commons Attribution-ShareAlike 4.0 (CC-BY-SA) licenc vonatkozik. Az adatbázis elsõdleges forrásának konverzióját végzõ kód licence GNU General Public License (GPL v3).</td>
                        </tr>                       
                    </tbody>
                </table>
            </div>

        </article>
    </div>
</section>
