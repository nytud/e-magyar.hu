<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3 id="emcons"><span>emCons</span> - összetevős elemző</h3>
            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>Mondatok összetevős szerkezeti elemzése azt tárja fel, hogy a szavak egymással kombinálódva milyen kifejezéseket alkotnak, illetve hogyan állnak össze egy mondattá.</p>
            <h5>Mi a bemenet?</h5>
            <p>Olyan szöveg, amelyet előzetesen tokenekre bontottak, és morfológiailag egyértelműsítettek. A mondat szavai (bemeneti tokenek) elemzési fába rendezve: minden tokenhez hozzá van rendelve a megfelelő elemzési címke.</p>
            <h5>Mi a kimenet?</h5>
            <p>Az elemző kimenete az egyes szavak és az ezekből kialakítható összes kifejezés lehetséges szintaktikai kapcsolata elemzési fába rendezve. </p>

            <h5>Egy példa a működésre</h5>
            
            <p><i>Az exkatonát kórházba szállították, ahol két műtétet is végrehajtottak rajta.</i></p>

            <div class="table-responsive">
                <table class="table fixed">
                    <tr>
                        <td>Az</td>
                        <td>az</td>
                        <td>DET</td>
                        <td class="break">Definite=Def|PronType=Art</td>
                        <td class="group1">(ROOT(CP(NP*</td>
                    </tr>
                    <tr>
                        <td>exkatonát</td>
                        <td>exkatona</td>
                        <td>NOUN</td>
                        <td class="break">Case=Acc|Number=Sing</td>
                        <td class="group1">*)</td>
                    </tr>
                    <tr>
                        <td>kórházba</td>
                        <td>kórház</td>
                        <td>PROPN</td>
                        <td class="break">Case=Ill|Number=Sing</td>
                        <td class="group1">(NP*)</td>
                    </tr>
                    <tr>
                        <td>szállították</td>
                        <td>szállít</td>
                        <td>VERB</td>
                        <td class="break">Definite=Def|Mood=Ind|Number=Plur|Person=3|Tense=Past|VerbForm=Fin|Voice=Act</td>
                        <td class="group1">(V_(V0*))</td>
                    </tr>
                    <tr>
                        <td>,</td>
                        <td>,</td>
                        <td>PUNCT</td>
                        <td class="break">_</td>
                        <td class="group1">*</td>
                    </tr>
                    <tr>
                        <td>ahol</td>
                        <td>ahol</td>
                        <td>ADV</td>
                        <td class="break">PronType=Rel</td>
                        <td class="group1">(ADVP*)</td>
                    </tr>
                    <tr>
                        <td>két</td>
                        <td>két</td>
                        <td>NUM</td>
                        <td class="break">Case=Nom|NumType=Card|Number=Sing</td>
                        <td class="group1">(NP*</td>
                    </tr>
                    <tr>
                        <td>műtétet</td>
                        <td>műtét</td>
                        <td>NOUN</td>
                        <td class="break">Case=Acc|Number=Sing</td>
                        <td class="group1">*)</td>
                    </tr>
                    <tr>
                        <td>is</td>
                        <td>is</td>
                        <td>CONJ</td>
                        <td class="break">_</td>
                        <td class="group1">(C0*)</td>
                    </tr>
                    <tr>
                        <td>végrehajtottak</td>
                        <td>végrehajt</td>
                        <td>VERB</td>
                        <td class="break">Definite=Ind|Mood=Ind|Number=Plur|Person=3|Tense=Past|VerbForm=Fin|Voice=Act</td>
                        <td class="group1">(V_(V0*))</td>
                    </tr>
                    <tr>
                        <td>rajta</td>
                        <td>rajta</td>
                        <td>PRON</td>
                        <td class="break">Case=Sup|Number=Sing|Person=3|PronType=Prs</td>
                        <td class="group1">(NP*)</td>
                    </tr>
                    <tr>
                        <td>.</td>
                        <td>.</td>
                        <td>PUNCT</td>
                        <td class="break">_</td>
                        <td class="group1">*))</td>
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
                                <a href="http://rgai.inf.u-szeged.hu/magyarlanc" target="_balnk">http://rgai.inf.u-szeged.hu/magyarlanc</a>                              
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
                            <td>Egy sorban egy token, külön oszlopban a szóalak, szótő, morfológiai elemzés, morfológiai elemzés és szintaktikai elemzés.</td>
                        </tr>
                        <tr>
                            <td>Futtatás</td>
                            <td>
                                <span class="code">java -Xmx2G -jar magyarlanc-3.0.jar -mode constparse -input in.txt -output out.txt</span>                               
                            </td>
                        </tr>
                        <tr>
                            <td>Licensz</td>
                            <td>Az adatbázisra a Creative Commons Attribution-ShareAlike 4.0 (CC-BY-SA) licenc vonatkozik. Az adatbázis elsõdleges forrásának konverzióját végzõ kód licence GNU General Public License (GPL v3).</td>
                        </tr>                       
                    </tbody>
                </table>
            </div>

        </article>  
    </div>
</section>