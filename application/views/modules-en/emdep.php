<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3 id="emdep"><span>emDep</span> - Dependency parser</h3>

            <h4>About the tool</h4>
            <h5>What is it good for? What does it do?</h5>
            <p>
                The tool reveals the
                <span class="help" title="Dependency relation is the relation between a central unit – mostly called a head – and another unit modifying it and determinded by it. For example in the phrase 'piros alma' the head is the noun ('alma'), while the unit modifying it is the adjective 'piros'.">dependency relations</span> between the structural units (words, multiword expressions) of a sentence.          
            </p>
            <h5>What is the input?</h5>
            <p>Text that had been tokenised and morphologically disambiguated. </p>
            <h5>What is the output?</h5>
            <p>Sentences, the words of which are arranged in so-called parse trees, which reveal the dependency relations between the units of the sentence.  
                Every token is assigned the appropriate analysis tag and its parent node, the head.</p>
            <h5>An example:</h5>
            
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
            
            <h4>For developers</h4>

            <div class="table-responsive">
                <table class="table table-striped">                
                    <tbody>
                        <tr>
                            <td>Source</td>
                            <td>
                                <a href="http://rgai.inf.u-szeged.hu/magyarlanc" target="_blank">http://rgai.inf.u-szeged.hu/magyarlanc</a>                                
                            </td>
                        </tr>
                        <tr>
                            <td>Source code</td>
                            <td>Java</td>
                        </tr>
                        <tr>
                            <td>Input</td>
                            <td>Input is the output of the POS tagger (one token per row, separate column for the word form with lemma and morphological analysis), the respective sentences divided by an empty line.</td>
                        </tr>
                        <tr>
                            <td>Output</td>
                            <td>One token per row, a separate column for word form, lemma, morphological analysis, parent node and syntactic tag.</td>
                        </tr>
                        <tr>
                            <td>Execution</td>
                            <td>
                                <span class="code">java -Xmx2G -jar magyarlanc-3.0.jar -mode depparse -input in.txt -output out.txt</span>                               
                            </td>
                        </tr>
                        <tr>
                            <td>Licence</td>
                            <td>The database is licensed under the Creative Commons Attribution-ShareAlike 4.0 (CC-BY-SA) licence. GNU General Public License (GPL v3) converts the primary source of the database)</td>
                        </tr>                       
                    </tbody>
                </table>
            </div>

        </article>
    </div>
</section>